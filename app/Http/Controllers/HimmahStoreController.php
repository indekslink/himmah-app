<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Arr;

class HimmahStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function isSuspend($slugToko)
    {
        $store = Store::whereSlug($slugToko)->firstOrFail();
        if ($store->suspend && !in_array(auth()->user()->role->name, ['super_admin', 'admin'])) {
            return abort(404);
        }
    }
    public function index()
    {

        $data = Category::latest()->take(10)->get();
        $products = Product::with('store')->whereHas('store', function ($query) {
            $query->doesntHave('suspend');
        })->latest()->get();

        $categories = [];
        $categories['top'] = $data->filter(function ($item, $key) {
            if ($key % 2 == 0) return $item;
        });
        $categories['bottom'] = $data->filter(function ($item, $key) {
            if ($key % 2 == 1) return $item;
        });

        return view(
            'himmah_store.index',
            [
                'categories' => collect($categories),
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {

        $this->isSuspend($slug);
        $store = Store::with(['products' => function ($query) use ($request) {
            $query->when($request->has("filter"), function ($query) use ($request) {
                $query->orderBy('created_at', $request->filter);
            })->latest();
        }])->where('slug', $slug)->firstOrFail();

        return view('himmah_store.store', compact('store'));
    }
    public function get_categories_store($slugToko)
    {
        $this->isSuspend($slugToko);
        $id_store = Store::where('slug', $slugToko)->firstOrFail()->id;

        $store = Store::with([
            'categories',
            'categories.products' => function ($query) use ($id_store) {
                $query->where('store_id', $id_store);
            }
        ])->where('slug', $slugToko)->firstOrFail();

        // get kategori yang tidak di miliki oleh toko...namun dia memakai kategori yang ada di toko lain
        $kategori_yang_diikuti = null;

        if ($store->categories->count() == 0 && $store->products->count() > 0) {
            $get_product = collect(Store::with('products')->where('slug', $slugToko)->firstOrFail()->products);

            $id_category = $get_product->map(function ($p) {
                return $p->categories()->pluck('categories.id');
            })->toArray()[0];

            $kategori_yang_diikuti  = Category::whereIn('id', $id_category)->get();
        }

        return view('himmah_store.categories', compact('store', 'kategori_yang_diikuti'));
    }
    public function getAllcategories($slug)
    {

        $kategori = Category::with([
            'products' => function ($query) {
                $query->whereHas('store', function ($query1) {
                    $query1->doesntHave('suspend');
                });
            },
            'stores'
        ])->where('slug', $slug)->firstOrFail();

        return view('himmah_store.global_categories', compact('kategori'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail_produk(Store $store, Product $product)
    {
        $this->isSuspend($store->slug);
        // dd($product->store->slug);
        $produk_lainnya = $product->store->products()->where('id', '!=', $product->id)->latest()->take(10)->get();
        $product_same_category = Product::with('categories')
            ->whereHas('categories', function ($query) use ($product) {
                $query->whereIn('slug', $product->categories()->get()->pluck('slug'));
            })
            ->whereHas('store', function ($query) use ($product) {
                $query->where('slug', '!=', $product->store->slug)->doesntHave('suspend');
            })
            ->latest()
            ->get();


        return view('himmah_store.show', compact('product', 'produk_lainnya', 'product_same_category'));
    }

    public function detail_product_of_categories(Store $store, $categories)
    {
        $this->isSuspend($store->slug);

        $kategori = Category::with([
            'products' => function ($query) use ($store) {
                $query->where('store_id', $store->id);
            }
        ])->where('slug', $categories)->firstOrFail();

        return view('himmah_store.ProductOfCategories', compact('kategori', 'store'));
    }


    //  method for manage store

    public function all_store()
    {
        $stores = Store::with('user', 'suspend')->whereHas('user', function ($query) {
            $query->where('id', '!=', auth()->id());
        })->latest()->get();

        return view('logged_in.manage.himmahStore.index', compact('stores'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;

class HimmahStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->take(10)->get();
        $products = Product::latest()->get();
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


        $store = Store::with(['products' => function ($query) use ($request) {
            $query->when($request->has("filter"), function ($query) use ($request) {
                $query->orderBy('created_at', $request->filter);
            })->latest();
        }])->where('slug', $slug)->firstOrFail();

        return view('himmah_store.store', compact('store'));
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
        // dd($product->store->slug);
        $produk_lainnya = $product->store->products()->where('id', '!=', $product->id)->latest()->take(10)->get();
        $product_same_category = Product::with('categories')
            ->whereHas('categories', function ($query) use ($product) {
                $query->whereIn('slug', $product->categories()->get()->pluck('slug'));
            })
            ->whereHas('store', function ($query) use ($product) {
                $query->where('slug', '!=', $product->store->slug);
            })
            ->latest()
            ->get();


        return view('himmah_store.show', compact('product', 'produk_lainnya', 'product_same_category'));
    }
}

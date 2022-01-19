<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereHas('store', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('id', auth()->user()->id);
            });
        })->latest()->get();

        return view('logged_in.manage.toko.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_anda =  Category::whereHas('stores', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('id', auth()->user()->id);
            });
        })->latest()->get();
        $kategori_toko_lainnya =    Category::whereHas('stores', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('id', '!=', auth()->user()->id);
            });
        })->latest()->get();

        return view('logged_in.manage.toko.products.create', compact('kategori_toko_lainnya', 'kategori_anda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => ['required', function ($attribute, $value, $fail) {
                $slug = Str::slug($value);
                $exist = Product::whereHas('store', function ($query) {
                    $query->where('store_id', auth()->user()->id);
                })->where('slug', $slug)->first();
                if ($exist) {
                    $fail($attribute . ' tersebut sudah ada di dalam toko anda !');
                }
            }],
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar_utama' => [function ($attr, $val, $fail) use ($request) {
                if (count($request->gambar) > 1 && !$val) {
                    $fail('Silahkan pilih gambar utama terlebih dahulu');
                }
            }],
            'gambar' => 'required',
            'gambar.*'  => 'image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|min:10',
            'kategori' => 'required'
        ]);


        $gambar_utama = $request->gambar_utama;

        $slug = Str::slug($request->nama);

        $product = new Product();
        $product->store_id = auth()->user()->store->id;
        $product->nama = $request->nama;
        $product->slug = $slug;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->deskripsi = $request->deskripsi;


        $file_gambar = [];
        foreach ($request->file('gambar') as $gambar) {
            $file = $gambar;
            if ($file->getClientOriginalName() == $gambar_utama) {
                $gambar_utama = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
                $gambar_utama = $gambar_utama . '.' . $file->getClientOriginalExtension(); // add extension
            }
            $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
            $name = $name . '.' . $file->getClientOriginalExtension(); // add extension

            $file->move('images/store/produk/', $name);
            $file_gambar[] = $name;
        }

        // cek apakah gambar yang diupload hanya 1 saja, jika iya , maka jadikan itu sebagai gambar utama

        $gambar_utama = count($file_gambar) == 1 ? $file_gambar[0] : $gambar_utama;


        $product->gambar = json_encode($file_gambar);
        $product->gambar_utama = $gambar_utama;

        $product->save();
        $product->categories()->attach($request->kategori);

        return redirect()->route('products.index', emailLogin())->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($email, Product $product)
    {
        $data = $product;
        $creataed = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
        $updated =  Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at);
        $infoTgl = $updated->gt($creataed) ? $updated : $creataed;

        return view('logged_in.manage.toko.products.show', compact('data', 'infoTgl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($email, Product $product)
    {
        $id = $product->categories()->get()->pluck('id');
        $category = Category::whereNotIn('id', $id)->get();
        return view('logged_in.manage.toko.products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($email, Request $request, Product $product)
    {


        $request->validate([
            'nama' => ['required', function ($attribute, $value, $fail) use ($product) {
                $slug = Str::slug($value);
                $exist = Product::whereHas('store', function ($query) {
                    $query->where('store_id', auth()->user()->id);
                })->where('slug', $slug)->first();
                if ($slug != $product->slug && $exist) {
                    $fail($attribute . ' tersebut sudah ada di dalam toko anda !');
                }
            }],
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar_utama' => [function ($attr, $val, $fail) use ($request) {
                if (count($request->gambar) > 1 && !$val) {
                    $fail('Silahkan pilih gambar utama terlebih dahulu');
                }
            }],
            'gambar' => 'required',
            'gambar_pengganti.*'  => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|min:10',
            'kategori' => 'required'
        ]);
        $slug = Str::slug($request->nama);
        $gambar_utama = $request->gambar_utama;


        $product->nama = $request->nama;
        $product->slug = $slug;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->deskripsi = $request->deskripsi;

        $gambarOri = collect(json_decode($product->gambar)); // data dari database

        $diff = $gambarOri->diff($request->gambar); // data dari user
        $removeImg = $diff->all();
        if (count($removeImg) > 0) {
            foreach ($removeImg as $rm) {
                unlink('images/store/produk/' . $rm);
            }
        }

        if ($request->hasFile('gambar_pengganti')) {

            foreach ($request->file('gambar_pengganti') as $gambar) {
                $file = $gambar;

                // $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
                // $name = $name . '.' . $file->getClientOriginalExtension(); // add extension

                $name = $file->getClientOriginalName();
                $file->move('images/store/produk/', $name);
            }
        }

        $gambar_utama = count($request->gambar) == 1 ? $request->gambar[0] : $gambar_utama;

        $product->gambar = json_encode($request->gambar);
        $product->gambar_utama = $gambar_utama;

        $product->save();
        $product->categories()->sync($request->kategori);

        return redirect()->route('products.index', emailLogin())->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($email, Product $product)
    {

        foreach (json_decode($product->gambar) as $g) {
            unlink('images/store/produk/' . $g);
        }
        $product->categories()->detach($product->categories()->get()->pluck('id'));
        $product->delete();
        return redirect()->route('products.index', emailLogin())->with('success', $product->nama . ' berhasil dihapus');
    }
}

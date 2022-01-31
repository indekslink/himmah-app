<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->whereHas('stores', function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('id', auth()->user()->id);
            });
        })->latest()->get();

        return view('logged_in.manage.toko.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logged_in.manage.toko.categories.create');
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
                $exist = Category::where('slug', $slug)->first();
                if ($exist) {
                    $fail($attribute . ' tersebut sudah ada!');
                }
            }],
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2000',

        ]);

        $slug = Str::slug($request->nama);

        $category = new Category();


        $category->nama = $request->nama;
        $category->slug = $slug;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
            $name = $name . '.' . $file->getClientOriginalExtension(); // add extension
            $file->move('images/store/kategori/', $name);
            $category->gambar = $name;
        } else {
            $category->gambar = 'default.png';
        }

        $category->save();
        $category->stores()->attach(auth()->user()->store->id);

        return redirect()->route('categories.index', emailLogin())->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($email, Category $category)
    {
        $data = $category;
        $creataed = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
        $updated =  Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at);
        $infoTgl = $updated->gt($creataed) ? $updated : $creataed;
        return view('logged_in.manage.toko.categories.show', compact('data', 'infoTgl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($email, Category $category)
    {

        return view('logged_in.manage.toko.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email, Category $category)
    {
        $request->validate([
            'nama' => ['required', function ($attribute, $value, $fail) use ($category) {
                $slug = Str::slug($value);
                $exist = Category::where('slug', $slug)->first();
                if ($slug != $category->slug && $exist) {
                    // jika request nama tidak sama dengan data yang sedang diupdate, dan
                    // request nama tersebut sudah dipakai oleh data yang sedang di update saat ini
                    $fail($attribute . ' tersebut sudah ada di dalam toko anda !');
                }
            }],
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2000',

        ]);



        $slug = Str::slug($request->nama);

        $category->nama = $request->nama;
        $category->slug = $slug;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
            $name = $name . '.' . $file->getClientOriginalExtension(); // add extension
            $fileLama =  $category->gambar;
            if ($name != $fileLama) {

                if ($fileLama != 'default.png') {
                    unlink('images/store/kategori/' . $fileLama);
                }
                $file->move('images/store/kategori/', $name);
                $category->gambar = $name;
            }
        }

        $category->save();
        return redirect()->route('categories.index', emailLogin())->with('success', $request->nama . ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($email, Category $category)
    {

        unlink('images/store/kategori/' . $category->gambar);
        $category->delete();
        $category->stores()->detach(auth()->user()->store->id); // id toko user
        return redirect()->route('categories.index', emailLogin())->with('success', $category->nama . ' berhasil dihapus');
    }
}

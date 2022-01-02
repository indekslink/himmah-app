<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PaketUmroh;
use Illuminate\Support\Carbon;

class PaketUmrohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $paket_umroh = PaketUmroh::latest()->get();
        return view('logged_in.manage.paket_umroh.main', compact('paket_umroh'));
    }


    public function get()
    {
        $paket_umroh = PaketUmroh::latest()->get();
        return view('paket_umroh.index', compact('paket_umroh'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('logged_in.manage.paket_umroh.create');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2000',

        ]);

        $slug = Str::slug($request->judul);

        $paket_umroh = new PaketUmroh();
        $paket_umroh->judul = $request->judul;
        $paket_umroh->deskripsi = $request->deskripsi;
        $paket_umroh->slug = $slug;
        $paket_umroh->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
            $name = $name . '.' . $file->getClientOriginalExtension(); // add extension
            $file->move('images/paket-umroh/', $name);
            $paket_umroh->gambar = $name;
        } else {
            $paket_umroh->gambar = 'default.png';
        }

        $paket_umroh->save();

        return redirect()->route('paket-umroh.index')->with('success', 'Paket Umroh berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = PaketUmroh::where('slug', $slug)->firstOrFail();
        $creataed = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
        $updated =  Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at);
        $infoTgl = $updated->gt($creataed) ? $updated : $creataed;
        return view('logged_in.manage.paket_umroh.show', compact('data', 'infoTgl'));
    }
    public function detail($slug)
    {
        $data = PaketUmroh::where('slug', $slug)->firstOrFail();

        return view('paket_umroh.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = PaketUmroh::where('slug', $slug)->firstOrFail();

        return view('logged_in.manage.paket_umroh.edit', compact('data'));
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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2000',

        ]);

        $paket_umroh = PaketUmroh::where('slug', $id)->firstOrFail();

        $slug = Str::slug($request->judul);

        $paket_umroh->judul = $request->judul;
        $paket_umroh->deskripsi = $request->deskripsi;
        $paket_umroh->slug = $slug;
        $paket_umroh->harga = $request->harga;


        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $name = Str::slug(explode('.', $file->getClientOriginalName())[0]) . '_' . time();
            $name = $name . '.' . $file->getClientOriginalExtension(); // add extension
            if ($name != 'default.png') {

                $fileLama =  $paket_umroh->gambar;
                if ($name != $fileLama) {
                    unlink('images/paket-umroh/' . $fileLama);
                    $file->move('images/paket-umroh/', $name);
                }
                $paket_umroh->gambar = $name;
            }
        }

        $paket_umroh->save();

        return redirect()->route('paket-umroh.index')->with('success', $request->judul . ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $data = PaketUmroh::where('slug', $slug)->firstOrFail();
        if ($data->gambar != 'default.png') {
            unlink('images/paket-umroh/' . $data->gambar);
        }
        $data->delete();
        return redirect()->route('paket-umroh.index')->with('success', $data->judul . ' berhasil dihapus');
    }
}

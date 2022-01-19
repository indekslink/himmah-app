<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class ShopUserController extends Controller
{
    public function my_shop($email)
    {

        return view('logged_in.manage.toko.index');
    }

    public function make_shop($email)
    {
        return view('logged_in.manage.toko.make');
    }
    public function edit_shop($email)
    {
        $store = auth()->user()->store;

        return view('logged_in.manage.toko.edit', compact('store'));
    }

    public function show_form($email)
    {
        return view('logged_in.manage.toko.make_form');
    }

    public function update_shop(Request $request, $email)
    {
        $shop = Store::where('slug', auth()->user()->store->slug)->firstOrFail();
        $request->validate([
            'nama' => ['required', function ($attr, $value, $fail) use ($shop) {
                $slug = Str::slug($value);
                $shopIsExist = Store::where('slug', $slug)->first();
                if ($shop->slug != $slug && $shopIsExist) {
                    $fail('Maaf, Nama toko tersebut sudah dipakai oleh orang lain');
                }
            }],
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required|min:10',
            'no_telepon' => 'required|min:11',
            'avatar' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        $slug = Str::slug($request->nama);

        $nama_avatar = $shop->avatar;


        if ($request->hasFile('avatar')) {

            $nama_avatar = $request->file('avatar')->getClientOriginalName();
            if ($nama_avatar != $shop->avatar) {

                if ($shop->avatar != 'default.png') {
                    //hapus foto lama
                    unlink('images/store/logo/' . $shop->avatar);
                }
                $request->file('avatar')->move('images/store/logo/', $nama_avatar);
            }
        }

        $shop->updateOrFail([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'avatar' => $nama_avatar,
            'slug' => $slug,
        ]);

        return redirect()->route('manage.shop.user', emailLogin())->with('success', 'Toko Anda berhasil di diedit');
    }
    public function store_form(Request $request, $email)
    {
        $slug = null;
        $request->validate([
            'nama' => ['required', function ($attr, $value, $fail) use ($slug) {
                $slug = Str::slug($value);
                $shopIsExist = Store::where('slug', $slug)->first();
                if ($shopIsExist) {
                    $fail('Maaf, Nama toko tersebut sudah dipakai oleh orang lain');
                }
            }],
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required|min:10',
            'no_telepon' => 'required|min:11',
            'avatar' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        $slug = Str::slug($request->nama);

        $nama_avatar = 'default.png';

        if ($request->hasFile('avatar')) {

            $nama_avatar = $request->file('avatar')->getClientOriginalName();

            $request->file('avatar')->move('images/store/logo/', $nama_avatar);
        }

        auth()->user()->store()->create([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'avatar' => $nama_avatar,
            'slug' => $slug,
        ]);

        return redirect()->route('manage.shop.user', emailLogin())->with('success', 'Toko Anda berhasil di buat, Semoga sukses selalu');
    }
}

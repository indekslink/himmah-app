<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function alias_field($field)
    {
        $alias = [
            ['field' => 'name', 'alias' => 'Nama Lengkap'],
            ['field' => 'email', 'alias' => 'Email'],
            ['field' => 'address', 'alias' => 'Alamat'],
            ['field' => 'change_password', 'alias' => 'Ubah Password'],
            ['field' => 'gender', 'alias' => 'Jenis Kelamin'],
            ['field' => 'avatar', 'alias' => 'Avatar'],

        ];
        $result = null;
        foreach ($alias as $as) {
            if ($as['field'] == $field) {
                $result = $as['alias'];
            }
        }
        return $result;
    }
    public function must_field($field)
    {
        $fields = ['name', 'address', 'email', 'change_password', 'gender', 'avatar'];
        if (!in_array($field, $fields)) {
            return abort(404);
        }
    }
    public function index($email)
    {
        $user = User::with('status_user')->whereEmail($email)->firstOrFail();
        $section_admin = ['super_admin', 'admin'];

        return view('logged_in.user.index_redesign', compact('user', 'section_admin'));
    }

    public function pengaturan_akun($email)
    {
        $user =  User::whereEmail($email)->firstOrFail();
        return view('logged_in.user.pengaturanAkun', compact('user'));
    }
    public function field_pengaturan_akun($email, $field)
    {
        $field = Str::lower($field);

        $this->must_field($field);


        $user =  User::whereEmail($email)->firstOrFail();

        $title = $this->alias_field($field);



        return view('logged_in.user.fieldPengaturanAkun', compact('user', 'title', 'field'));
    }

    public function store_field_pengaturan_akun(Request $request, $email, $field)
    {
        $user = User::whereEmail($email)->firstOrFail();
        $request->validate([
            'name' => 'sometimes|required',
            'email' => ['sometimes', 'required', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => [
                'sometimes', 'required', 'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
            ],
            'address' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'avatar' => 'sometimes|mimes:jpg,png,jpeg|max:2048',
        ]);


        $user->updateOrFail($request->except(['avatar', 'password']));



        if ($request->hasFile('avatar')) {
            $name = $user->avatar;
            $name_file_from_request = $request->file('avatar')->getClientOriginalName();
            if ($name != $name_file_from_request) {
                if ($name != 'default.png') {
                    unlink('images/user/' . $name);
                }
                $request->file('avatar')->move('images/user/', $name_file_from_request);
            }
            $user->update(['avatar' => $name_file_from_request]);
        }

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        if ($field == 'email') {
            return redirect()->route('home');
        }
        return redirect()->route('user.setting', $email);
    }
}

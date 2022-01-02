<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

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

        return view('logged_in.user.index', compact('user', 'section_admin'));
    }

    public function pengaturan_akun($email)
    {
        $user =  User::whereEmail($email)->firstOrFail();
        return view('logged_in.user.pengaturanAkun', compact('user'));
    }
    public function field_pengaturan_akun($email, $field)
    {

        return abort(404);
        $field = Str::lower($field);

        $this->must_field($field);


        $user =  User::whereEmail($email)->firstOrFail();

        $title = $this->alias_field($field);

        return view('logged_in.user.fieldPengaturanAkun', compact('user', 'title', 'field'));
    }

    public function store_field_pengaturan_akun($email)
    {
    }
}

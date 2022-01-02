<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ShopUserController extends Controller
{
    public function my_shop($email)
    {
        $user = User::with('store')->whereEmail($email)->firstOrFail();

        $have_shop =  $user->store == null; // true or false;

        return view('logged_in.manage.toko.index', compact('have_shop'));
    }
}

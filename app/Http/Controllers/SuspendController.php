<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class SuspendController extends Controller
{
    public function store_suspend(Request $request, $email, $slugToko)
    {
        $request->validate([
            'keterangan' => 'sometimes|required'
        ]);

        $store = Store::where('slug', $slugToko)->firstOrFail();

        $isSuspend = $store->suspend;
        $message = 'Toko ' . $store->nama . ' berhasil ';
        if ($isSuspend) {
            $message = $message . 'diubah keterangan penonaktifannya';
        } else {
            $message = $message . 'dinonaktifkan';
        }
        $store->suspend()->updateOrCreate(
            ['store_id' => $store->id],
            ['keterangan' => nl2br($request->keterangan)]
        );
        return back()->with('success', $message);
    }
    public function delete_suspend(Request $request, $email, $slugToko)
    {
        $store = Store::where('slug', $slugToko)->firstOrFail();
        $store->suspend()->delete();
        return back()->with('success', 'Toko ' . $store->nama . ' berhasil dinonaktifkan');
    }
}

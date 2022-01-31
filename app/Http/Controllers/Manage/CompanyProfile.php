<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile as Profile;
use Illuminate\Support\Str;


class CompanyProfile extends Controller
{
    public function must_field($field)
    {
        $fields = ['judul', 'deskripsi', 'visi', 'misi', 'custom'];
        if (!in_array($field, $fields)) {
            return abort(404);
        }
    }
    public function index()
    {
        $data = Profile::where('active', '1')->first();

        return view('slide-page.company-profile', compact('data'));
    }

    public function get()
    {
        $data = null;
        $default_design = null;
        $custom_design = null;
        $count = Profile::count();
        if ($count > 0) {
            $data = Profile::where('active', '1')->first();
            $default_design = Profile::where('default_design', '1')->first();
            $custom_design = Profile::where('default_design', '0')->first();
        }

        return view('logged_in.manage.company_profile.main_redesign', compact('data', 'count', 'default_design', 'custom_design'));
    }

    public function view_field($field)
    {
        $field = Str::lower($field);
        $this->must_field($field);
        $data = Profile::where('default_design', $field == "custom" ? 0 : 1)->first();
        $capitalizeTitle = Str::ucfirst($field);

        $lowerTitle = $field  == 'custom ' ? 'deskripsi' : $field;

        return view('logged_in.manage.company_profile.field_redesign', compact('capitalizeTitle', 'lowerTitle', 'data'));
    }

    public function store_field(Request $request, $field)
    {
        $field = Str::lower($field);
        $this->must_field($field);
        $request->validate([
            'judul' => 'sometimes|required',
            'deskripsi' => 'sometimes|required',
            'visi' => 'sometimes|required',
            'misi' => 'sometimes|required',
            'gambar.*' => 'sometimes|required'
        ]);
        $design = $field == 'custom' ? 0 : 1;

        if ($request->gambar_ori || $request->gambar_lama) {
            $gambar_lama = collect(json_decode($request->gambar_lama));
            $diff = $gambar_lama->diff($request->gambar_ori);
            $diff = $diff->all();

            if (count($diff) > 0) {
                foreach ($diff as $img) {
                    unlink('images/company_profile/' . $img);
                }
            }
            $request['deskripsi'] = json_encode($request->gambar_ori);
        }

        if ($request->hasFile('gambar')) {

            foreach ($request->file('gambar') as $file) {
                $name =  $file->getClientOriginalName();
                $file->move('images/company_profile/', $name);
            }
        }


        Profile::updateOrCreate(
            ['default_design' => $design],
            $request->only(
                ['judul', 'deskripsi', 'visi', 'misi', 'active']
                // ['judul', 'deskripsi', 'visi', 'misi']
            )
        );

        return redirect()->route('manage.company.profile')->with('success', Str::ucfirst($field) . ' Profil Perusahaan berhasil disimpan!');
    }

    public function set_design(Request $request)
    {
        $nama_desain =  $request->value == 1 ? 'Default Desain' : 'Manual Desain';
        $boolean = $request->value == 1;
        try {
            Profile::where('default_design', $boolean)->update([
                'active' => 1
            ]);

            Profile::where('default_design', !$boolean)->update([
                'active' => 0
            ]);
            return response()->json([
                'status' => 'success',
                'message' => $nama_desain . ' berhasil di aktifkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('backend.content.user.list', compact('user'));
    }

    public function tambah()
    {
        return view('backend.content.user.formTambah');

    }

    public function prosesTambah(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');

        try {
            $user->save();
            return redirect(route('user.index'))->with('pesan', ['Success', 'Berhasil Tambah User']);
        } catch (\Exception) {
            return redirect(route('user.index'))->with('pesan', ['Danger', 'Gagal Tambah User']);

        }
    }

    public function ubah($id)
    {
        $user = User::findOrFail($id);
        return view('backend.content.user.formUbah', compact('user'));

    }

    public function prosesUbah(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',

        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        try {
            $user->save();
            return redirect(route('user.index'))->with('pesan', ['Success', 'Berhasil Ubah User']);
        } catch (\Exception) {
            return redirect(route('user.index'))->with('pesan', ['Danger', 'Gagal Ubah User']);

        }
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return redirect(route('user.index'))->with('pesan', ['Success', 'Berhasil Hapus User']);
        } catch (\Exception) {
            return redirect(route('user.index'))->with('pesan', ['Danger', 'Gagal Hapus User']);

        }
    }

}


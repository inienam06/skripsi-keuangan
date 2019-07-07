<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Guru;

class TUController extends Controller
{
    function tambah()
    {
        return view('admin.pages.tu.tambah');
    }

    function simpan(Request $req)
    {
        if(Guru::where('email', $req->email)->count() > 0)
        {
            session()->flash('gagal', 'E-mail sudah digunakan !');

            return redirect()->back()->withInput($req->all());
        }
        else
        {
            Guru::create([
                'email' => $req->email,
                'password' => custom_crypt($req->password),
                'nama' => $req->nama,
                'jenis_kelamin' => $req->jenis_kelamin,
                'alamat' => $req->alamat,
                'tempat' => $req->tempat,
                'tanggal_lahir' => (!empty($req->tanggal_lahir)) ? date('Y-m-d', strtotime($req->tanggal_lahir)) : null,
                'level' => 2
            ]);
            session()->flash('sukses', 'Data tata usaha berhasil ditambahkan');

            return redirect()->route('admin.tu');
        }
    }

    function ubah($id)
    {
        $data = Guru::find($id);

        if(empty($data))
        {
            session()->flash('gagal', 'Data Akun TU tidak ditemukan !');

            return redirect()->route('admin.tu');
        }
        else
        {
            return view('admin.pages.tu.ubah', compact('data', 'id'));
        }
    }

    function perbarui(Request $req, $id)
    {
        $data = Guru::find($id);

        if(empty($data))
        {
            session()->flash('gagal', 'Data Akun TU tidak ditemukan !');

            return redirect()->back();
        }
        else
        {
            $data->update([
                'nama' => $req->nama,
                'jenis_kelamin' => $req->jenis_kelamin,
                'alamat' => $req->alamat,
                'tempat' => $req->tempat,
                'tanggal_lahir' => (!empty($req->tanggal_lahir)) ? date('Y-m-d', strtotime($req->tanggal_lahir)) : null
            ]);

            session()->flash('sukses', 'Data tata usaha berhasil diperbarui');

            return redirect()->route('admin.tu');
        }
    }

    function hapus($id)
    {
        $data = Guru::find($id);

        if(empty($data))
        {
            session()->flash('gagal', 'Data Akun TU tidak ditemukan !');

            return redirect()->route('admin.tu');
        }
        else
        {
            $data->delete();
            session()->flash('sukses', 'Data tata usaha berhasil dihapus');

            return redirect()->route('admin.tu');
        }
    }
}

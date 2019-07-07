<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Siswa extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nisn', 'password', 'no_induk', 'nama', 'nama_panggilan', 'jenis_kelamin', 'tempat', 'tanggal_lahir', 'alamat', 'asal_sekolah', 'nama_ayah', 'tempat_ayah', 'tanggal_lahir_ayah', 'pekerjaan_ayah', 'no_telp_ayah', 'nama_ibu', 'tempat_ibu', 'tanggal_lahir_ibu', 'pekerjaan_ibu', 'no_telp_ibu', 'created_at', 'updated_at'
    ];
}

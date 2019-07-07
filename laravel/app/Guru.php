<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Guru extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'tbl_guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'email', 'password', 'nama', 'jenis_kelamin', 'alamat', 'tempat', 'tanggal_lahir', 'level', 'created_at', 'updated_at'
    ];
}

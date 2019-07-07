<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'email', 'password', 'nama', 'alamat', 'created_at', 'updated_at'
    ];
}

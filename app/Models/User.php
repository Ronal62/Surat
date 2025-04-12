<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_kode',
        'user_name',
        'user_password',
        'user_role',
    ];

    protected $hidden = [
        'user_password',
    ];
}
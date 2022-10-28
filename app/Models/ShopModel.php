<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ShopModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'login', 'password'
    ];
    protected $table = 'admin_users';

    public function setPasswordAttribute($password){                        // хэширует вводимый пароль из формы
        $this->attributes['password'] = Hash::make($password);
    }


}

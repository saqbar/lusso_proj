<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class TestModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'surname','login', 'password','remember_token'];
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
    protected $table = 'my_users';


}

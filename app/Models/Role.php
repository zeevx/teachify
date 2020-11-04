<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_id','user_id'];

    use HasFactory;

    public function users(){

       return $this->belongsToMany('App\Models\user');

    }
}

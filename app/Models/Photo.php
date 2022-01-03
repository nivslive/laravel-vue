<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'user_photo';

    protected $fillable = [
        'name', 'image'
    ];



    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }





}

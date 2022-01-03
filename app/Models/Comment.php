<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = ['comment_photos'];
    protected $fillable = [
        'comment'
    ];


    public function photo() {
        return $this->belongsTo('App\Models\Photo');
    }
}

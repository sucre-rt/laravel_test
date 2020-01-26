<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // データの受け取りを許可する
    protected $fillable = ['title', 'body'];

    // アソシエーション
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}

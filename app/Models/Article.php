<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'body', 'state'];

    public function comments() {
        return $this->hasMany(ArticleComment::class);
    }
}

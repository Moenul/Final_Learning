<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];


    public function user()
    {
        return $this->belongsTO('App\Models\User');
    }

    public function photo()
    {
        return $this->belongsTO('App\Models\Photo');
    }

    public function category()
    {
        return $this->belongsTO('App\Models\Category');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    use HasFactory;
}

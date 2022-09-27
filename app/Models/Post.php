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
        'body',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    use HasFactory;
}

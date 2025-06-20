<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


  protected $fillable = [
        'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hearts()
    {
        return $this->hasMany('App\Models\Heart');
    }

}

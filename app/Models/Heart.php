<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    use HasFactory;

    protected $casts = [
        'heart' => 'boolean',
    ];


  public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


  public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    
}

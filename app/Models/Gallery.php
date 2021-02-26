<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
        
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}

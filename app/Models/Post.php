<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'posts';
    protected $casts = [
        'other_photos' => 'array',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

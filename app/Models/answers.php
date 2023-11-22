<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    use HasFactory;

    public function autorcomentario()
    {
        return $this->belongsTo(User::class,'author','id');
    }
}

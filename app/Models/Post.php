<?php

namespace App\Models;
use App\Models\User;
use App\Models\Answers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

   protected $fillable = [
        'title',
        'situation',
        'sugestion'
    ];

    public function autor()
    {
        return $this->belongsTo(User::class,'author','id');
    }

    public function answers()
    {
        return $this->hasMany(Answers::class, 'id_posts', 'id');
    }



}

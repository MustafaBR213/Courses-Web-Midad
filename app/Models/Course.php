<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','slug','description','image_path','user_id'
    ];

    public function user(){//propertie
        return $this->belongsTo(User::class);

    }

    public function video(){
        return $this->hasMany(Video::class);
    }
}

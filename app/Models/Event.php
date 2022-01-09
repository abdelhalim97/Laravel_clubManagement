<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table="events";

    protected $fillable = [
        'name',
        'club_id',
        'description',
        'img',
        'club_name'
    ];
    public function club(){
        return $this->belongsTo(Club::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}

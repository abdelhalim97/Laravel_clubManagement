<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $table="clubs";
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'img'
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function events(){
        return $this->hasMany(Event::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="comments";

    protected $fillable = [
        'event_id',
        'description',
        'user_id',
        'user_name'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function club(){
    //     return $this->belongsTo(Club::class);
    // }

}

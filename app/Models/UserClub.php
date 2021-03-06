<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClub extends Model
{
    use HasFactory;
    protected $table="club_user";
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'club_id',
    ];
}

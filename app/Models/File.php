<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'format',
        'size',
        'nameuser',
        'username',
        'user_email',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $table = 'admins';
    
    protected $fillable = [
        'username',
        'name',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'remember_token',
        'created_at',
        'updated_at',
        'last_login',
        'is_active',
        'type_user',
        'rol',
    ];
    /*
    protected $table = 'users';

    protected function title(): Attribute {
        return Attribute::make(
            set: function($value) {
                return strtolower($value);
            }
        );
    }

    protected function casts(): array {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
    */
}

?>
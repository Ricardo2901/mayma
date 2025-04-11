<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory;

    //protected $table = 'posts';

    protected function title(): Attribute {
        return Attribute::make(
            set: function($value) {
                return strtolower($value);
            }
        );
    }

    protected function casts(): array {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}

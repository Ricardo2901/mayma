<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
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

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Si es necesario, puedes agregar un accesor para manejar los roles de manera más sencilla
    public function isAdminLevelI()
    {
        return $this->role === 'Administrador Nv.1';
    }

    public function isAdminLevelII()
    {
        return $this->role === 'Administrador Nv.2';
    }

    public function isAdminLevelIII()
    {
        return $this->role === 'Admninistrador Nv.3';
    }
}

?>
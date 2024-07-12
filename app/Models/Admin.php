<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'role',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password; // Change to your custom password column name
    }
}

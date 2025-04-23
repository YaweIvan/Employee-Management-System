<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'admin_image',
        'admin_name',
        'admin_email',
        'admin_phone',
        'admin_role',
    ];
}

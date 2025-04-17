<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'employee_id',
        'image',
        'city',
        'district',
        'address',
        'department',
        'role',
    ];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  // This tells Laravel which fields are safe to be saved
  protected $fillable = ['department_name', 'shortform', 'department_code'];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = ['leave_name', 'no_of_days', 'status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    // Correct the column name from 'user_id' to 'employee_id'
    protected $fillable = [
        'employee_id',  // Use employee_id instead of user_id
        'leave_type_id',
        'from_date',
        'to_date',
        'submitted_on',
        'status',
    ];

    // Relationship to the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    // Relationship to the Leave model
    public function leaveType()
    {
        return $this->belongsTo(Leave::class, 'leave_type_id');
    }
}

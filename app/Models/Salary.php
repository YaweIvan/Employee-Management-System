<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    // Specify the table name (if it's not the plural form of the model)
    protected $table = 'salaries';

    // Specify the primary key name (if it's not "id")
    protected $primaryKey = 'No';

    // Disable auto-incrementing if 'No' isn't auto-incremented
    public $incrementing = true;

    // Specify primary key type
    protected $keyType = 'int';

    // Fields that are mass assignable
    protected $fillable = [
        'employee_id', // Updated from 'name' to 'employee_id'
        'pay_period',
        'basic_salary',
        'allowances',
        'net_pay',
    ];

    // Relationships
    public function employee()
    {
        // Updated from 'name' to 'employee_id' to match the new foreign key
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}

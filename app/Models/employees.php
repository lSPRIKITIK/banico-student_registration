<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'manager_id',
        'department_id',
    ];


    public function dependents()
    {
        return $this->hasMany(dependent::class, 'employee_id', 'employee_id');
    }
    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'job_id', 'job_id');
    }
    public function subordinates() 
    {
        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }
    public function manager() 
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');   
    }
    public function department()
    {
        return $this->belongsTo(departments::class, 'department_id', 'department_id');
    }
}   

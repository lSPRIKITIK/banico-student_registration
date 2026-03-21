<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    // 1. Tell Laravel your custom primary key name
    protected $primaryKey = 'employee_id';

    // 2. Define which fields can be "mass assigned" (filled via a form)
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

    /**
     * Relationship: An employee belongs to a Job Posting.
     */
    public function job(): BelongsTo
    {
        // Custom foreign key is 'job_id', owner key is also 'job_id'
        return $this->belongsTo(jobs::class, 'job_id', 'job_id');
    }

    /**
     * Relationship: An employee belongs to a Department.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(departments::class, 'department_id', 'department_id');
    }

    /**
     * Relationship: An employee has one Manager (who is also an employee).
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');
    }

    /**
     * Relationship: A manager has many subordinates (reporting employees).
     */
    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }
}
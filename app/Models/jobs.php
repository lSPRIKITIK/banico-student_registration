<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;

    protected $table ='jobs';
    protected $primaryKey = 'job_id';
    protected $fillable = [
        'job_title',
        'min_salary',
        'max_salary'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dependent extends Model
{
    use HasFactory;

    protected $table ='dependents';
    protected $primarykey ='dependent_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'relationship'
    ];

    public function employees() 
    {
        return $this->belongsTo(employees::class, 'employee_id', 'employee_id');
    }
}

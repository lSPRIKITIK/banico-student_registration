<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;

    protected $table ='departments';
    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id');
    }
    public function locations()
    {
        return $this->belongsTo(locations::class, 'location_id', 'location_id');
    }
}

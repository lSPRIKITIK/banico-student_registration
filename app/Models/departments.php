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

    public function Location()
    {
        return $this->belongsTo(locations::class, 'location_id', 'location_id');
    }

}

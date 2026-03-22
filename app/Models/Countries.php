<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    protected $primaryKey = 'country_id';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'country_id',
        'country_name',
        'region_id'
    ];

    public function Region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'region_id');
    }
    public function locations() 
    {
        return $this->hasMany(locations::class, 'country_id', 'country_id');
    }
}

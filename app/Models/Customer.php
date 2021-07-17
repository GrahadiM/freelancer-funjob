<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = ['id'];
    
    public function user()
	{
        return $this->belongsTo('App\Models\User', 'foreign_key', 'user_id', 'id');
	}
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'foreign_key', 'city_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'foreign_key', 'district_id', 'id');
    }
}

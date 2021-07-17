<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'kotas';
    protected $fillable = [
        'name',
        'slug',
    ];
    
    public function user()
	{
        return $this->belongsTo('App\Models\User');
	}
}

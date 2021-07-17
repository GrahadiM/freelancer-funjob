<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJasa extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = [
        'name',
        'slug'
    ];
    
    public function jasa()
	{
        return $this->hasMany('App\Models\Jasa');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $table = 'jasas';
    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'kategori_id',
        'image',
        'price',
        'desc',
        'status',
        'created_at',
    ];

    public function user()
	{
        return $this->belongsTo('App\Models\User');
	}
    public function kategori()
	{
        return $this->belongsTo('App\Models\KategoriJasa');
	}
}

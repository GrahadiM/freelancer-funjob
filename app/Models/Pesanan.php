<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = [
        'user_id',
        'jasa_id',
        'start_contract',
        'end_contract',
        'price',
        'note',
        'status',
        'created_at',
    ];
    
    public function user()
	{
        return $this->belongsTo('App\Models\User');
	}
    public function jasa()
	{
        return $this->belongsTo('App\Models\Jasa');
	}
}

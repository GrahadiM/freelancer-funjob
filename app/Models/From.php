<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class From extends Model
{
    use HasFactory;
    protected $table = 'froms';
    protected $fillable = [
        'user_id',
        'message',
    ];
    
    public function user()
	{
        return $this->belongsTo(User::class);
	}
    public function inbox()
	{
        return $this->hasMany(Inbox::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;
    protected $table = 'inboxes';
    protected $fillable = [
        'from_id',
        'to_id',
    ];
    
    public function from()
	{
        return $this->belongsTo(From::class);
	}
    public function to()
	{
        return $this->belongsTo(To::class);
	}
}

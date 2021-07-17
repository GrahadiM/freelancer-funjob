<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'status_id',
        'phone',
        'gender',
        'image',
        'kota_id',
        'kecamatan_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    public function kota()
    {
        return $this->belongsTo('App\Models\Kota');
    }
    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan');
    }
    public function komentar()
    {
        return $this->belongsTo('App\Models\Komentar');
    }
    public function to()
	{
        return $this->belongsTo('App\Models\To');
	}
    public function from()
	{
        return $this->belongsTo('App\Models\From');
	}
    public function inbox()
	{
        return $this->belongsTo('App\Models\Inbox');
	}
}

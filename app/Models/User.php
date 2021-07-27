<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
        'password',
        'role_id',
        'status_id',
        'kota_id',
        'kecamatan_id',
        'phone',
        'gender',
        'image',
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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

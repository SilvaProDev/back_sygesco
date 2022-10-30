<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Classe;
use App\Models\Role;
use Cache;
use App\Models\Affectation;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'sexe',
        'adresse',
        'image',
        'role_id',
        // 'last_seen',
        'is_online',
        'annee_id',
        'actived',
        'password',
    ];
    public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}
    public function roles(){
        return $this->belongsToMany(Role::class, "users_roles");
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class, "users_permissions");
    }
    
    public function classes(){
        return $this->belongsToMany(User::class);
    }
    public function affectations(){
        return $this->hasMany(Affectation::class, 'teacher_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
         'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
}

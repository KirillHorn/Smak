<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\baskets;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'id_role',
        'password',
    ];
    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    //     // return $this->belongsTo(Role::class);
    // }

    public function role()
{
    return $this->belongsTo(Role::class,'id_role');
}
    // protected $table="users";

    // protected $guarded= false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    function basket_products() {
        return $this->hasMany(baskets::class,"id_users");
    }
    function order() {
        return $this->hasMany(orders::class,"id_users");
    }

    function comment() {
        return $this->hasMany(comments::class,"id_user");
    }

    function cafe() {
        return $this->hasMany(Cafe::class,"id_users");
    }

   
}

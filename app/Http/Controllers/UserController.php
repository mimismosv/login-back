<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\{Builder, SoftDeletes};
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/* It's a user model that uses the tenant connection trait. */
class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    use TenantConnection;
    use SoftDeletes;
    use ArchivedRecords;
    use CanResetPassword;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/**
 * It returns the primary key of the user.
 *
 * @return The primary key of the user.
 */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

/**
 * > This function is used to add additional claims to the JWT
 *
 * @return An array of custom claims to be added to the JWT.
 */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

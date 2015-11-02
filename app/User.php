<?php
namespace Vogelzang;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Vogelzang\Models\Level;
use Vogelzang\Models\Rider;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'username', 'first_name', 'last_name', 'password', 'password_temp', 'level_id', 'active', 'code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function level()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function riders()
    {
        return $this->hasMany(Rider::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->level_id == 3;
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return $this->level_id == 2;
    }

    /**
     * @return bool
     */
    public function hasPrivileges()
    {
        return $this->level_id > 1;
    }
}

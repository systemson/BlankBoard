<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\UserEmailsTrait;
use App\Models\Traits\RolesPermissionTrait;
use App\Models\AccessLog;
use App\User as BaseUserModel;
use App\Models\Traits\ListableTrait;

class User extends BaseUserModel
{
    use SoftDeletes,
        UserEmailsTrait,
        RolesPermissionTrait,
        ListableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'last_name', 'email', 'password', 'status', 'image', 'description', 'last_login', 'last_password_change',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_password_change', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Get failed login attempts with a certain user.
     *
     * @return mixed
     */
    public function failed_login_attemps()
    {
        return $this->hasMany(AccessLog::class)
        ->where('event', 'failed');
    }

    /**
     * Display user avatar.
     *
     * @return string
     */
    public function image()
    {
        if (isset($this->image) && $this->image != null) {
            return asset('storage/' . $this->image);
        } else {
            return config('user.default_avatar');
        }
    }

    /**
     * Check if the user is active.
     *
     * @param boolean $new_user
     * @return boolean
     */
    public function isNew()
    {
        if ($this->last_password_change == null) {
            return true;
        }

        return false;
    }

    /**
     * Check if the user password is expired.
     *
     * @return boolean
     */
    public function passwordExpired()
    {
        /** Days from last password change */
        $passwordDays = $this->last_password_change != null ? $this->last_password_change->diffInDays() : 0;

        /** Days until password expiring */
        $days = config('user.password_expire');

        /** Check if the password is expired or the user is newly registered */
        if (($days > 0 && $passwordDays > $days) || $this->isNew()) {
            return true;
        }

        return false;
    }

    /**
     * Check if the user is active.
     *
     * @param boolean $new_user if true validate password expiry.
     * @return boolean
     */
    public function isActive($new_user = false)
    {
        if ($this->status > 0 || $this->isSuperAdmin()) {
            return true;
        } elseif ($new_user && $this->passwordExpired()) {
            return false;
        }

        return false;
    }

    /**
     * Check if the user is inactive.
     *
     * @return boolean
     */
    public function isInactive()
    {
        if ($this->status <= 0 && !$this->isSuperAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Check if the user is forbidden.
     *
     * @return boolean
     */
    public function isForbidden()
    {
        if ($this->status < 0 && !$this->isSuperAdmin()) {
            return true;
        }

        return false;
    }

    public static function resources($selectables, $filters = [], $sortables = [])
    {
        $query = self::select($selectables)
        ->where($filters);

        foreach ($sortables as $column => $order) {
            $query->orderBy($column, $order);
        }

        return $query;
    }
}

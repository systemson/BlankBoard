<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Email extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'subject', 'body', 'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Get the user that owns the email.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get emails with a certain user.
     *
     * @return mixed
     */
    public function recipients()
    {
        return $this->belongsToMany(User::class, 'email_user')
        ->latest();
    }
}

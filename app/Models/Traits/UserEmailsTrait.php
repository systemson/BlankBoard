<?php

namespace App\Models\Traits;

use App\Models\Email;

trait UserEmailsTrait
{
    /**
     * Get emails with a certain user.
     *
     * @return mixed
     */
    public function emails()
    {
        return $this->belongsToMany(Email::class)
        ->where('emails.status', '<>', 0)
        ->wherePivot('status', '>', 0)
        ->latest();
    }

    /**
     * Get unread emails with a certain user.
     *
     * @return mixed
     */
    public function unreadEmails()
    {
        return $this->belongsToMany(Email::class)
        ->where('emails.status', '<>', 0)
        ->wherePivot('is_read', '=', 0)
        ->wherePivot('status', '>', 0)
        ->latest();
    }

    /**
     * Get sent emails with a certain user.
     *
     * @return mixed
     */
    public function sentEmails()
    {
        return $this->belongsTo(Email::class, 'id', 'user_id')
        ->where('emails.status', 1)
        ->latest();
    }

    /**
     * Get draft emails with a certain user.
     *
     * @return mixed
     */
    public function draftEmails()
    {
        return $this->belongsTo(Email::class, 'id', 'user_id')
        ->where('emails.status', 0)
        ->latest();
    }

    /**
     * Get trashed emails with a certain user.
     *
     * @return mixed
     */
    public function trashedEmails()
    {
        $sent = $this->belongsTo(Email::class, 'id', 'user_id')
        ->where('emails.status', -1)
        ->get();

        $received = $this->belongsToMany(Email::class)
        ->wherePivot('status', '=', -1)
        ->get();

        return $sent->merge($received);
    }
}

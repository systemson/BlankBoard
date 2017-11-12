<?php

namespace App\Http\Models\Traits;

use App\Http\Models\Email;

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
        ->where('emails.status', '>', 0)
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
        ->where('emails.status', '>', 0)
        ->where('email_user.is_read', '==', 0)
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
        ->where('emails.status', '>', 0)
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
        ->where('emails.status', '==', 0)
        ->latest();
    }

}

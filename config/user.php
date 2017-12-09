<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Set the days to deactivate users that have no activity.
    |
    | **Not working yet**
    |--------------------------------------------------------------------------
    */

    'new_users' => true,

    /*
    |--------------------------------------------------------------------------
    | Set the days to deactivate users that have no activity.
    |
    | **Not working yet**
    |--------------------------------------------------------------------------
    |
    | 0 disable this feature.
    |
    */

    'deactivate_users_after' => 0,

    /*
    |--------------------------------------------------------------------------
    | Set the days to force a password change for users.
    |
    | **Not working yet**
    |--------------------------------------------------------------------------
    */

    'change_password_after' => 0,

    /*
    |--------------------------------------------------------------------------
    | Set the default password for new users.
    |--------------------------------------------------------------------------
    */

    'default_password' => 'secret',

    /*
    |--------------------------------------------------------------------------
    | Set the default avatar for the users that haven't set any avatar yet.
    |--------------------------------------------------------------------------
    */

    'default_avatar' => 'img/avatar/default.png',

    /*
    |--------------------------------------------------------------------------
    | Set the default disc for storing the avatar images
    |--------------------------------------------------------------------------
     */

    'default_disk' => 'public',

    /*
    |--------------------------------------------------------------------------
    | User role for super admin.
    |--------------------------------------------------------------------------
    |
    | Set the id or slug for the super admin role.
    |
    */

    'superuser' => 1,
];

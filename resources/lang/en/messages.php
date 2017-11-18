<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    // Statuses
    'status' => [
        1  => ['name' => 'Active', 'class' => 'label label-success'],
        0  => ['name' => 'Inactive', 'class' => 'label label-default'],
        -1 => ['name' => 'Suspended', 'class' => 'label label-warning'],
        -2 => ['name' => 'Cancelled', 'class' => 'label label-danger'],
    ],

    // Buttons
    'btn' => [
        'new' =>      ['name' => 'New', 'class' => 'btn btn-success'],
        'login' =>    ['name' => 'Sign in', 'class' => 'btn btn-success'],
        'send' =>     ['name' => 'Send', 'class' => 'btn btn-primary'],
        'save' =>     ['name' => 'Save', 'class' => 'btn btn-primary'],
        'register' => ['name' => 'Register', 'class' => 'btn btn-primary'],
        'profile' =>  ['name' => 'My profile', 'class' => 'btn btn-primary'],
        'delete' =>   ['name' => 'Delete', 'class' => 'btn btn-danger'],
        'cancel' =>   ['name' => 'Cancel', 'class' => 'btn btn-danger'],
        'logout' =>   ['name' => 'Sign out', 'class' => 'btn btn-danger'],
        'draft' =>    ['name' => 'Draft', 'class' => 'btn btn-default'],
        'reset' =>    ['name' => 'Restart', 'class' => 'btn btn-default'],
        'edit' =>     ['name' => 'Edit', 'class' => 'btn btn-default'],
        'settings' => ['name' => 'Settings', 'class' => 'btn btn-default'],
    ],

    // Actions
    'action' => [
        'trash' => '<i class="fa fa-trash"></i>',
        'archive' => '<i class="fa fa-archive"></i>',
        'status' => '<i class="fa fa-check"></i>',
    ],

    // Keywords
    'yes' => 'Yes',
    'no' => 'No',
    'help' => 'Help',
    'search' => 'Search',
    'new' => 'New',
    'show' => 'Show',
    'edit' => 'Edit',
    'create' => 'Create',
    'here' => 'Here',
    'reply' => 'Reply',
    'forward' => 'Forward',
    'delete' => 'Delete',

    // Alerts
    'alert' => [
        // Resources
        'resource-created' => 'New resource created.',
        'resource-updated' => 'Resource successfully updated.',
        'resource-deleted' => 'Resource deleted.',
        'resource-failed' => 'Resource not updated.',

        // Users
        'user-created' => 'New user created.',
        'user-updated' => 'User successfully updated.',
        'user-deleted' => 'User deleted.',

        // Emails
        'email-sended' => 'Email successfully sended.',
        'email-drafted' => 'Email drafted.',
        'email-updated' => 'Email updated.',
        'email-trashed' => 'Email moved to Trash folder.',
        'email-deleted' => 'Email permanently deleted.',
        'email-restored' => 'Email restored.',

        'avatar-updated' => 'Avatar successfully updated.',

        'password-success' => 'Password successfully updated.',

        'password-failed' => 'Password not updated.',
        'password-failed-small' => 'Check the spelling and try again. These are the main reasons: 1) The current password is wrong, 2) The password and the password confirmation do not match, 3) The new password is the same of the current one. If you still can\'t change it, contact an administrator.',

        'login' => 'Logged in.',
        'login-small' => 'You have been successfully logged in.',

        'logout' => 'Logged out.',
        'logout-small' => 'You have been successfully logged out.',

        'forbidden' => 'Access forbidden.',
        'forbidden-small' => 'You can not access the admin site. Try later or contact an administrator.',

        'denied' => 'Access denied.',
        'denied-small' => 'You have no access to this page.',

        'failed' => 'Action failed.',
        'failed-small' => 'Try again or contact an administrator.',

        'inactive' => 'Inactive account.',
        'inactive-small' => 'Your account has been deactivated. Please activate back your account if you want to interact with the admin site.',
    ],

    // Messages
    'access_denied' => 'Access denied. You have no access to this page.',
    'required_fields' => '(*) Required fields.',

    // Date format
    'date-format' => 'j M. Y g:i a'

];

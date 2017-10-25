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

    'status' => [
        1  => ['name' => 'Active', 'class' => 'label label-success'],
        0  => ['name' => 'Inactive', 'class' => 'label label-default'],
        -1 => ['name' => 'Canceled', 'class' => 'label label-danger'],
        -2 => ['name' => 'Suspended', 'class' => 'label label-warning'],
    ],

    'btn' => [
        'new' =>      ['name' => 'New', 'class' => 'btn btn-success'],
        'login' =>    ['name' => 'Sign in', 'class' => 'btn btn-success'],
        'send' =>     ['name' => 'Send', 'class' => 'btn btn-primary'],
        'save' =>     ['name' => 'Save', 'class' => 'btn btn-primary'],
        'register' => ['name' => 'Register', 'class' => 'btn btn-primary'],
        'delete' =>   ['name' => 'Delete', 'class' => 'btn btn-danger'],
        'cancel' =>   ['name' => 'Cancel', 'class' => 'btn btn-danger'],
        'logout' =>   ['name' => 'Sign out', 'class' => 'btn btn-danger'],
        'reset' =>    ['name' => 'Restart', 'class' => 'btn btn-default'],
        'edit' =>     ['name' => 'Edit', 'class' => 'btn btn-default'],
        'options' =>  ['name' => 'Options', 'class' => 'btn btn-default'],
    ],

    'action' => [
        'trash' => '<i class="fa fa-trash"></i>',
        'archive' => '<i class="fa fa-archive"></i>',
        'status' => '<i class="fa fa-check"></i>',
    ],

    'yes' => 'Yes',
    'no' => 'No',
    'help' => 'Help',
    'seach' => 'Seach',
    'new' => 'New',
    'show' => 'Show',
    'edit' => 'Edit',
];

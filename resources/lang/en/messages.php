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

];

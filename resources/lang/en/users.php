<?php

return [

    'title' => 'Users',
    'parent' => 'Access',
    'name' => 'user|users',
    'list' => ':Title list',
    'add' => 'Add new :name',
    'settings' => 'Settings',
    'show' => 'Profile',

    'table' => [
      'id' => 'ID',
      'action' => 'Action',
      'name' => 'Name',
      'status' => 'Status',
    ],

    'delete-self' => 'Action denied. You can\'t delete your own account.',
    'confirm-delete' => 'This action can be reverted. Are you sure?',

    /** Tab 1 */
    'tab-1' => 'Info',

    /** Tab 2 */
    'tab-2' => 'Messages',

    /** Tab 3 */
    'tab-3' => 'Basic settings',
    'adv-config' => 'Advanced settings',


    /** Tab 4 */
    'tab-4' => 'User data',

    /** Tab 5 */
    'tab-5' => 'Password',

    /** Tab 6 */
    'tab-6' => 'Image',

    // Alerts
    'resource-created' => 'New user created.',
    'resource-updated' => 'User successfully updated.',
    'resource-deleted' => 'User deleted.',

    'avatar-updated' => 'Avatar successfully updated.',

    'password-success' => 'Password successfully updated.',
    'password-failed' => 'Password not updated.',
    'password-failed-small' => 'The current password you provided doesn\'t match our records. Check the spelling and try again.',

];

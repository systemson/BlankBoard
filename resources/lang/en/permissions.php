<?php

return [

    'title' => 'Permissions',
    'parent' => 'Access',
    'name' => 'permission|permissions',
    'list' => ':Title list',
    'add' => 'Add new :name',
    'edit' => 'Edit :name :Resource',
    'view' => 'View :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Action',
      'name' => 'Name',
      'module' => 'Module',
      'slug' => 'Slug',
      'description' => 'Description',
      'status' => 'Status',
    ],

    // Alerts
    'resource-updated' => 'Permission successfully updated.',

    'confirm-delete' => 'This action can be reverted. Are you sure?',
];

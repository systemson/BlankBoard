<?php

return [

    'title' => 'Categories',
    'parent' => 'Content',
    'name' => 'category|categories',
    'list' => ':Title list',
    'add' => 'Add new :name',
    'edit' => 'Edit :name :Resource',
    'view' => 'View :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Action',
      'name' => 'Name',
      'description' => 'Description',
      'status' => 'Status',
    ],

    // Alerts
    'resource-created' => 'New category created.',
    'resource-updated' => 'Category successfully updated.',
    'resource-deleted' => 'Category deleted.',

    'confirm-delete' => 'This action can be reverted. Are you sure?',
];

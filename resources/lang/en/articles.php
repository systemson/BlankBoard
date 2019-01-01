<?php

return [

    'title' => 'Article',
    'parent' => 'Content',
    'name' => 'article|articles',
    'list' => ':Title list',
    'add' => 'Add new :name',
    'edit' => 'Edit :name :Resource',
    'view' => 'View :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Action',
      'title' => 'Title',
      'author' => 'Author',
      'category' => 'Category',
      'url_alias' => 'Url alias',
      'author_alias' => 'Author alias',
      'description' => 'Description',
      'content' => 'Content',
      'status' => 'Status',
    ],

    // Alerts
    'resource-created' => 'New category created.',
    'resource-updated' => 'Category successfully updated.',
    'resource-deleted' => 'Category deleted.',

    'confirm-delete' => 'This action can be reverted. Are you sure?',
];

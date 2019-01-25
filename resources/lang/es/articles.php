<?php

return [

    'title' => 'Publicaciones',
    'parent' => 'Contenido',
    'name' => 'publicación|publicaciones',
    'list' => 'Listado de :title',
    'add' => 'Agregar nueva :name',
    'edit' => 'Editar :name :Resource',
    'view' => 'Ver :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Acción',
      'title' => 'Título',
      'category_id' => 'Categoría',
      'author_id' => 'Autor',
      'url_alias' => 'Alias de la Url',
      'author_alias' => 'Alias del autor',
      'image_file' => 'Imagen',
      'description' => 'Descripción',
      'content' => 'Contenido',
      'created_at' => 'Creado',
      'status' => 'Estado',
    ],

    // Alerts
    'resource-created' => 'Nueva publicación creada.',
    'resource-updated' => 'Publicación actualizada satisfactoriamente.',
    'resource-deleted' => 'Publicación eliminada.',

    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',
];

<?php

return [

    'title' => 'Publicaciones',
    'parent' => 'Contenido',
    'name' => 'publicacion|publicaciones',
    'list' => 'Listado de :title',
    'add' => 'Agregar nueva :name',
    'edit' => 'Editar :name :Resource',
    'view' => 'Ver :name :Resource',

    'table' => [
      'id' => 'ID',
      'action' => 'Acción',
      'title' => 'Titulo',
      'author' => 'Autor',
      'category' => 'Categoria',
      'url_alias' => 'Alias de la Url',
      'author_alias' => 'Alias del autor',
      'description' => 'Descripción',
      'content' => 'Contenido',
      'status' => 'Estado',
    ],

    // Alerts
    'resource-created' => 'Nueva publicacion creada.',
    'resource-updated' => 'Publicacion actualizada satisfactoriamente.',
    'resource-deleted' => 'Publicacion eliminada.',

    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',
];

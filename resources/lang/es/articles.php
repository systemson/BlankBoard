<?php

return [

    'title' => 'Articulos',
    'parent' => 'Contenido',
    'name' => 'articulo|articulos',
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
    'resource-created' => 'Nueva articulo creado.',
    'resource-updated' => 'Articulo actualizado satisfactoriamente.',
    'resource-deleted' => 'Articulo eliminado.',

    'confirm-delete' => 'Esta acción no puede ser revertida. ¿Estás seguro?',
];

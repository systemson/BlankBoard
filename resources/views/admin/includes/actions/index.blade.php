@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($module->slug . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $module->slug, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($module->slug . '.parent')]])
<!-- /. content header -->
@stop

@section('content')
   @include('admin.includes.actions.list', ['resources' => $resources, 'module' => $module])
@stop

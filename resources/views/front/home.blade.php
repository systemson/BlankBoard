@extends('layouts.app')

@section('content')
@forelse ($components as $component)
<div id="component-{{ strtolower($component->name) }}">
  {!! $component->content !!}
</div>
@empty
@include('front.default')
@endforelse
@endsection


@extends('layouts.app')

@section('content')
@forelse ($components as $component)
  {!! $component->content !!}
@empty
@include('front.default')
@endforelse
@endsection


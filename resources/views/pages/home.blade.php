@extends('layouts.app')
{{-- @section('title')
Main page
@endsection --}}
@section('content')
<nav>
  <ul>
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('pets') }}">Pets</a></li>
  </ul>
</nav>
@endsection
@extends('layouts.app')
{{-- @section('title')
Main page
@endsection --}}
@section('content')
<div>Pets</div>
<button >Edit pet</button>
{{-- <form id="delete-pet-form" method="POST" action="{{ route('pet.delete', ['id' => $petId]) }}">
  @csrf
  @method('DELETE')
  <button type="submit" onclick="return confirm('Are you sure you want to delete this pet?')">Delete Pet</button>
</form> --}}
@foreach ($pets as $pet)
<li >
    <strong>Name:</strong> {{ $pet['name'] ?? 'N/A' }} <br>
    <strong>Status:</strong> {{ $pet['status'] ?? 'N/A' }}
</li>
@endforeach
@endsection
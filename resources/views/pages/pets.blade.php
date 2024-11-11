<?php $i = 1; ?>
@extends('layouts.app')

@section('content')
    <h1>Pets</h1>

    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $pet['name'] ?? '' }}</td>
                    <td>{{ $pet['status'] ?? '' }}</td>
                    <td>{{ $pet['id'] ?? '' }}</td>
                    <td class="d-flex ">
                        <div class='p-1'><a href="{{ route('pet', ['id' => $pet['id']]) }}"><button type="button"
                                    class="btn btn-primary"> Pet
                                    details</button></a></div>
                        <div class='p-1'><button type="button" class="btn btn-secondary">Edit
                                pet</button></div>
                        <div class='p-1'>
                            <form id="delete-pet-form" method="POST"
                                action="{{ route('petDelete', ['id' => $pet['id']]) }}">
                                @csrf
                                @method('DELETE')<button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this pet?')">Delete
                                    pet</button></form>
                        </div>

                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
@endsection

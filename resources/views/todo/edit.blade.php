@extends('layouts.app')

@section('title', 'Edit To-Do')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit To-Do</div>
                    <div class="card-body">
                        <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col-md-10 mb-3">
                                    <label for="name" class="sr-only">To-Do</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ToDo" value="{{ $todo->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('todo.index') }}" class="btn btn-outline-primary btn-md"><i class="fas fa-arrow-left"></i></a>
                                    <button type="submit" class="btn btn-outline-dark btn-md"><i class="far fa-edit"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


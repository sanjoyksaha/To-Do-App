@extends('layouts.app')

@section('title', 'To-Do')

@push('css')
    <style>
        .strickthrough{
            text-decoration: line-through;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <button class="btn btn-primary btn-md" id="add_button"><i class="fas fa-plus mr-2"></i>Add New Todo</button>

                <div class="card add_todo mt-3">
                    <div class="card-body">
                        <form action="{{ route('todo.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="name" class="sr-only">To-Do</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ToDo Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-outline-dark btn-md btn-block"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                @include('include.message')

                <div class="card mt-3">
                    <div class="card-header">To-Do Lists</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td class="name">{{ $todo->name }}</td>
                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm delete" value="{{ $todo->id }}"><i class="far fa-window-close"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.add_todo').hide();
            $('#add_button').on('click', function () {
                $('.add_todo').toggle();
            });
        });

        $(document).ready(function () {

            $('.delete').on('click', function () {
                let element = $(this).parent().parent().find('.name');
                let id = $(this).val();

                $.ajax({
                    url: '/todo/delete/'+id,
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        element.addClass('strickthrough');
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endpush

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parents list - Total: {{ !empty($users) ? count($users) : '' }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        @include('shared.message')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('parents.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" name="nameAndEmail">
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>
                @if (count($users) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 70px">profile picture</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>status</th>
                                                <th>join at</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                                <th>info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>
                                                        {{-- @if (!empty($user->get_imageURL())) --}}
                                                        <img class="img-fluid img-circle"
                                                        src="{{ $user->get_imageURL() }}" alt="{{$user->id}}">

                                                        {{-- @endif --}}
                                                        </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->status)
                                                         married

                                                        @else
                                                         divorced

                                                        @endif
                                                    </td>

                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('parents.edit', $user->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            set Parent Info</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">delete</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('parents.show', $user->id) }}" class="">
                                                            <span class="glyphicon glyphicon-arrow-right">info</span></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>

                        </div>


                    </div>
                    {{ $users->withQueryString()->links() }}
                @else
                    No Result Found
                @endif
            </div>
        </section>

    </div>
@endsection

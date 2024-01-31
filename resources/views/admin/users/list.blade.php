@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users list - Total: {{ !empty($users) ? count($users) : '' }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        <a class="btn btn-primary" href="{{ route('users.create') }}">Add new User</a>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        @include('shared.message')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('users.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" name="nameAndEmail">
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                              <select class="form-control" name="searchRole">
                                <option value=''>filter by Role</option>
                                <option value=1>Admin</option>
                                <option value=2>Teacher</option>
                                <option value=3>Student</option>
                                <option value=4>Parent</option>
                              </select>
                            </div>
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
                                                <th>name</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th>join at</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    @if ($user->role === 1)
                                                        <td>Admin</td>
                                                    @elseif($user->role === 2)
                                                        <td>Teacher</td>
                                                    @elseif($user->role === 4)
                                                        <td>Parent</td>
                                                    @else
                                                        <td>Student</td>
                                                    @endif
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            edit</a>
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
                @endif
            </div>
        </section>

    </div>
@endsection

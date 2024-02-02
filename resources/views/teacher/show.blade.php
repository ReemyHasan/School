@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $user->name }} profile </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->get_imageUrl() }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">
                                    {{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Teacher' : ($user->role === 4 ? 'Parent' : 'Student')) }}
                                </p>
                                <p class="text-muted text-center">
                                    {{ $user->gender }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About</h3>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="my_students">
                                        <strong><i class="fas fa-book mr-1"></i> occupation</strong>

                                        <p class="text-muted">
                                            {{ $user->occupation }}
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> address</strong>

                                        <p class="text-muted">
                                            {{ $user->address }}
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> mobile number</strong>

                                        <p class="text-muted">
                                            {{ $user->mobile_number }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students list - Total: {{ !empty($teacher_classes_students) ? count($teacher_classes_students) : '' }} </h1>
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
                <form action="{{ route('teachers.show', $user->id) }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" name="nameAndEmail">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>
                @if (count($teacher_classes_students) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>parent</th>
                                                <th>email</th>
                                                <th>status</th>
                                                <th>class</th>
                                                <th>subject</th>
                                                <th>join at</th>
                                                <th>info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teacher_classes_students as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{
                                                    (!empty($user->parent->name))? $user->parent->name : '-'
                                                     }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->status)
                                                         Active

                                                        @else
                                                         Inactive

                                                        @endif
                                                    </td>
                                                    <td>{{$user->class_name}}</td>
                                                    <td>{{$user->subject_name}}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('students.show', $user->id) }}" class="">
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
                @else
                    No Result Found
                @endif
            </div>
        </section>
    </div>


@endsection

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-weight: 800">{{ $class->name }} </h1>
                    </div>

                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Subjects list - Total: {{ !empty($subjects) ? count($subjects) : '' }} </h4>
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
                @if (count($subjects) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>type</th>
                                                <th>teacher</th>
                                                <th>status</th>
                                                <th>created_by</th>
                                                <th>created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->type }}</td>
                                                    <td>{{$subject->teacher->name}}</td>
                                                    @if ($subject->status)
                                                    <td> Active</td>

                                                    @else
                                                    <td> Inactive</td>

                                                    @endif
                                                    <td>{{ $subject->user->name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($subject->created_at)) }}</td>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>


                    </div>
                @endif
            </div>
        </section>
<hr>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Students list - Total: {{ !empty($students) ? count($students) : '' }} </h4>
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
        <form action="{{ route('classes.show', $class->id) }}" method="GET">
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
        @if (count($students) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 70px">profile picture</th>
                                        <th>name</th>
                                        <th>parent</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>join at</th>
                                        <th>info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $user)
                                        <tr>
                                            <td>
                                                {{-- @if (!empty($user->get_imageURL())) --}}
                                                <img class="img-fluid img-circle"
                                                src="{{ $user->get_imageURL() }}" alt="{{$user->id}}">

                                                {{-- @endif --}}
                                                </td>
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

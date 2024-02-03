@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-weight: 800">{{ $class->name }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        <a class="btn btn-primary" href="{{ route('timetables.create',$class->id) }}">update timetable</a>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        @include('shared.message')
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                     <div class="col-sm-6">
                        <h4>Timetable </h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
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
                                            <th>status</th>
                                            <th>created_by</th>
                                            <th>created_at</th>
                                            <th>edit</th>
                                            <th>class timetable</th>
                                            <th>delete</th>
                                            <th>details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->name }}</td>
                                                @if ($class->status)
                                                <td> Active</td>

                                                @else
                                                <td> Inactive</td>

                                                @endif
                                                <td>{{ $class->user->name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($class->created_at)) }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                            <!-- /.card-body -->
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Classes list - Total: {{ !empty($classes) ? count($classes) : '' }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        <a class="btn btn-primary" href="{{ route('classes.create') }}">Add new class</a>
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
                <form action="{{ route('classes.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" name="Search">
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>

                @if (count($classes) > 0)
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
                                                <th>Set class timetable</th>
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
                                                    <td>
                                                        <a href="{{ route('classes.edit', $class->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            edit</a>
                                                    </td>
                                                    <td >
                                                        <a href="{{ route('classes.show', $class->id) }}"
                                                            class="ml-md-5">
                                                            <span class="glyphicon glyphicon-arrow-right">set</span></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('classes.destroy', $class->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">delete</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('classes.show', $class->id) }}"
                                                            class="">
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
                    {{ $classes->withQueryString()->links() }}
                @endif
            </div>
        </section>

    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-weight: 800">{{ $subject->name }}</h1>
                        <h4>Classes related - Total: {{ !empty($classes) ? count($classes) : '' }} </h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                @if (count($classes) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>status</th>
                                                <th>created_by</th>
                                                <th>created_at</th>
                                                @can('subjects.create')
                                                    <th>edit</th>
                                                    <th>delete</th>
                                                @endcan
                                                <th>details</th>
                                                <th>students</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($classes as $class)
                                                <tr>
                                                    <td>{{ $class->name }}</td>
                                                    @if ($class->status)
                                                        <td> Active</td>
                                                    @else
                                                        <td> Inactive</td>
                                                    @endif
                                                    <td>{{ $class->user->name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($class->created_at)) }}</td>
                                                    @can('subjects.create')
                                                        <td>
                                                            <a href="{{ route('classes.edit', $class->id) }}"
                                                                class="btn btn-secondary btn-sm">
                                                                edit</a>
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
                                                    @endcan

                                                    <td>
                                                        <a href="{{ route('classes.show', $class->id) }}" class="">
                                                            <span class="glyphicon glyphicon-arrow-right">info</span></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('classes.students', $class->id) }}"
                                                            class="btn btn-secondary btn-sm ml-5">
                                                        -></a>
                                                </tr>
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

    </div>
@endsection

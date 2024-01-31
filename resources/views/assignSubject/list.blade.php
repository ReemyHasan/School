@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Subject to classes table</h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        <a class="btn btn-primary" href="{{ route('assign_subject.create') }}">Add new assignment</a>
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
                <form action="{{ route('assign_subject.index') }}" method="GET">
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

                @if (count($assignments) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>class</th>
                                                <th>subject</th>
                                                <th>created_by</th>
                                                <th>created_at</th>
                                                <th>status</th>
                                                <th>activation</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignments as $assignment)
                                                <tr>
                                                    <td>{{ $assignment->id }}</td>
                                                    <td>{{ $assignment->class->name }}</td>
                                                    <td>{{ $assignment->subject->name }}</td>
                                                    <td>{{ $assignment->user->name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($assignment->created_at)) }}</td>
                                                    <td>{{ ($assignment->status==0)?"inactive":"active" }}</td>
                                                    <td>
                                                        <form action="{{ route('assign_subject.activate', $assignment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit"
                                                                class="btn {{ ($assignment->status==1)? "btn-danger": "btn-success"}} btn-sm">
                                                                {{ ($assignment->status==0)?"activate":"deactivate" }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                    {{-- <td>
                                                        <a href="{{ route('assign_subject.edit', $assignment->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            edit</a>
                                                    </td> --}}
                                                    <td>
                                                        <form action="{{ route('assign_subject.destroy', $assignment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">delete</button>
                                                        </form>
                                                    </td>
                                                    {{-- <td>
                                                        <a href="{{ route('assign_subject.show', $class->id) }}"
                                                            class="">
                                                            <span class="glyphicon glyphicon-arrow-right">info</span></a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>

                        </div>


                    </div>
                    {{ $assignments->withQueryString()->links() }}
                @endif
            </div>
        </section>

    </div>
@endsection

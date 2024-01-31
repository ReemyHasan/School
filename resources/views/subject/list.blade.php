@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subjects list - Total: {{ !empty($subjects) ? count($subjects) : '' }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        <a class="btn btn-primary" href="{{ route('subjects.create') }}">Add new subject</a>
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
                <form action="{{ route('subjects.index') }}" method="GET">
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

                @if (count($subjects) > 0)
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
                                                <th>type</th>
                                                <th>status</th>
                                                <th>created_by</th>
                                                <th>created_at</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr>
                                                    <td>{{ $subject->id }}</td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->type }}</td>
                                                    @if ($subject->status)
                                                    <td> Active</td>

                                                    @else
                                                    <td> Inactive</td>

                                                    @endif
                                                    <td>{{ $subject->user->name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($subject->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('subjects.edit', $subject->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('subjects.destroy', $subject->id) }}"
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
                    {{ $subjects->withQueryString()->links() }}
                @endif
            </div>
        </section>

    </div>
@endsection

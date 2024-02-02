@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$teacher->name}} Subjects list - Total: {{ !empty($subjects) ? count($subjects) : '' }} </h1>
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
                                                <th>status</th>
                                                <th>created_by</th>
                                                <th>created_at</th>
                                                <th>classes related</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr>
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
                                                    <a href="{{ route('subject.classes.list', $subject->id) }}"
                                                        class="btn btn-secondary btn-sm ml-5">
                                                    -></a>
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
                @endif
            </div>
        </section>

    </div>
@endsection

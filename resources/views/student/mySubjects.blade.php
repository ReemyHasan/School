@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-weight: 800">{{Auth::user()->class->name}}</h1>
                        <h4>Subjects list - Total: {{ !empty($subjects) ? count($subjects) : '' }} </h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- <form action="{{ route('subjects.index') }}" method="GET">
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

                </form> --}}

                @if (count($subjects) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>type</th>
                                                <th>status</th>
                                                <th>teacher</th>
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
                                                    <td>{{ $subject->teacher->name }}</td>
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

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exams list - Total: {{ !empty($exams) ? count($exams) : '' }} </h1>
                    </div>
                    @can('create', Auth::user())
                        <div class="col-sm-12" style="text-align: right">
                            <a class="btn btn-primary" href="{{ route('exams.create') }}">Add new exam</a>
                        </div>
                        <div class="col-sm-6" style="text-align: right">
                            @include('shared.message')
                        </div>
                    @endcan

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('exams.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" placeholder="exam_name" name="exam_name">
                        </div>
                        <div class="form-group col-sm-3">
                            <select class="form-control" name="subject_id">
                                <option value=''>select subject</option>
                                @foreach ($subjects as $subject)
                                    <option value={{ $subject->id }}>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>

                @if (count($exams) > 0)
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
                                                <th>subject</th>
                                                <th>teacher name</th>
                                                <th>exam date</th>
                                                <th>full mark</th>
                                                <th>passing mark</th>
                                                <th>start time</th>
                                                <th>end time</th>
                                                <th>edit</th>
                                                @can('delete', Auth::user())
                                                    <th>delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exams as $exam)
                                                <tr>
                                                    <td>{{ $exam->id }}</td>
                                                    <td>{{ $exam->name }}</td>
                                                    <td>{{ $exam->subject->name }}</td>
                                                    @if ($exam->subject->teacher_id != null)
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $exam->subject->teacher->name }}</td>
                                                    @else
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;-</td>
                                                    @endif
                                                    <td>{{ $exam->date }}</td>
                                                    <td>{{ $exam->full_mark }}</td>
                                                    <td>{{ $exam->passing_mark }}</td>
                                                    <td>{{ $exam->start_time }}</td>
                                                    <td>{{ $exam->end_time }}</td>
                                                    <td>
                                                        <a href="{{ route('exams.edit', $exam->id) }}"
                                                            class="btn btn-secondary btn-sm">
                                                            edit</a>
                                                    </td>
                                                    @can('delete', Auth::user())
                                                        <td>
                                                            <form action="{{ route('exams.destroy', $exam->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">delete</button>
                                                            </form>
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </div>


                    </div>
                    {{ $exams->withQueryString()->links() }}
                @else
                    no result found
                @endif
            </div>
        </section>

    </div>
@endsection

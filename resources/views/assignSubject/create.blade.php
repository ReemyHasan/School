@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>ADD NEW SUBJECT TO CLASS</h1>
                    </div>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    @include('shared.message')
                </div>
            </div>

        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <form action="{{ route('assign_subject.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <label for="class_id">Class</label>
                                            <select class="form-control" name="class_id" required>
                                                <option value="">select class</option>
                                                @foreach ($classes as $class)
                                                    <option value={{ $class->id }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <h4>assign Subjects</h4>
                                            @foreach ($subjects as $subject)
                                                <div>
                                                    <label for="subject">{{ $subject->name }}
                                                    </label>
                                                    <input type="checkbox"
                                                    value="{{ $subject->id }}"
                                                     name="subject[]">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>


                </div>

            </div>
    </div>
    </section>
    </div>
@endsection

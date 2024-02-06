@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>ADD NEW EXAM</h1>
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

                            <form action="{{ route('exams.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="full_mark">full mark</label>
                                        <input type="number" class="form-control"
                                        min= '0'
                                        id="full_mark" name="full_mark"
                                            placeholder="Enter full mark">
                                        @error('full_mark')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="passing_mark">passing mark</label>
                                        <input type="number"
                                        min= '0'
                                        class="form-control" id="passing_mark" name="passing_mark"
                                            placeholder="Enter passing mark">
                                        @error('passing_mark')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date">date</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            placeholder="">
                                        @error('date')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">start_time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            placeholder="">
                                        @error('start_time')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">end_time</label>
                                        <input type="time" class="form-control" id="end_time" name="end_time"
                                            placeholder="">
                                        @error('end_time')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="subject_id">subject</label>
                                            <select class="form-control" name="subject_id">
                                                @foreach ($subjects as $subject)
                                                <option value={{$subject->id}}>{{$subject->name}}</option>
                                                @endforeach
                                            </select>
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

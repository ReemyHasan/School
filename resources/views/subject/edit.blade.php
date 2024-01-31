@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>EDIT SUBJECT</h1>
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

                            <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $subject->name) }}">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type">type</label>
                                        <select class="form-control" name="type">
                                            <option value="theory" {{ $subject->type === 'theory' ? 'selected' : '' }}>
                                                theory
                                            </option>
                                            <option value="practical"
                                                {{ $subject->type === 'practical' ? 'selected' : '' }}>practical
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="role">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $subject->status === 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ $subject->status === 0 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
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

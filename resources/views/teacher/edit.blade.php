@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Set teacher Info</h1>
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

                            <form enctype="multipart/form-data" action="{{ route('teachers.update', $teacher->id) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body row">
                                    <div class="form-group col-sm-3">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $teacher->name) }}">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $teacher->email) }}">
                                        @error('email')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $teacher->address) }}">
                                        @error('address')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="mobile_number">mobile_number</label>
                                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number"
                                            value="{{ old('mobile_number', $teacher->mobile_number) }}">
                                        @error('mobile_number')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="image" class="mt3">Picture</label>
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="role">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $teacher->status === 1 ? 'selected' : '' }}>
                                                    active
                                                </option>
                                                <option value="0" {{ $teacher->status === 0 ? 'selected' : '' }}>
                                                    inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-sm-12">
                                        <div class="form-group">
                                            <h4>subjects</h4>
                                            @foreach ($subjects as $subject)
                                                <div>
                                                    <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]"

                                                        {{ ($subject->teacher_id != $teacher->id) ? 'disabled':'' }}
                                                        {{ !empty(in_array($subject->id, $checked)) ? 'checked' : '' }}>
                                                    <label for="subject_id"
                                                    style="{{ ($subject->teacher_id != $teacher->id) ? 'color: gray;':'' }}"
                                                    >{{ $subject->name }}
                                                    </label>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class=" col-sm-12">
                                        <div class="form-group">
                                            <h4>Gender</h4>
                                            <div>
                                                <input type="radio" value="male" name="gender"
                                                    {{ $teacher->gender == 'male' ? 'checked' : '' }}>
                                                <label for="gender">male
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" value="female" name="gender"
                                                    {{ $teacher->gender == 'female' ? 'checked' : '' }}>
                                                <label for="gender">female
                                                </label>
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

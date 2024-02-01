@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Set Student Info</h1>
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

                            <form enctype="multipart/form-data" action="{{ route('students.update', $student->id) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body row">
                                    <div class="form-group col-sm-3">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $student->name) }}">
                                        @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $student->email) }}">
                                        @error('email')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="admission_number">admission_number</label>
                                        <input type="text" class="form-control" id="admission_number"
                                            name="admission_number"
                                            value="{{ old('admission_number', $student->admission_number) }}">
                                        @error('admission_number')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="admission_date">admission_date</label>
                                        <input type="date" class="form-control" name="admission_date">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="roll_number">roll_number</label>
                                        <input type="text" class="form-control" id="roll_number" name="roll_number"
                                            value="{{ old('roll_number', $student->roll_number) }}">
                                        @error('roll_number')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="cast">cast</label>
                                        <input type="text" class="form-control" id="cast" name="cast"
                                            value="{{ old('cast', $student->cast) }}">
                                        @error('cast')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="mobile_number">mobile_number</label>
                                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number"
                                            value="{{ old('mobile_number', $student->mobile_number) }}">
                                        @error('mobile_number')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="date_of_birth">date_of_birth</label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $student->date_of_birth }}">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="height">height - cm</label>
                                        <input type="text" class="form-control" id="height" name="height"
                                            value="{{ old('height', $student->height) }}">
                                        @error('height')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="weight">weight - kg</label>
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            value="{{ old('weight', $student->weight) }}">
                                        @error('weight')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="class_id">Class</label>
                                        <select class="form-control" name="class_id" required>
                                            <option value="">select class</option>
                                            @foreach ($classes as $class)
                                                <option value={{ $class->id }}
                                                    {{ $student->class->id == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}</option>
                                            @endforeach
                                        </select>
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
                                                <option value="1" {{ $student->status === 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0" {{ $student->status === 0 ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="parent_id">Student Parent</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="">select option</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}"
                                                        @if (!empty($student->parent->id))
                                                        {{ $student->parent->id == $parent->id ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $parent->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-sm-12">
                                        <div class="form-group">
                                            <h4>Gender</h4>
                                            <div>
                                                <input type="radio" value="male" name="gender"
                                                    {{ $student->gender == 'male' ? 'checked' : '' }}>
                                                <label for="gender">male
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" value="female" name="gender"
                                                    {{ $student->gender == 'female' ? 'checked' : '' }}>
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

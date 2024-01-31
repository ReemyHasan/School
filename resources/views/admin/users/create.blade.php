@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>ADD NEW USER</h1>
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

                            <form action="{{route("admins.store")}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                            @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                            @error('email')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                            @error('password')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password"
                                            name="password_confirmation" placeholder="confirm password">

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="role">Role</label>
                                          <select class="form-control" name="role">
                                            <option value=1>Admin</option>
                                            <option value=2>Teacher</option>
                                            <option value=3>Student</option>
                                            <option value=4>Parent</option>
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

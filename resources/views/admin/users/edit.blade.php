@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>EDIT USER</h1>
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

                            <form action="{{route("users.update",$user->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                        value="{{old('name', $user->name)}}">
                                            @error('name')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                        value="{{old('email', $user->email)}}">
                                            @error('email')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                        value="{{$user->password}}">
                                            @error('password')
                                            <div class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password"
                                            name="password_confirmation" value="{{$user->password}}">

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label for="role">Role</label>
                                          <select class="form-control" name="role">
                                            <option value="1" {{$user->role === 1 ? 'selected' :''}}>Admin</option>
                                            <option value="2" {{$user->role === 2 ? 'selected' :''}}>Teacher</option>
                                            <option value="3" {{$user->role === 3 ? 'selected' :''}}>Student</option>
                                            <option value="4" {{$user->role === 4 ? 'selected' :''}}>Parent</option>
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

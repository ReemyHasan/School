@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$user->name}} profile </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{$user->get_imageUrl()}}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>

                                <p class="text-muted text-center">
                                    {{ ($user->role === 1) ? 'Admin'
                                    :
                                      (($user->role === 2)  ? 'Teacher'
                                    :
                                      (($user->role === 4) ? 'Parent' : 'Student')) }}
                                </p>
                                <p class="text-muted text-center">
                                    {{ $user->gender}}
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    {{ (!empty($user->class))? $user->class->name : 'No class yet' }}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Parent</strong>

                                <p class="text-muted">{{
                                (!empty($user->parent->name))? $user->parent->name : 'No parent'
                                }}</p>

                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Date of Birth</strong>

                                <p class="text-muted">{{$user->date_of_birth}}</p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> admission number</strong>

                                <p class="text-muted">
                                    {{$user->admission_number}} : {{$user->admission_date}}
                                </p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> mobile number</strong>

                                <p class="text-muted">
                                    {{$user->mobile_number}}
                                </p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> roll number</strong>

                                <p class="text-muted">
                                    {{$user->roll_number}}
                                </p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i>cast</strong>

                                <p class="text-muted">
                                    {{$user->cast}}
                                </p>

                                <hr>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Notes</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                    <h6 style="color:blue; font-weight:900;">teacher name</h6>
                                                </span>
                                                <span class="description">subject with shared time</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                teacher notes
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

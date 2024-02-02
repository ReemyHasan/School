@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $user->name }} profile </h1>
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

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">
                                    {{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Teacher' : ($user->role === 4 ? 'Parent' : 'Student')) }}
                                </p>
                                <p class="text-muted text-center">
                                    {{ $user->gender }}
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->

                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> occupation</strong>

                                <p class="text-muted">
                                    {{ $user->occupation }}
                                </p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> address</strong>

                                <p class="text-muted">
                                    {{ $user->address }}
                                </p>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> mobile number</strong>

                                <p class="text-muted">
                                    {{ $user->mobile_number }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Students - Total: {{ !empty($users) ? count($users) : '' }} </h1>
                    </div>
                    <div class="col-sm-12" style="text-align: right">
                        @include('shared.message')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (count($users) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px">profile picture</th>
                                                <th>name</th>
                                                <th>parent</th>
                                                <th>email</th>
                                                <th>status</th>
                                                <th>join at</th>
                                                <th>calss subjects</th>
                                                <th>info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        {{-- @if (!empty($user->get_imageURL())) --}}
                                                        <img class="img-fluid img-circle"
                                                        src="{{ $user->get_imageURL() }}" alt="{{$user->id}}">

                                                        {{-- @endif --}}
                                                        </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{
                                                    (!empty($user->parent->name))? $user->parent->name : '-'
                                                     }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->status)
                                                         Active

                                                        @else
                                                         Inactive

                                                        @endif
                                                    </td>

                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('students.subjects', $user->id) }}" class="">
                                                            <span class="glyphicon glyphicon-arrow-right">
                                                            {{$user->class->name}}
                                                            </span></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('students.show', $user->id) }}" class="">
                                                            <span class="glyphicon glyphicon-arrow-right">info</span></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>

                        </div>


                    </div>
                @else
                    No Result Found
                @endif
            </div>
        </section>

    </div>
@endsection

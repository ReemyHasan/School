@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-weight: 800">{{ $teacher->name." timetable" }} </h1>
                    </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th>9:00 AM</th>
                                            <th>10:00 AM</th>
                                            <th>11:00 AM</th>
                                            <th>12:00 PM</th>
                                            <th>13:00 PM</th>
                                            <th>14:00 PM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= count($week); $i++)
                                            @php
                                                $find9 = false;
                                                $find10 = false;
                                                $find11 = false;
                                                $find12 = false;
                                                $find13 = false;
                                                $find14 = false;
                                            @endphp
                                            <tr>
                                                @if ($i == 1)
                                                    <td>sunday</td>
                                                @elseif ($i == 2)
                                                    <td>monday</td>
                                                @elseif ($i == 3)
                                                    <td>tuesday</td>
                                                @elseif ($i == 4)
                                                    <td>wednesday</td>
                                                @else
                                                    <td>thursday</td>
                                                @endif
                                                @foreach ($week[$i] as $key => $day)
                                                    @if ($day['start_time'] == '09:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find9 == false)
                                                            @php
                                                                $find9 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '09:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($day['start_time'] == '10:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find10 == false)
                                                            @php
                                                                $find10 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '10:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($day['start_time'] == '11:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find11 == false)
                                                            @php
                                                                $find11 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '11:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($day['start_time'] == '12:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find12 == false)
                                                            @php
                                                                $find12 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '12:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($day['start_time'] == '13:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find13 == false)
                                                            @php
                                                                $find13 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '13:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if ($day['start_time'] == '14:00:00')
                                                        <td>{{ $day['subject_name'] }} / {{ $day['class_name'] }}</td>

                                                        @continue
                                                    @else
                                                        @if ($find14 == false)
                                                            @php
                                                                $find14 = true;
                                                            @endphp
                                                            @php
                                                                $u = false;
                                                            @endphp
                                                            @foreach ($week[$i] as $key1 => $day1)
                                                                @if ($day1['start_time'] == '14:00:00')
                                                                    @php
                                                                        $u = true;
                                                                    @endphp
                                                                    @continue
                                                                @endif
                                                            @endforeach
                                                            @if ($u == false)
                                                                <td>-</td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endfor
                                    </tbody>

                                </table>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection

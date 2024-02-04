@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>{{ $class->name }}</h1>
                    </div>
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

                            <form action="{{ route('timetables.create', $class->id) }}" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <label for="role">{{ $class->name . '   subjects' }}</label>
                                            <select class="form-control" name="subject_id">
                                                @foreach ($subjects as $subject)
                                                    <option value={{ $subject->id }}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">search timetable</button>
                        </div>
                        </form>
                    </div>


                </div>

                @if ($editing)
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">

                                <form action="{{ route('timetables.store', $class->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div>
                                            <div class="form-group">
                                                <h4 style="font-weight:800;">add sessions</h4>
                                                <hr style="font-weight:800;">
                                                <div>
                                                    <input type="hidden" name="subject_id" value="{{$subject_id}}">
                                                    <h6 style="font-weight:800;">sunday</h6>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="09:00:00" name="sunday[]"
                                                                {{ !empty(in_array("sunday:09:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:09:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 09:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="10:00:00" name="sunday[]"
                                                            {{ !empty(in_array("sunday:10:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:10:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 10:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="11:00:00" name="sunday[]"
                                                            {{ !empty(in_array("sunday:11:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:11:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 11:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="12:00:00" name="sunday[]"
                                                            {{ !empty(in_array("sunday:12:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:12:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 12:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="13:00:00" name="sunday[]"
                                                            {{ !empty(in_array("sunday:13:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:13:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 13:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="14:00:00" name="sunday[]"
                                                            {{ !empty(in_array("sunday:14:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("sunday:14:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 14:00:00
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h6 style="font-weight:800;">monday</h6>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="09:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:09:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:09:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 09:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="10:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:10:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:10:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 10:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="11:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:11:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:11:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 11:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="12:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:12:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:12:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 12:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="13:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:13:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:13:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 13:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="14:00:00" name="monday[]"
                                                            {{ !empty(in_array("monday:14:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("monday:14:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 14:00:00
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h6 style="font-weight:800;">tuesday</h6>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="09:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:09:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:09:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 09:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="10:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:10:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:10:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 10:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="11:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:11:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:11:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 11:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="12:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:12:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:12:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 12:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="13:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:13:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:13:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 13:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="14:00:00" name="tuesday[]"
                                                            {{ !empty(in_array("tuesday:14:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("tuesday:14:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 14:00:00
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h6 style="font-weight:800;">wednesday</h6>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="09:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:09:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:09:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 09:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="10:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:10:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:10:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 10:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="11:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:11:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:11:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 11:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="12:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:12:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:12:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 12:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="13:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:13:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:13:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 13:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="14:00:00" name="wednesday[]"
                                                            {{ !empty(in_array("wednesday:14:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("wednesday:14:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 14:00:00
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h6 style="font-weight:800;">thursday</h6>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="09:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:09:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:09:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 09:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="10:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:10:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:10:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 10:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="11:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:11:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:11:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 11:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="12:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:12:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:12:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 12:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="13:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:13:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:13:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}
                                                                >
                                                            &nbsp;&nbsp; 13:00:00
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" value="14:00:00" name="thursday[]"
                                                            {{ !empty(in_array("thursday:14:00:00", $checked))
                                                                ? 'checked' : '' }}
                                                                {{!empty(in_array("thursday:14:00:00", $disabled))
                                                                ? 'disabled' : ''
                                                                }}>
                                                            &nbsp;&nbsp; 14:00:00
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">add sessions</button>
                            </div>
                            </form>
                        </div>


                    </div>
                @endif
            </div>
    </div>
    </section>
    </div>
@endsection

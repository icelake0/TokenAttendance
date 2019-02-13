@extends('layouts.app')

@section('content')
<?php $page_title='Lecturer Update Coures'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Update Coures</h3>
        <p class="text-muted m-b-30 font-13">Edit Course Information</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' class="form-horizontal" action='{{ route("courses.update",["course"=>$course]) }}'>
                    @csrf
                    <input type='hidden' name='_method' value='Put'>
                    <div class="form-group">
                        <label class="col-sm-12">Course Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Course Title" name="title" required value="{{$course->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Course Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Course code" name="code" required value="{{$course->code}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Course Unit</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="Course Unit" name="unit" required value="{{$course->unit}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Session</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Section" name="section" required value="{{$course->section}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Semester</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="semester" required>
                                <option disabled="" selected="" readonly>--Select Semester--</option>
                                <option {{($course->semester==1)?"selected='selected'":""}} value=1>First Semester</option>
                                <option {{($course->semester==2)?"selected='selected'":""}} value=2>Second Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Registration Key</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Registration Key" name="reg_key" required value="{{$course->reg_key}}">
                        </div>
                    </div>
                    <button class="btn btn-block btn-info btn-lg btn-rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
@endsection
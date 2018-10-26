@extends('layouts.app')

@section('content')
<?php $page_title='Lecturer Create Coures'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Create A New Coures</h3>
        <p class="text-muted m-b-30 font-13">Provide Information about the course you wish to add</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' class="form-horizontal" action='{{ route("courses.store") }}'>
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Course Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Course Title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Course Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Course code" name="code" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Course Unit</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="Course Unit" name="unit" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Section</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Section" name="section" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Semester</label>This Should Be Changes to Drop doen
                        <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="Semester" name="semester" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Registration Key</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Registration Key" name="reg_key" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-info btn-lg btn-rounded">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
@endsection
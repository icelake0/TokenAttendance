@extends('layouts.app')

@section('content')
<?php $page_title='add children'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">add your children</h3>
        <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' action='{{ route("webauth.addchildren") }}'>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputphone">Number Of Children</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-number"></i></div>
                            <input type="number" min='1' class="form-control" placeholder="Number Of Children" name='number' id='number_of_children' value=1> 
                        </div>
                        <hr>
                        <span id='children_inputs'>
                            <label for="exampleInputphone">Child Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" placeholder="Child Name" name='children[0]' required> 
                            </div>
                            <label for="exampleInputphone">Child DOB</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="date" class="form-control" placeholder="Child Name" name='children[0]' required> 
                            </div>
                            <label for="exampleInputphone">Class/level</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" placeholder="Child Name" name='children[0]' required> 
                            </div>
                        </span>
                    </div>
                   	 <button class="btn btn-block btn-info btn-lg btn-rounded">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
   $(document).ready(function(){
        $("#number_of_children").keyup(function(){
            $("#children_inputs").html("");
            var number_of_inputs=(Number)($("#number_of_children").val());
            for(i=1; i<=number_of_inputs; i++){
                $("#children_inputs").append('<label for="exampleInputphone">Child Name</label><div class="input-group"><div class="input-group-addon"><i class="ti-user"></i></div><input type="text" class="form-control" placeholder="Child Name" name="children['+i+'][name]" required> </div><label for="exampleInputphone">Child DOB</label><div class="input-group"><div class="input-group-addon"><i class="ti-user"></i></div><input type="date" class="form-control" placeholder="Child Name" name="children['+i+'][dob]" required></div><label for="exampleInputphone">Child Class/level</label><div class="input-group"><div class="input-group-addon"><i class="ti-user"></i></div><input type="text" class="form-control" placeholder="Child Name"name="children['+i+'][level]" required></div><hr>');
            }
        });
    });
</script>
@endsection
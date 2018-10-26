@extends('layouts.app')

@section('content')
<?php $page_title='upload document'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Add Your Basic Informations</h3>
        <p class="text-muted m-b-30 font-13">Information added at this point will be used to create your profile that will be visibe to other users</p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' class="form-horizontal" action='{{ route("webauth.addbasicinfo") }}'>
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Prof., Dr. , Me., etc." name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Area Of Specialization</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Area Of Specialization" name="aos" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Office Address</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="5"  name='office_address' required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-block btn-info btn-lg btn-rounded">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-xs-0">
</div>
@endsection
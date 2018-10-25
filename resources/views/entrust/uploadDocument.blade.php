@extends('layouts.app')

@section('content')
<?php $page_title='upload document'; ?>
<div class="col-md-3 col-xs-0">
</div>
<div class="col-md-6 col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Upload A Document</h3>
        <p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method='post' class="form-horizontal" action='{{ route("uploadDocument") }}' files="true" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Document Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="document title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Select File</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="exampleInputPassword1"  name='document' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Description</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="5"  name='description'></textarea>
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
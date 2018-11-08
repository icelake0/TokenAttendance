@extends('layouts.app')

@section('content')
<?php $page_title='manage users'; ?>
<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
  <div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">System Users</h3>
        <p class="text-muted m-b-30">Data table example</p>
        <div class="table-responsive">
            <table id="table1" class="table table-striped my-data-table">
              <thead>
                <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th class="text-center">Action</th>
                </tr>
              </thead>
              </tbody>
                    @foreach($users as $record)
                    <tr>
                      <td>{{$record->id}}</td>
                      <td>{{$record->name}}</td>
                      <td>{{$record->email}}</td>
                      <td>@foreach($record->roles as $role) {{$role->name}} @endforeach</td>
                      <td class="text-center">
                           <a data-fancybox data-type="ajax" class="btn btn-sm btn-success"  data-src="/profile/{{$record->id}}/partial" href="javascript:;"><i class="fa fa-eye"></i> profile</a>
                          <a class="btn btn-sm btn-info" href="{{route('webauth.changeuserrole')}}?user_id={{$record->id}}"><i class="fa fa-pencil"></i> Change Role</a>
                          <a class="btn btn-sm btn-danger" href="{{route('webauth.suspenduser',['userid'=>$record->id])}}"><i class="fa fa-trash"></i> Suspend</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
@endsection

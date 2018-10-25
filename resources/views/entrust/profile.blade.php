@extends('layouts.app')

@section('content')
<?php $page_title='profile'; ?>
<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('css/star-rating.min.css')}}"  media="all" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="{{$user->avatar}}">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="{{$user->avatar}}" class="thumb-lg img-circle" alt="img"></a>
                        <h4 class="text-white">{{$user->name}}</h4>
                        <h5 class="text-white">{{$user->email}}</h5> </div>
                </div>
            </div>
            @if($user->hasRole('teacher'))
            <div class="user-btm-box">
                <label for="state" class="col-md-12">Teacher Average Rating</label>
                <input id="input-2" name="teaching_rating" value="{{$user->teacher_teacher_requests->where('rating','<>',null)->avg('rating')}}" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-readonly='true' >
            </div>
            @endif
            @if($user->hasRole('parent') || $user->hasRole('student'))
            <div class="user-btm-box">
                <label for="state" class="col-md-12">{{$user->roles[0]->display_name}} Average Rating</label>
                <input id="input-2" name="teaching_rating" value="{{$user->requester_teacher_requests->where('rating','<>',null)->avg('rating')}}" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-readonly='true' >
            </div>
            @endif

        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <!--li class="tab">
                    <a href="#home" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                </li-->
                <li class="tab @if(!$settings) active @endif">
                    <a href="#profile" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                </li>
                <li class="tab">
                    <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Documents</span> </a>
                </li>
                @if($user->id==Auth::user()->id)
                <li class="tab @if($settings) active @endif">
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                </li>
                @endif
            </ul>
            <div class="tab-content">
                <!--div class="tab-pane" id="home">
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left"> <img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle"> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                    <div class="m-t-20 row"><img src="../plugins/images/img1.jpg" alt="user" class="col-md-3 col-xs-12"> <img src="../plugins/images/img2.jpg" alt="user" class="col-md-3 col-xs-12"> <img src="../plugins/images/img3.jpg" alt="user" class="col-md-3 col-xs-12"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sl-item">
                            <div class="sl-left"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                            <div class="sl-right">
                                <div class="m-l-40"> <a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <div class="m-t-20 row">
                                        <div class="col-md-2 col-xs-12"><img src="../plugins/images/img1.jpg" alt="user" class="img-responsive"></div>
                                        <div class="col-md-9 col-xs-12">
                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa</p> <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="sl-item">
                            <div class="sl-left"> <img src="../plugins/images/users/ritesh.jpg" alt="user" class="img-circle"> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="sl-item">
                            <div class="sl-left"> <img src="../plugins/images/users/govinda.jpg" alt="user" class="img-circle"> </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
                <div class="tab-pane @if(!$settings) active @endif" id="profile">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">{{$user->name}}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">{{$user->phone}}</p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                            <br>
                            <p class="text-muted">{{$user->email}}</p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                            <br>
                            <p class="text-muted">{{$user->address}}</p>
                        </div>
                    </div>
                    <hr>
                    @if($user->hasRole('teacher'))
                    <h4 class="font-bold m-t-30">Subjects</h4>
                    <hr>
                    @if($user->subjects && $user->subjects->count())
                    @foreach($user->subjects as $subject)
                    <h4>{{$subject->name}} </h4>
                    <input id="input-2" name="teaching_rating" value="{{$user->teacher_teacher_requests->where('rating','<>',null)->where('subject_id',$subject->id)->avg('rating')}}" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-readonly='true' >
                    @endforeach
                    @endif
                    @endif

                    @if($user->hasRole('parent'))
                    <h4 class="font-bold m-t-30">Children</h4>
                    <hr>
                    @if($user->children && $user->children->count())
                    
                        <div class="white-box">
                            <h3 class="box-title">Your Added Children list</h3>
                            <!--p class="text-muted">Add class <code>.table</code></p-->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Class/Level</th>
                                            <th>DOB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->children as $child)
                                        <tr>
                                            <td>{{$child->id}}</td>
                                            <td>{{$child->name}}</td>
                                            <td>{{$child->level}}</td>
                                            <td>{{$child->dob}}</td>
                                        </tr> 
                                        @endforeach      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    @endif
                    @endif
                     <h4 class="font-bold m-t-30">About Me</h4>
                    <p class="m-t-30">{{$user->about_me}}</p>
                </div>
                <div class="tab-pane" id="messages">
                    <div class="steamline">
                        @foreach($user->documents as $document)
                        <div class="sl-item">
                            <div class="sl-left"><i class="fa-fw">DOC</i></div>
                            <div class="sl-right">
                                <div class="m-l-40"> <a href="#" class="text-info">{{$document->title}}</a>
                                    <div class="m-t-20 row">
                                        <div class="col-md-2 col-xs-12">
                                            <a href="/uploaded_documents/{{$document->url}}" data-fancybox data-caption="{{$document->title}} : {{$document->description}}">
                                                <img src="/uploaded_documents/{{$document->url}}" alt="" class="img-responsive" />
                                            </a>
                                     </div>
                                        <div class="col-md-9 col-xs-12">
                                            <p>{{$document->description}}</p> 
                                            @if($user->id==Auth::user()->id)
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-document-model{{$document->id}}">Delete</a>
                                            <!--modal-->
                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="delete-document-model{{$document->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Confirm Delete</h4> </div>
                                                        <div class="modal-body">
                                                            <p>Deleting this document will remove it from our record, but may be reuploaded if you wish&hellip;</p>
                                                            <p>Are you sure you want to do this?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success waves-effect text-left" data-dismiss="modal">Close</button>
                                                           <form id="delete-document-form{{$document->id}}" action="{{ route('deleteDocument',['document'=>$document->id]) }}" 
                                                            method="POST" style="display: none;">
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    {{ csrf_field() }}
                                                          </form>
                                                          <button type="button" class="btn btn-danger waves-effect text-left"
                                                            onclick="document.getElementById('delete-document-form{{$document->id}}').submit();"
                                                          >Confirm delete</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
                @if($user->id==Auth::user()->id)
                <div class="tab-pane @if($settings) active @endif" id="settings">
                    <form method='post' class="form-horizontal" action="{{route('webauth.updateavatar')}}" files="true" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Select File For Avatar</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="exampleInputPassword1"  name='avatar' required>
                            </div>
                        </div>
                        <button class="btn btn-success">Update Avatar</button>
                    </form>
                    <br>
                    <form class="form-horizontal form-material" method="POST" action="{{route('webauth.updateprofile')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" name='name' value="{{$user->name}}" class="form-control form-control-line"> </div>
                        </div>
                         <div class="form-group">
                            <label for="address" class="col-md-12">Address</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->address}}" class="form-control form-control-line" name="address" id="example-email"> </div>
                        </div>
                         <div class="form-group">
                            <label for="Nearest Buststop" class="col-md-12">Nearest Buststop</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->nearest_busstop}}" class="form-control form-control-line" name="nearest_busstop" id="example-email"> </div>
                        </div>
                         <div class="form-group">
                            <label for="city" class="col-md-12">City</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->city}}" class="form-control form-control-line" name="city" id="example-email"> </div>
                        </div>
                         <div class="form-group">
                            <label for="state" class="col-md-12">State</label>
                            <div class="col-md-12">
                                <input type="text" value="{{$user->state}}" class="form-control form-control-line" name="state" id="example-email"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name='phone' value="{{$user->phone}}" class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">About Me</label>
                            <div class="col-md-12">
                                <textarea name='about_me' rows="5" class="form-control form-control-line">{{$user->about_me}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" name='password' value="{{$user->password}}" class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-block btn-info btn-lg btn-rounded">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('js/star-rating.min.js')}}" type="text/javascript"></script>
@endsection
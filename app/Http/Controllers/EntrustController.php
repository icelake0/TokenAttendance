<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;
use App\Child;
use App\Subject;
use App\User;
use App\TeacherDocument;
class EntrustController extends Controller
{
    public function choseRole(Request $request){
        if(Auth::user()->roles->count()){
            return redirect()->back()
                 ->with('error' , 'Your role is set already');
        }
		if ($request->isMethod('post')) {
		    $selected_role=$request['role'];
		    $role=Role::where('name', '=', $selected_role)->first();
            if(!$role || $role->name==='admin' || $role->name==='superadmin'){
                 return back()->withInput()->with('error','ARE YOU DOING SOMETHING WRONG??? YOU MAY BE BANNED YOU KNOW???');
            }
		    $user=Auth::user();
		    $user->attachRole($role);
		    return redirect()->route('home')
                 ->with('success' , 'Your role is set, you can now explore other featurs');
		}
		return view('entrust.choserole');
    }
    public function teacherProfileCreate(){

    }
    public function addChildren(Request $request){
        // if(!Auth::user()->hasRole('parent')){
        //     return back()->with('error','You can not add children because you are not a parent');
        // }
    	if ($request->isMethod('post')) {;
    		$children=$request['children'];
    		$parent_id=Auth::user()->id;
    		foreach($children as $child){
    			$model= new Child();
    			$model->name=$child['name'];
                $model->dob=$child['dob'];
                $model->level=$child['level'];
    			$model->parent_id=$parent_id;
    			$model->save();
    		}
		    return redirect()->route('home')
                 ->with('success' , 'Your Children Have Been Added You Can Now Request For Teahers');
		}
		return view('entrust.addchildren');
    }
    public function addSubjects(Request $request){
    	if ($request->isMethod('post')) {
    		$subjects=$request['subjects'];
    		$teacher=Auth::user();
    		foreach($subjects as $subject){
    			$model=Subject::where('name','LIKE',$subject)->first();
    			if(!$model){
    				$model=new Subject();
    				$model->name=$subject;
    				$model->save();
    			}
    			//attach the subject and the teacher
    			$teacher->subjects()->syncWithoutDetaching($model->id);

    		}
		    return redirect()->route('home')
                 ->with('success' , 'Your Subjects Have Been Added Hope We Find Someone In Need of Your Service Soon');
		}
		return view('entrust.addsubjects');
    }
    public function profile(Request $request, User $user,$partial=null){
        $settings=(isset($request['settings']))?true:false;
        if($partial) return view('entrust._profile',['user'=>$user,'settings'=>$settings]);
        return view('entrust.profile',['user'=>$user,'settings'=>$settings]);
    }
    public function uploadDocument(Request $request){
        if ($request->isMethod('post')) {;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $document = $request->file('document');
            $document_extention=$document->extension();
            $document_name = time().$randomString.'.'.$document->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_documents');
            if($document->move($destinationPath, $document_name)){
                $document_data= new TeacherDocument();
                $document_data->url=$document_name;
                $document_data->title=$request['title'];
                $document_data->description=$request['description'];
                //$document_data->document_type=$document_extention;
                $document_data->teacher_id=Auth::user()->id;
                if($document_data->save()){
                    return redirect()->route('home')
                     ->with('success' , 'Document Uploaded Successfully');
                }
            }else{
               return back()->withInput()->with('error','Something went wrong, review your inputs and try again');
            }
        }
        return view('entrust.uploadDocument');
    }
    public function deleteDocument(TeacherDocument $document){
        if($document){
            if($document->delete()){ 
                return redirect('profile')->with('success','One Document deleted');
            }else{
                return back()->withInput()->with('error','Something went wrong, unable to delete document');
            }
        }
    }
    public function manageUsers(){
        return view('entrust.users',[
          'users'=>User::all(),
        ]);
    }
    public function changeUserRole(Request $request){
        if($request->isMethod('get')){
            $roles=Role::all();
            $user=User::where('id',$request['user_id'])->first();
            return view('entrust.changeuserrole',[
                'user'=>$user,
                'roles'=>$roles,
            ]);
        }else{
            $user=User::where('id', $request['user_id'])->first();
            $user->roles()->sync($request['role_id']);
            return redirect(route('webauth.manageusers'))->with('success', 'User Role Changed');
        }
    }
    public function suspendUser(User $userid){
        dd('still testing');
        //change this to use the band shii
        if($user->delete()){
            return back()->withInput()->with('success','User Suspended');
        }else{
            return back()->withInput()->with('error','Unable to suspend user');
        }
    }
    // public function suspendUser(User $id){
    //     if($user->delete()){
    //         return back()->withInput()->with('success','User Suspended');
    //     }else{
    //         return back()->withInput()->with('error','Unable to suspend user');
    //     }
    // }
    public function updateAvatar(Request $request){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $avatar = $request->file('avatar');
        $avatar_extention=$avatar->extension();
        $avatar_name = '/avatars/'.time().$randomString.'.'.$avatar->getClientOriginalExtension();
        $destinationPath = public_path('avatars');
        if($avatar->move($destinationPath, $avatar_name)){
            $user=Auth::user();
            $user->avatar=$avatar_name;
            //$avatar_data->document_type=$avatar_extention;
            if($user->save()){
                return redirect()->route('profile',['user'=>$user->id])
                 ->with('success' , 'Avatar Updated Successfully');
            }else{
                return back()->withInput()->with('error','Something went wrong, review your inputs and try again');
            }
        }else{
           return back()->withInput()->with('error','Something went wrong, review your inputs and try again');
        }
    }
    public function updateProfile(Request $request){
        $user=Auth::user();
        $user->name=$request['name'];
        $user->address=$request['address'];
        $user->nearest_busstop=$request['nearest_busstop'];
        $user->city=$request['city'];
        $user->state=$request['state'];
        $user->phone=$request['phone'];
        $user->about_me=$request['about_me'];
        /*
            check for password change
            if password changes encript and save
            else skip saving password
        */
        if($user->save()){
            return redirect()->route('profile',['user'=>$user->id])
             ->with('success' , 'Profile Updated Successfully');
        }else{
            return back()->with('error','Something went wrong, review your inputs and try again');
        }
    }
    public function getTeachers(Request $request){
        $subject=Subject::where('id',$request['id'])->first();
        $teachers=$subject->teachers;
        echo '<option>--Select A Teacher--</option>';
        foreach($teachers as $teacher){
            echo "<option value='".$teacher->id."'>".$teacher->name."</option>";
        }
    }
}

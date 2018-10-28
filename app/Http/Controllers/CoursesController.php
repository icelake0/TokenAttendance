<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Lecturer;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Auth::user()->lecturer->courses;
        dd($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecturer=Auth::user()->lecturer;
        $course= new Course();
        $course->title=$request['title'];
        $course->code=$request['code'];
        $course->unit=$request['unit'];
        $course->section=$request['section'];
        $course->semester=$request['semester'];
        $course->reg_key=$request['reg_key'];
        $course->created_by=$lecturer->id;
        $course->updated_by=$lecturer->id;
        if($course->save()){
            $lecturer->courses()->attach($course->id);
            return redirect(route('home'));
        }else{
            return back()->with('error','An Error occues please review input and try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        dd($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }
    public function addlecturers(Request $request, Course $course){
        if($course->created_by!==Auth::user()->lecturer->id){
            return back()->with('error','Your Can Only Add lectures to your courses ie. The courses you created');
        }
        if($request->isMethod('post')){
            $errors=[];
            $lecturer_ids=[];
            $lecturer_emails=$request['lecturers'];
            foreach($lecturer_emails as $lecturer_email){
                $user=User::where('email',$lecturer_email)->first();
                if(!$user){
                    array_push($errors,$lecturer_email." is not a valid user's email");
                }else{
                    $lecturer=$user->lecturer;
                    if(!$lecturer){
                        array_push($errors,$lecturer_email." is not a valid lecturer's email");
                    }else{
                        array_push($lecturer_ids,$lecturer->id);
                    }
                }
            }
            if(count($errors) != 0){
                return back()->with('errors',$errors);
            }else{
                $synced=$course->lecturers()->syncWithoutDetaching($lecturer_ids);
                if(!$synced){
                    return back()->with('error', 'Unable to add lecturers to course please check your input and try again');
                }else{
                    return redirect(route('courses.show',['course'=>$course->id]))->with('success','lecturers added to course');
                }
                //return to the course view page
            }
        }else{
            return view('courses.addlecturers',[
                'course'=>$course
            ]);
        }
    }
    public function studentRegister(Request $request, Course $course){
        if($request->isMethod('post')){
            $student=Auth::user()->student;
             if($student->courses->contains($course->id)){
                return back()->withInput()->with('error','You Have Already Registered for this course');
            }elseif($course->reg_key!==$request['reg_key']){
                return back()->withInput()->with('error','Invalid Registration Key, Please confirm the correct Registration Key from the course lecturer');
           }else{
                $course->students()->attach(Auth::user()->student->id);
                return redirect(route('courses.show',['course'=>$course->id]));
            }
        }else{
            return view('courses.studentRegister',['course'=>$course]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

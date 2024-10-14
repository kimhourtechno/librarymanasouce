<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;


class StudentController extends Controller
{
    public function view($id){
        $data ['student'] = Student::find($id);
        $data['members'] = DB::table('members')
        ->get();
        return view('students.studentviewv',$data);

    }
    public function search(Request $request){
        $query = $request->input('query');
    if (!$query) {
        return redirect()->back()->with('error', 'Search query is required.');
    }

    $students = Student::where('action', 1)
        ->where(function($q) use ($query) {
            $q->where('id', 'like', '%' . $query . '%')  // Search by id
              ->orWhere('name', 'like', '%' . $query . '%')
              ->orWhere('phone', 'like', '%' . $query . '%');
        })
        ->orderBy('name', 'desc')
        ->orderBy('phone')
        ->get();

    return redirect()->back()->with('students', $students)->with('query', $query);
    }
    public function index(){
        $data['students'] = Student::where('action',1)->get();
        return view('students.studentlistv',$data);

    }
    public function create(){
        $data['members'] = DB::table('members')
        ->get();
        return view('students.studentaddv',$data);
    }
    public function store(Request $r){
        $student = new Student();
        $student->name = $r->name;
        $student->phone = $r->phone;
        $student->email = $r->email;
        $student->birthdate = $r->birthdate;
        $student->place_of_birth = $r->place_of_birth;
        $student->gender = $r->gender;
        $student->member_id = $r->member;
        $student->classname = $r->classname;
        $student->mother_name = $r->mother_name;
        $student->mother_phone = $r->mother_phone;
        $student->mother_career = $r->mother_career;
        $student->father_name = $r->father_name;
        $student->father_phone = $r->father_phone;
        $student->father_career = $r->father_career;


        $i = $student->save();

        if($i){
            return redirect('student/create')
            ->with('success','Data has been saved');
        }
        else{
            return redirect('student/create')
            ->with('error','Fail to saved data');
        }
    }

    public function edit($id){
        $data ['student'] = Student::find($id);
        $data['members'] = DB::table('members')
        ->get();
        return view('students.studenteditv',$data);

    }
    public function update(Request $r, $id){

        $student = Student::find($id);
        $student->name = $r->name;
        $student->phone = $r->phone;
        $student->email = $r->email;
        $student->birthdate = $r->birthdate;
        $student->place_of_birth = $r->place_of_birth;
        $student->gender = $r->gender;
        $student->member_id = $r->member;
        $student->classname = $r->classname;
        $student->mother_name = $r->mother_name;
        $student->mother_phone = $r->mother_phone;
        $student->mother_career = $r->mother_career;
        $student->father_name = $r->father_name;
        $student->father_phone = $r->father_phone;
        $student->father_career = $r->father_career;
        $i = $student->save();
        if($i){
            return redirect()->route('student.edit',$id)
            ->with('success','Data has been saved');
        }else
        {
            return redirect()->route('student.edit',$id)
            ->with('success','Data has been Failed');
        }
    }
    public function delete($id){

        $i= Student::where('id',$id)
        ->update(['action'=>0]);
        if($id){
            return redirect()->route('student.index')
            ->with('success','Data has been removed');
        }
        else{
            return redirect()->route('student.index')
            ->with('error','Fail to removed');
        }
    }
    // public function index(){
    //     $data['students'] = DB::table('students')
    //         // ->get();
    //         // ->paginate(2);
    //         ->paginate(config('app.row'));
    //     return view('students.list', $data);
    // }
    // public function register(){
    //     return view('students.add');
    // }
    // public function save(Request $r){
    //     // $data = $r->except('_token');
    //     // dd($data);
    //     $data = array(
    //         'name' => $r->name,
    //         'gender' => $r->gender,
    //         'birthdate' => $r->birthdate,
    //         'phone' => $r->phone,
    //         'email' => $r->email,
    //         'classname' => $r->classname,
    //         'other' => $r->other,
    //     );
    //     $i = DB::table('students')->insert($data);
    //     if($i){
    //         return redirect('/studentregister')
    //         ->with('success', 'Data has been saved');
    //     }
    //     else{
    //         return redirect('students/register')
    //         ->with('error', 'failed to save data');
    //     }
    // }
}

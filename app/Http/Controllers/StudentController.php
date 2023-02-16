<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class StudentController extends Controller
{
   public function index(){
      $user_id = auth()->user()->id;
    $students = Student::where('user_id', $user_id)->latest()->paginate(5);
    return view('students.index', compact('students'))
        ->with('i', (request()->input('page',1) - 1) * 5);
   }

   public function create(){
      return view('students.create');
   }

   public function store(Request $request){
      $request->validate([
         'Filipino' => 'required',
         'English' => 'required',
         'Math' => 'required', 
         'Science' => 'required', 
     ]);
     
     $user_id = auth()->user()->id; // get the authenticated user's ID
     $grades = [
         'user_id' => $user_id,
         'Filipino' => $request->input('Filipino'),
         'English' => $request->input('English'),
         'Math' => $request->input('Math'),
         'Science' => $request->input('Science')
     ];
     
     DB::table('students')->updateOrInsert(
         ['user_id' => $user_id],
         array_merge($grades, ['user_id' => $user_id])
     );
 

     
     return redirect()->route('students.index')
         ->with('success', 'Grade successfully added');
   }  

   public function destroy(Student $student){
      $student->delete();
      return redirect()->route('students.index')
         ->with('success', 'Student deleted successfully');
   }
}
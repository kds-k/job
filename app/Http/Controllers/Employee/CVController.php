<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use File;
use Response;
use App\CV;

class CVController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('employee.cv');
    }

    public function delete(CV $cv){
        if($cv->user_id == auth()->user()->id)
            $cv->delete();
        return redirect()->back();
    }

    public function upload(Request $request){
        
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:pdf,docx,doc,txt,rtf|max:2000',
        ]);

        if ($validator->fails()) {  
            if($request->isAjax){
                return response()->json($validator->messages(), 400);
            }else{
                return redirect()->back()->with(['errors'=>$validator->messages()]);
            } 
        }

        $file = $request->file;
        $filename = $file->store('user_resume','public');

        \App\CV::create([
            'user_id'=>auth()->user()->id,
            'file'=>$filename,
            'client_file'=>$file->getClientOriginalName(),
            'status'=>1,
        ]);

        return redirect(employee_url('/resume'));
    }
    public function view(CV $cv)
    {
       echo asset('storage/app/'.$cv->file);
        // return response()->file(, [
        //   'Content-Disposition' => 'inline; filename="'. $cv->file .'"'
        // ]);
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Auth;
use Session;

class SiteController extends BaseController
{

    public function login()
    {
       return View::make('login');
    }

    public function changePass()
    {
        if(Auth::user()->type_id==4){
            $user = 'admin';
        }else{
            $user = 'home';
        }
       return View::make('reset', compact('user'));
    }

    public function sendLogin()
    {

			    // create our user data for the authentication
			    $userdata = array(
			        'username'     => Input::get('username'),
			        'password'  => Input::get('password')
			    );

			    // attempt to do the login
			    if (Auth::attempt($userdata)) {

			        if(Auth::user()->type_id==4)
                {
                        $student = \App\Models\user::find(Auth::user()->id);
                        Session::put('id_user', $student);
                        return Redirect::to('admin');
                    }
                else 
                    { 
                        return Redirect::to('home');
                        
                }

			    } else {        

                    // validation not successful, send back to form 
			         return Redirect::to('login')->with('message', 'Username dan Password tidak cocok! Jika anda lupa password silahkan hubungi admin');

   	    }
				
    }

    public function sendReset()
    {
    $user = \App\Models\User::find(Auth::user()->id);

    $password = Input::get('password');
    $passconfirm = Input::get('password_confirm');
    // var_dump($password);
    // var_dump($passconfirm);
    if($password != $passconfirm){
        return Redirect::to('changepass')->with('messages', 'Password tidak sama!');
    }else{
        $changepass = bcrypt($password);
        $user->password = $changepass; 
        $user->save();
        if(Auth::user()->type_id==4){
            return Redirect::to('admin');
        }else{
            return Redirect::to('home');
        }
        
    }
    }

    public function home()
    {
    	$user = \App\Models\user::find(Auth::user()->id);
     	//Session::put('id_user', $student);
        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
		$ambil = 'welcome';
		//echo $kelas;
        return View::make('home',compact('user','student','schedule','ambil','kelas','walikelas','kelas'));
    }

    public function admin()
    {
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();
    	$ambil = 'welcome';
        //echo $muridsmk;
        return View::make('adminpage',compact('muridsmk','ambil'));
    }

    public function course($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
    	
        $course = \App\Models\materi::where('schedule_id','=',$id)->get();
       	$ambil = 'course';
       	//echo $kelas;
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function filemateri($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
    	
        $course = \App\Models\materi::where('id','=',$id)->get();
       	$ambil = 'filemateri';
       	//echo $kelas;
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function tugas($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
    	
        $course = \App\Models\tugas::where('materi_id','=',$id)->get();
       	$ambil = 'tugas';
       	//echo $course;
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function tugasPost(Request $request,$id)
    {

        
        if(isset($_POST['file_id'])){
            $file = $_POST['file_id'];
            if (!unlink($file))
              {
              echo ("Error deleting $file");
              }
            else
              {
              echo ("Deleted $file");
            } 
        }else{
        $materi = \App\Models\materi::find($id);
        $url = $materi->url; 
        $judul = $_POST['name'];
        $dir = $url.'tugas';
       
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        };


        //move to server folder
        if (isset($_FILES['file'])) {
            //insert to database
                $materi = \App\Models\tugas::create(array_merge($request->only('materi_id','name','description'), ['url' => $dir.'/']));
                for($i=0; $i<count($_FILES['file']['name']); $i++){
                    $target_path = $dir;
                    $name = $_FILES['file']['name'][$i];
                    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
                    $target_path = $target_path .'/'. $name; 

                if (file_exists($target_path)) {
                    echo 'file dengan nama tersebut sudah ada';
                }else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo "The file has been uploaded successfully <br />";
                } else{
                    echo "There was an error uploading the file, please try again! <br />";
                    }
                }
               }

        };

        }

        //echo $_FILES['file']['name'][0];
        //return View::make('home',compact('user','student','schedule','course','ambil'));
        return Redirect::to('tugas&a='.$id);
    }

    public function tugasGetAjax($task_id)
    {
        $task = \App\Models\tugas::where('id','=',$task_id)->get();

        return Response::json($task);
    }

    public function tugasPutAjax(Request $request,$task_id)
    {
        $task = \App\Models\tugas::find($task_id);
    
        $task->name = $request->name;
        $task->description = $request->description;

        $task->save();
        return Response::json($task);
    }

    public function tugasPostAjax(Request $request, $task_id)
    {
        $task = \App\Models\tugas::find($task_id);
        $dirPath = $task->url;

         //move to server folder
        if (isset($_FILES['file'])) {
            
                for($i=0; $i<count($_FILES['file']['name']); $i++){
                    $target_path = $dirPath;
                    $name = $_FILES['file']['name'][$i];
                    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
                    $target_path = $target_path .'/'. $name; 

                if (file_exists($target_path)) {
                    echo 'file dengan nama tersebut sudah ada';
                }else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo "The file has been uploaded successfully";                   
                } else{
                    echo "There was an error uploading the file, please try again!";
                    }                
                }
               }

        };

    }

    public function tugasDeleteAjax($task_id)
    {
        $dir = \App\Models\tugas::find($task_id);
        $dirPath = $dir->url;
        function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
                
            }
        }
        if(rmdir($dirPath)){

            

            //return Response::json($task);
        }
    }
    $task = \App\Models\tugas::destroy($task_id);
        
    }

    public function submitTugasPost(Request $request,$id)
    {
        
        $user = \App\Models\user::find(Auth::user()->id);
        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();

        if(isset($_POST['file_id'])){
            $file = $_POST['file_id'];
            if (!unlink($file))
              {
              echo ("Error deleting $file");
              }
            else
              {
              echo ("Deleted $file");
            } 
        }else{
        $tugas = \App\Models\tugas::find($id);
        $url = $tugas->url; 
        $dir = $url.'answer';
       
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        };


        //move to server folder
        if (isset($_FILES['file'])) {
                for($i=0; $i<count($_FILES['file']['name']); $i++){
                    $target_path = $dir;
                    $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
                   
                    $name = $student[0]->fullname.'('.$student[0]->nis.').'.$ext;
                    $target_path = $target_path .'/'. $name; 

                if (file_exists($target_path)) {
                    echo 'file dengan nama tersebut sudah ada';
                }else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo "The file has been uploaded successfully <br/>";
                    return Redirect::to('tugas&a='.$tugas->materi_id);
                } else{
                    echo "There was an error uploading the file, please try again! <br />";
                    }
                }
               }
        };
        }
        // return Redirect::to('tugas&a='.$id);
    }

    public function video($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
    	
        $course = \App\Models\materi::where('id','=',$id)
        ->with('video')
        ->get();
       	$ambil = 'video';
       	//echo $course;
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function videoPostAjax(Request $request)
    {
        $task = \App\Models\video::create($request->all());
        return Response::json($task);
    }

    public function videoGetAjax($task_id)
    {
        $task = \App\Models\video::where('id','=',$task_id)->get();

        return Response::json($task);
    }

    public function videoPutAjax(Request $request,$task_id)
    {
        $task = \App\Models\video::find($task_id);
        $task->video = $request->video;

        $task->save();
        return Response::json($task);
    }

    public function videoDeleteAjax($task_id)
    {
        $task = \App\Models\video::destroy($task_id);

        return Response::json($task);
    }

    public function latihan($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }
    	
        $course = \App\Models\materi::where('id','=',$id)
        ->with('quiz.question.answer')
        ->get();
       	$ambil = 'latihan';
       	//echo $course;
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function latihanPost(Request $request,$id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';

         //initializing the variables
            $marks = 0;
            $total_questions = $_POST['total_ques'];
            $quiz_ID = $_POST["quizID"];


	         //calculating %
	            for($i=1 ; $i <= $total_questions ; $i++){
                    $fetch_ID = "rads".$i;
                    if (!empty($_POST[$fetch_ID])) {
                    $php_id = $_POST[$fetch_ID];
                    
                    $check = \App\Models\answer::where('id', '=', $php_id)->get();
                    $marks += $check[0]->status;
                    }
	            }
                $percent = ($marks/$total_questions)*100;
                
                $nilai = new \App\Models\score;
                $nilai->student_id = $student[0]->id;
                $nilai->quiz_id = $quiz_ID;
                $nilai->marks = $marks;
                $nilai->precentage = $percent;
                $nilai->save();
	         	           
       
           $ambil = 'result';
           //echo $marks;
        return View::make('home',compact('user','student','schedule','ambil','id','kelas','walikelas','marks','percent','total_questions'));
	        
    }

    public function latihanNewPost(Request $request, $id)
    {
        $user = \App\Models\user::find(Auth::user()->id);
        
        $quiz = new \App\Models\quiz;
                    $quiz->materi_id = $id;
                    $quiz->name = $request->name;
                    $quiz->time = $request->time;
                    $quiz->save();

                    $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();

        $course = \App\Models\materi::where('id','=',$id)
        ->with('quiz.question.answer')
        ->get();
       	$ambil = 'latihan';
        
        return View::make('home',compact('user','student','schedule','course','ambil','id','kelas','walikelas'));
    }

    public function addQuest(Request $request,$id)
    {
                
                $quest = new \App\Models\question;
                $quest->quiz_id = $id;
                $quest->question = $request->question;
                $quest->save();

                $radio = $request->iscorrect;
                
                for($i = 1; $i<5; $i++){
                    if($radio == 'answer'.$i){
                        $correct = 1;
                    }else{
                        $correct = 0;
                    };
                    $ans = 'answer'.$i;
                    $answer = new \App\Models\answer;
                    $answer->question_id = $quest->id;
                    $answer->answer = $request->$ans;
                    $answer->status = $correct;
                    $answer->save();
                }             

                //var_dump($request->iscorrect);

               return Response::json($quest);  
    }

    public function latihanGetAjax($task_id)
    {
        $task = \App\Models\question::where('id','=',$task_id)
        ->with('answer')
        ->get();

        return Response::json($task);
    }

    public function latihanDeleteAjax($task_id)
    {
        $task = \App\Models\question::destroy($task_id);

        $task1 = \App\Models\answer::where('question_id','=',$task_id)->delete();

        return Response::json($task);
    }

    public function latihanPutAjax(Request $request,$task_id)
    {
        $quest = \App\Models\question::find($task_id);    
        $quest->question = $request->question;
        $quest->save();

        $radio = $request->iscorrect;
        for($i = 1; $i<5; $i++){
            if($radio == 'answer'.$i){
                $correct = 1;
            }else{
                $correct = 0;
            };
        $answer = 'answer'.$i;
        $ans = \App\Models\answer::where('question_id','=',$task_id)->skip($i-1)->first();
        $ans->answer = $request->$answer;
        $ans->status = $correct;
        $ans->save();
        }
        return Response::json($quest);
    }

    public function coursePost(Request $request,$id)
    {

        if(isset($_POST['file_id'])){
            $file = $_POST['file_id'];
            if (!unlink($file))
              {
              echo ("Error deleting $file");
              }
            else
              {
              echo ("Deleted $file");
            } 
        }else{

        $judul = $_POST['name'];
        $dir = 'course/'.$id.'/'.$judul;
       
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        };


        //move to server folder
        if (isset($_FILES['file'])) {
            //insert to database
                $materi = \App\Models\Materi::create(array_merge($request->only('schedule_id','name','description'), ['url' => $dir.'/']));
                for($i=0; $i<count($_FILES['file']['name']); $i++){
                    $target_path = $dir;
                    $name = $_FILES['file']['name'][$i];
                    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
                    $target_path = $target_path .'/'. $name; 

                if (file_exists($target_path)) {
                    echo 'file dengan nama tersebut sudah ada';
                }else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo "The file has been uploaded successfully <br />";
                } else{
                    echo "There was an error uploading the file, please try again! <br />";
                    }
                }
               }

        };

        }

        //echo $_FILES['file']['name'][0];
        //return View::make('home',compact('user','student','schedule','course','ambil'));
        return Redirect::to('course&a='.$id);
    }


    public function courseGetAjax($task_id)
    {
        $task = \App\Models\materi::where('id','=',$task_id)->get();

        return Response::json($task);
    }

    public function coursePutAjax(Request $request,$task_id)
    {
        $task = \App\Models\materi::find($task_id);
    
        $task->name = $request->name;
        $task->description = $request->description;

        $task->save();
        return Response::json($task);
    }

    public function courseDeleteAjax($task_id)
    {
        $dir = \App\Models\materi::find($task_id);
        $dirPath = $dir->url;
        
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        if(rmdir($dirPath)){

            $task = \App\Models\materi::destroy($task_id);

            return Response::json($task);
        }

        
    }

    public function coursePostAjax(Request $request, $task_id)
    {
        $task = \App\Models\materi::find($task_id);
        $dirPath = $task->url;

         //move to server folder
        if (isset($_FILES['file'])) {
            
                for($i=0; $i<count($_FILES['file']['name']); $i++){
                    $target_path = $dirPath;
                    $name = $_FILES['file']['name'][$i];
                    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
                    $target_path = $target_path .'/'. $name; 

                if (file_exists($target_path)) {
                    echo 'file dengan nama tersebut sudah ada';
                }else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo "The file has been uploaded successfully";                   
                } else{
                    echo "There was an error uploading the file, please try again!";
                    }                
                }
               }

        };

        //$task = \App\Models\schedule::create($request->all());
        //return Response::json($task);
//return Redirect::to('course&a='.$task_id);
        
    }



    public function report($id, $smt)
    {
       $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }

        $report = \App\Models\schedule::leftJoin('kelas', 'schedule.kelas_id', '=', 'kelas.id')
        ->leftJoin('subject','schedule.subject_id','=','subject.id')
        ->leftJoin('student', 'kelas.id', '=', 'student.kelas_id')
        ->leftJoin(DB::raw('(SELECT * FROM nilai WHERE semester = '.$smt.') nilai'),  function($join)
        {
          $join->on('student.id', '=', 'nilai.student_id');
          $join->on('schedule.id', '=', 'nilai.schedule_id');
        })
        ->select('schedule.*', 'subject.name as subject', 'schedule.id as idschedule', 'kelas.*', 'nilai.id','nilai.nilai_ujian', 'nilai.kkm_nu', 'nilai.attitude', 'nilai.kkm_ns', 'nilai.id as id_nilai','student.*','student.id as idstudent','subject.subjecttype_id')
        ->where('schedule.id','=', $id)
        ->get();
        
        $count = $report->count();
        $ambil = 'report';
        //echo $report;
        return View::make('home',compact('user','student','schedule','report','ambil','id','kelas','count','walikelas','smt'));
    }

    public function reportwali($id,$smt)
    {
       $user = \App\Models\user::find(Auth::user()->id);

        if(Auth::user()->type_id==3){

        $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
        ->with('subject','kelas')->get();
        $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
        $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        }else{

        $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
        $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
        ->with('subject')->get();
        $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
        $walikelas='';
        }

        $report = \App\Models\student::leftJoin(DB::raw('(SELECT * FROM catatansiswa WHERE semester = '.$smt.') catatansiswa'),  function($join)
        {
          $join->on('student.id','=','catatansiswa.student_id');
        })
        ->select('student.id as id_student','student.*','catatansiswa.id as id_catatansiswa','catatansiswa.*')
        ->where('student.kelas_id','=',$id)
        ->get();
        
        
        $count = $report->count();
        $ambil = 'reportwali';
        //echo $report;
        return View::make('home',compact('user','student','schedule','report','ambil','id','kelas','count','walikelas','smt'));
    }

    public function reportGetAjax($task_id,$task_id2,$smt)
    {
        
    
        $task = DB::select("
            SELECT a.id as id_student, a.fullname, a.nis, a.nisn, b.id as id_nilai, b.schedule_id, b.nilai_ujian, b.kkm_nu, b.kkm_ns, b.attitude, c.name as kelas, e.name as subject, e.subjecttype_id, d.teacher_id
            FROM student a LEFT JOIN (SELECT * FROM nilai where student_id=$task_id and schedule_id=$task_id2 and semester =$smt) b ON a.id = b.student_id
            LEFT JOIN kelas c ON a.kelas_id = c.id
            LEFT JOIN schedule d ON b.schedule_id = d.id
            LEFT JOIN subject e ON d.subject_id = e.id
            WHERE a.id = $task_id");

        return Response::json($task);
    }

    public function reportwaliGetAjax($task_id)
    {
        $task = \App\Models\student::leftJoin('catatansiswa','student.id','=','catatansiswa.student_id')
        ->select('student.id as id_student','student.*','catatansiswa.id as id_catatansiswa','catatansiswa.*')
        ->where('student.id','=',$task_id)
        ->get();

        return Response::json($task);
    }

    public function reportPostAjax(Request $request, $task_id,$task_id2,$task_id3)
    {
        
        if(isset($task_id3)&&!empty($task_id3)){
        $task = \App\Models\nilai::find($task_id3);
        $task->kkm_nu = $request->kkm_nu;
        $task->nilai_ujian = $request->nilai_ujian;
        $task->kkm_ns = $request->kkm_ns;
        $task->attitude = $request->attitude;
        $task->save();
        }else{
        $task = \App\Models\nilai::create($request->all());
        }
        
        return Response::json($task);
    }

    public function reportwaliPostAjax(Request $request, $task_id, $task_id2)
    {
        
        if(isset($task_id2)&&!empty($task_id2)){
        $task = \App\Models\catatansiswa::find($task_id2);
        $task->semester = $request->semester;
        $task->teacher_id = $request->teacher_id;
        $task->kelas_name = $request->kelas_name;
        $task->kebersihan = $request->kebersihan;
        $task->kerapihan = $request->kerapihan;
        $task->ibadah = $request->ibadah;
        $task->kesantunan = $request->kesantunan;
        $task->sakit = $request->sakit;
        $task->ijin = $request->ijin;
        $task->tanpa_keterangan = $request->tanpa_keterangan;
        $task->membolos = $request->membolos;
        $task->catatan_tambahan = $request->catatan_tambahan;
        $task->tuntas = $request->tuntas;
        $task->lulus = $request->lulus;
        $task->save();
        }else{
        $task = \App\Models\catatansiswa::create($request->all());
        }
        
        return Response::json($task);
    }

    // ********************* controller matpel *********************

    public function courseAdmin()
    {
       
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get();
        
        // $courseDistinct = \App\Models\schedule::groupBy('subject_id')
        // ->with('subject')
        // ->get();
        $course = \App\Models\schedule::with('kelas','teacher','subject')->get();
        $kelas = \App\Models\kelas::get();
        $matpel = \App\Models\subject::get();
        $teacher = \App\Models\teacher::get();
        $count = $course->count();
        $ambil = 'courseadmin';
        //echo $course;
        return View::make('adminpage',compact('muridsmk','ambil','course','count','kelas','matpel','teacher'));
    }

    public function courseadminGetAjax($task_id)
    {
        $task = \App\Models\schedule::where('id','=',$task_id)
        ->with('kelas','teacher','subject')->get();

        return Response::json($task);
    }

    public function courseadminPostAjax(Request $request)
    {
        if(\App\Models\schedule::where([['teacher_id','=', $request->teacher_id],['subject_id','=',$request->subject_id],['kelas_id','=',$request->kelas_id]])->exists()){
            $msg = 'maaf, jadwal tersebut sudah ada';
        }elseif(\App\Models\schedule::where([['subject_id','=',$request->subject_id],['kelas_id','=',$request->kelas_id]])->exists()){
            $msg = 'maaf, jadwal tersebut sudah ada';
        }else{
            $task = \App\Models\schedule::create($request->all());
            $msg = 'Berhasil menambah';
        }
        

        return Response::json($msg);
    }

    public function courseadminPutAjax(Request $request,$task_id)
    {
        $task = \App\Models\schedule::find($task_id);
    
        $task->teacher_id = $request->teacher_id;
        $task->subject_id = $request->subject_id;
        $task->kelas_id = $request->kelas_id;

        $task->save();
        return Response::json($task);
    }

    public function courseadminDeleteAjax($task_id)
    {
        $task = \App\Models\schedule::destroy($task_id);

        return Response::json($task);
    }

    // ********************* controller matpel *********************

    public function matpel()
    {
       
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get();
        
        $matpel = \App\Models\subject::get();
        $count = $matpel->count();
        $ambil = 'matpel';
        //echo $courseDistinct;
        return View::make('adminpage',compact('muridsmk','ambil','matpel','count'));
    }

    public function matpelGetAjax($task_id)
    {
        $task = \App\Models\subject::find($task_id)->toArray();

        return Response::json($task);
    }

    public function matpelPostAjax(Request $request)
    {
        $task = \App\Models\subject::create($request->all());

        return Response::json($task);
    }

    public function matpelPutAjax(Request $request,$task_id)
    {
        $task = \App\Models\subject::find($task_id);
    
        $task->name = $request->name;

        $task->save();
        return Response::json($task);
    }

    public function matpelDeleteAjax($task_id)
    {
        $task = \App\Models\subject::destroy($task_id);

        return Response::json($task);
    }

    public function profil()
    {
    	$user = \App\Models\user::find(Auth::user()->id);
		
       	$ambil = 'profil';

       	if( $user->type_id == '1' || $user->type_id == '2'){
			
            $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
			$jurusan = \App\Models\student::with('kelas.vocational')
			->where('student.id','=', $student[0]->id)
			->get();
            $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
            ->with('subject')->get();
            $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
            $walikelas='';
		}else{

            $student = \App\Models\teacher::where('user_id', '=', Auth::user()->id)->get();
            $schedule = \App\Models\schedule::where('teacher_id','=', $student[0]->id)
            ->with('subject','kelas')->get();
            $kelas = \App\Models\schedule::where('teacher_id','=', $student[0]->id)->groupBy('kelas_id')->with('subject','kelas')->get();
            $walikelas = \App\Models\kelas::where('teacher_id','=', $student[0]->id)->get();
        };
        //echo $schedule[0]->kelas['name'];
       	return View::make('home',compact('user','student','schedule','course','ambil','jurusan','kelas','walikelas'));
    }

    public function reportsiswa($kls,$smt)
    {
        $user = \App\Models\user::find(Auth::user()->id);
        
        $ambil = 'reportsiswa';
            
            $student = \App\Models\student::where('user_id', '=', Auth::user()->id)->get();
            $jurusan = \App\Models\student::with('kelas.vocational','kelas.teacher')
            ->where('student.id','=', $student[0]->id)
            ->get();
            $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
            ->with('subject')->get();
            $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
            $nilai = \App\Models\nilai::where('student_id','=',$student[0]->id)
            ->where('kelas_name','=',$kls)
            ->where('semester','=',$smt)
            ->get();
            $kepribadian = \App\Models\catatansiswa::where('student_id','=',$student[0]->id)
            ->where('kelas_name','=',$kls)
            ->where('semester','=',$smt)
            ->get();
            $allsiswa = \App\Models\student::where('kelas_id', '=', $student[0]->kelas_id)->get();
            $count = $allsiswa->count();
            $kelas = \App\Models\kelas::where('id','=',$student[0]->kelas_id)->get();
            $str=strtok($kelas[0]->name,' ');
            foreach($allsiswa as $siswa){
                $array[] = $siswa->id;
            };
            $test = array();
            foreach($array as $arr){
            $rapot =\App\Models\nilai::where('student_id','=', $arr)->get();
            //echo $rapot[0]->nilai_ujian;
            $sumArray = array();
            $test[$arr] = 0;
            foreach($rapot as $rpt){
                
                $ns = round(((50)+(($rpt->nilai_ujian-10)*(45/80))));
                $test[$arr] += $ns;
            }
            arsort($test);
            }
            
            //$ns = round(((50)+(($nilai[0]->nilai_ujian-10)*(45/80))));
        //var_dump($test);
        $ranking = array_search($student[0]->id, array_keys($test));
       //echo $ranking;
        return View::make('home',compact('user','student','schedule','course','ambil','jurusan','kelas','nilai','kepribadian','count','str','ranking'));
    }

    // ********************* controller kelas *********************

    public function kelas($jenjang)
    {
    	if($jenjang == 'smp'){
    		$tingkat = \App\Models\kelas::where('vocational_id','=','3')
    		->with('vocational')
    		->get();
    		$jurusan = \App\Models\vocational::where('id','=','3')->get();
    		$judul = 'SMP';
    	}else{
    		$tingkat = \App\Models\kelas::where('vocational_id','!=','3')
			->with('vocational')
    		->get();
    		$jurusan = \App\Models\vocational::where('id','!=','3')->get();
    		$judul = 'SMK';
    	}
    	$count = $tingkat->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();
    	$ambil = 'class';
        //echo $tingkat;
        return View::make('adminpage',compact('muridsmk','count','tingkat','judul','ambil','jurusan'));
    }

    public function kelasGetAjax($task_id)
    {
    	$task = \App\Models\Kelas::find($task_id)->toArray();
    	$tasks = \App\Models\Vocational::find($task['vocational_id'])->toArray();

    	return Response::json(array('kelas'=>$task,'jurusan'=>$tasks));
    }

    public function kelasPostAjax(Request $request)
    {
    	$task = \App\Models\Kelas::create($request->all());

    	return Response::json($task);
    }

    public function kelasPutAjax(Request $request,$task_id)
    {
    	 $task = \App\Models\Kelas::find($task_id);
    

	    $task->name = $request->name;
	    $task->vocational_id = $request->vocational_id;

	    $task->save();
		$task1 = \App\Models\Kelas::find($task_id)->toArray();
	    $tasks = \App\Models\Vocational::find($task['vocational_id'])->toArray();
	    return Response::json(array('kelas'=>$task1,'jurusan'=>$tasks));
    }

    public function kelasDeleteAjax($task_id)
    {
    	$task = \App\Models\Kelas::destroy($task_id);

    	return Response::json($task);
    }

    // ********************* controller siswa *********************

    public function siswa($id)
    {
    	$siswa = \App\Models\kelas::where('kelas.vocational_id','=',$id)
    		->with('student.religion','student.sex','student.status','student.user')
    		->get();
    	
    	if($id == 3){	
    		$judul = 'SMP';
    		$kelas = \App\Models\kelas::where('vocational_id','=','3')->get();
    	}
    	else{	
    		$judul = 'SMK';
    		$kelas = \App\Models\kelas::where('vocational_id','!=','3')->get();
    	}
    	
    	$jk = \App\Models\Sex::get();
    	$agama = \App\Models\Religion::get();
    	$status = \App\Models\status::get();
    	$count = $siswa[0]->student->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'siswa';
        //echo $siswa;
        return View::make('adminpage',compact('muridsmk','count','siswa','judul','ambil','kelas','status','agama','jk'));
    }

    public function siswaGetAjax($task_id)
    {
    	$task = \App\Models\student::where('id','=',$task_id)
    	->with('religion','sex','kelas','status','user')->get();
    	
        //echo $guru;
        return Response::json($task);
    }

    public function siswaPostAjax(Request $request)
    {
    	$task = \App\Models\student::create($request->all());

   		return Response::json($task);
    }

    public function siswaPutAjax(Request $request,$task_id)
    {
    	$task = \App\Models\student::find($task_id);
    
	    $task->fullname = $request->fullname;
	    $task->nis = $request->nis;
        $task->nisn = $request->nisn;
	    $task->address = $request->address;
	    $task->birth_place = $request->birth_place;
	    $task->birth_date = $request->birth_date;
	    $task->religion_id = $request->religion_id;
	    $task->sex_id = $request->sex_id;
	    $task->phone_number = $request->phone_number;
	    $task->entry_year = $request->entry_year;
		$task->kelas_id = $request->kelas_id;
		$task->status_id = $request->status_id;

	    $task->save();
	    return Response::json($task);
    }

    public function siswaDeleteAjax($task_id)
    {
    $task = \App\Models\student::destroy($task_id);

    return Response::json($task);
    }

    public function usersiswaPostAjax(Request $request, $task_id)
    {

        $password = bcrypt($request->input('password'));

        $user = new \App\Models\User;
        $user->username = $request->username;
        $user->password = $password;
        $user->save();

        $task = \App\Models\Student::find($task_id);
        $task->user_id = $user->id;
        $task->save();
        //echo $user->user_id;
        return Response::json($task);
    }

    public function usersiswaPutAjax(Request $request,$task_id)
    {

        $task = \App\Models\User::find($task_id);
    
        $task->username = $request->username;
        if($request->password != null){
            $password = bcrypt($request->input('password'));
            $task->password = $password; 
        }     
        $task->save();
        //var_dump($task);
        //echo $task->username;
        return Response::json($task);
    }

    public function usersiswaDeleteAjax($task_id)
    {
        $task = \App\Models\Student::find($task_id);

        $tasks = \App\Models\User::destroy($task->user_id);

        $task->user_id = null;
        $task->save();

        return Response::json($task);
    }

    public function detailsiswa($id)
    {
    	$siswa = \App\Models\student::where('id','=',$id)
    	->with('religion','sex','kelas.vocational','status')->get();
    	
    	if($id == 3){	
    		$judul = 'SMP';
    		$kelas = \App\Models\kelas::where('vocational_id','=','3')->get();
    	}
    	else{	
    		$judul = 'SMK';
    		$kelas = \App\Models\kelas::where('vocational_id','!=','3')->get();
    	}
    	
    	$jk = \App\Models\Sex::get();
    	$agama = \App\Models\Religion::get();
    	$status = \App\Models\status::get();
    	//$count = $siswa[0]->student->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'detailsiswa';
        //echo $siswa;
        return View::make('adminpage',compact('muridsmk','siswa','judul','ambil','kelas','status','agama','jk'));
    }

    // ********************* controller jurusan *********************

    public function jurusan()
    {
    	$tasks = \App\Models\Vocational::all();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  
    	$count = $muridsmk->count();	
    	$ambil = 'jurusan';
        //echo $siswa;
        return View::make('adminpage',compact('count','muridsmk','ambil', 'tasks'));
    }

    public function jurusanGetAjax($task_id)
    {
    	$jurusan = \App\Models\vocational::find($task_id);

   		return Response::json($jurusan);
    }

 	public function jurusanPostAjax(Request $request)
    {
    	$task = \App\Models\vocational::create($request->all());

    	return Response::json($task);
    }

    public function jurusanPutAjax(Request $request, $task_id)
    {
    $task = \App\Models\Vocational::find($task_id);

    $task->name = $request->name;

    $task->save();

    return Response::json($task);
    }

    public function jurusanDeleteAjax($task_id)
    {
    $task = \App\Models\Vocational::destroy($task_id);

    return Response::json($task);
    }

	// ********************* controller guru *********************

    public function guru()
    {
    	$guru = \App\Models\teacher::with('religion','sex','user')->get();
    	$agama = \App\Models\Religion::get();
    	$jk = \App\Models\Sex::get();
    	$count = $guru->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'guru';
        //echo $guru;
        return View::make('adminpage',compact('muridsmk','count','guru','ambil','agama','jk'));
    }

    public function guruGetAjax($task_id)
    {
    	$guru = \App\Models\teacher::where('id','=',$task_id)
    	->with('religion','sex','user')->get();
    	
        //echo $guru;
        return Response::json($guru);
    }

    public function guruPostAjax(Request $request)
    {
    	$task = \App\Models\Teacher::create($request->all());

   		return Response::json($task);
    }

    public function guruPutAjax(Request $request,$task_id)
    {
    	$task = \App\Models\Teacher::find($task_id);
    
	    $task->fullname = $request->fullname;
	    $task->nip = $request->nip;
	    $task->address = $request->address;
	    $task->birth_place = $request->birth_place;
	    $task->birth_date = $request->birth_date;
	    $task->religion_id = $request->religion_id;
	    $task->sex_id = $request->sex_id;
	    $task->phone_number = $request->phone_number;

	    $task->save();
	    return Response::json($task);
    }

    public function guruDeleteAjax($task_id)
    {
    	$task = \App\Models\Teacher::destroy($task_id);

    	return Response::json($task);
    }

    public function userguruPostAjax(Request $request, $task_id)
    {

        $password = bcrypt($request->input('password'));

        $user = new \App\Models\User;
        $user->username = $request->username;
        $user->password = $password;
        $user->save();

        $task = \App\Models\Teacher::find($task_id);
        $task->user_id = $user->id;
        $task->save();
        //echo $user->user_id;
        return Response::json($task);
    }

    public function userguruPutAjax(Request $request,$task_id)
    {

        $task = \App\Models\User::find($task_id);
    
        $task->username = $request->username;
        if($request->password != null){
            $password = bcrypt($request->input('password'));
            $task->password = $password; 
        }     
        $task->save();
        //var_dump($task);
        //echo $task->username;
        return Response::json($task);
    }

    public function userguruDeleteAjax($task_id)
    {
        $task = \App\Models\Teacher::find($task_id);

        $tasks = \App\Models\User::destroy($task->user_id);

        $task->user_id = null;
        $task->save();

        return Response::json($task);
    }

    public function rapotadmin()
    {
    	$student = \App\Models\student::get();
    	// $agama = \App\Models\Religion::get();
    	// $jk = \App\Models\Sex::get();
    	$count = $student->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'rapotadmin';
        //echo $student;
        return View::make('adminpage',compact('muridsmk','ambil','student','count'));
    }

    public function detailrapot($id)
    {
    	$student = \App\Models\student::where('id','=',$id)->get();
    	// $agama = \App\Models\Religion::get();
        // $jk = \App\Models\Sex::get();
        $kelas=\App\Models\nilai::where('student_id','=',$id)->select('id','kelas_name')->groupBy('kelas_name')->get();
    	$count = $student->count();
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'detailrapot';
        //echo $kelas;
        return View::make('adminpage',compact('muridsmk','ambil','student','count','kelas'));
    }

    public function detailrapotsiswa($kls,$smt,$id)
    {
        $user = \App\Models\user::find(Auth::user()->id);
        
        $ambil = 'reportsiswa';
            
            $student = \App\Models\student::where('user_id', '=', $id)->get();
            $jurusan = \App\Models\student::with('kelas.vocational','kelas.teacher')
            ->where('student.id','=', $student[0]->id)
            ->get();
            $schedule = \App\Models\schedule::where('kelas_id','=', $student[0]->kelas_id)
            ->with('subject')->get();
            $kelas=\App\Models\nilai::where('student_id','=',Auth::user()->id)->select('id','kelas_name')->groupBy('kelas_name')->get();
            $nilai = \App\Models\nilai::where('student_id','=',$student[0]->id)
            ->where('kelas_name','=',$kls)
            ->where('semester','=',$smt)
            ->get();
            $kepribadian = \App\Models\catatansiswa::where('student_id','=',$student[0]->id)
            ->where('kelas_name','=',$kls)
            ->where('semester','=',$smt)
            ->get();
            $muridsmk = \App\Models\vocational::where('id','!=','3')->get();  
            $count = $student->count();
       
        //echo $nilai;
        return View::make('adminpage',compact('user','student','schedule','course','ambil','jurusan','kelas','nilai','kepribadian','muridsmk'));
    }

    public function elearning()
    {
    	
        $kelas = \App\Models\kelas::groupBy('name')->get();
        $schedule = \App\Models\schedule::with('subject','kelas')->get();
    	
    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get();  	
    	$ambil = 'elearning';
        //echo $schedule;
        return View::make('adminpage',compact('muridsmk','ambil','kelas','schedule'));
    }

    public function elearningadmin($id)
    {
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get(); 
        $course = \App\Models\materi::where('schedule_id','=',$id)->get();
       	$ambil = 'elearningadmin';
       	//echo $kelas;
        return View::make('adminpage',compact('muridsmk','course','ambil'));
    }

    public function filemateriadmin($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);

    	$muridsmk = \App\Models\vocational::where('id','!=','3')->get(); 
        $course = \App\Models\materi::where('id','=',$id)->get();
       	$ambil = 'filemateri';
       	//echo $kelas;
        return View::make('adminpage',compact('user','course','ambil','id','muridsmk'));
    }

    public function videoadmin($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);
    	
        $course = \App\Models\materi::where('id','=',$id)
        ->with('video')
        ->get();
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get(); 
       	$ambil = 'video';
       	//echo $course;
        return View::make('adminpage',compact('user','course','ambil','id','muridsmk'));
    }

    public function tugasadmin($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get(); 
        $course = \App\Models\tugas::where('materi_id','=',$id)->get();
       	$ambil = 'tugas';
       	//echo $course;
        return View::make('adminpage',compact('user','course','ambil','id','muridsmk'));
    }

    public function latihanadmin($id)
    {
        $user = \App\Models\user::find(Auth::user()->id);
        $muridsmk = \App\Models\vocational::where('id','!=','3')->get();
        $course = \App\Models\materi::where('id','=',$id)
        ->with('quiz.question.answer')
        ->get();
       	$ambil = 'latihan';
       	//echo $course;
        return View::make('adminpage',compact('user','course','ambil','id','muridsmk'));
    }

    public function getLogout(){
        Auth::logout();
        //Session::flush();
        return Redirect::to('/login');
    }

    public function changepictPostAjax(Request $request, $task_id)
    {
        $task = \App\Models\student::find($task_id);
        $nis = $task->nis;
        $dirPath = 'images';

         //move to server folder
        if (isset($_FILES['file'])) {
            
                    $target_path = $dirPath;    
                    $ext = explode('.', basename( $_FILES['file']['name']));
                    $name = $nis.'.'.end($ext);
                    $target_path = $target_path .'/'. $name; 

                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                    //echo "The file has been uploaded successfully";   
                    $task->picture = $target_path;
                    $task->save();                
                } else {
                    echo "There was an error uploading the file, please try again!";
                    echo $_FILES['file']['tmp_name'];
                }                               
        };

        //$task = \App\Models\schedule::create($request->all());
        //return Response::json($task);
    return Redirect::to('detailsiswa&id='.$task_id);
        
    }

    public function download($id,$name)
    {
        $course = \App\Models\tugas::where('id','=',$id)->get();
        $path = $course[0]->url.'answer/'.$name;
        //var_dump($course);
        return response()->file($path);
    }

    public function excel()
    {
        return View::make('excel');
    }


}
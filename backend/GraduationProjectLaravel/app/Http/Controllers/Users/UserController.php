<?php


namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\Doctor;
use App\Models\studentfacttable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Illuminate\Database\Eloquent\Collection\length;
//use Session;
//use Illuminate\Support\Facades\Session;
//use phpDocumentor\Reflection\Types\Integer;

//use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $req)
    {

//        public function index()
//    {
//        $users = User::select(
//            "users.id",
//            "users.name",
//            "users.email",
//            "countries.name as country_name"
//        )
//            ->join("countries", "countries.id", "=", "users.country_id")
//            ->get();
//
//        dd($users);
//    }



        //mmkn n3ml model for courses wmen 5lalo n select el courses
        $user=Doctor::where('email',$req->email)->first();
//        $data=DB::select('CourseID')->distinct()->where('DoctorID',$user->DrID)->get();
//        $length=$data->length;

//        "120.0"
//        "120"."0"
//        120
//        "120"
//        $userID=(INT)$user->DrID;
//        $userID2=(string)$userID;
//        $userID2=settype($userID,"string");
//       $userID2=CONVERT($userID, STRING);

//        settype($userid,”string”)

        $data=studentfacttable::select('courses.CourseName')
            ->distinct()
            ->join("courses", "studentfacttables.CourseID", "=", "courses.CID")
            ->join("doctors","studentfacttables.DoctorID", "=", "doctors.DrID")
            ->where("doctors.DrID",$user->DrID)
            ->get();

//        $data=DB::select('courses.CourseName' , 'courses.CID')->distinct()->from('studentfacttables')->JOIN('courses')->
//        ON('studentfacttables.CourseID = courses.CID')->JOIN('doctors')->ON('studentfacttables.DoctorID  = doctors.DrID')->get();
//        $data=\DB::select('SELECT DISTINCT ($user->DrID) ,(courses.CID) , courses.CourseName
//FROM ((studentfacttables
//INNER JOIN courses ON studentfacttables.CourseID = courses.CID)
//INNER JOIN doctors ON studentfacttables.DoctorID  = doctors.DrID)');
//        0:{CourseID:"5"}
//        1:{CourseID:"91"}
        //eldonia hna static lazm msln 3ml for loop 3shan lw feeh akter mn course yego 3ltol
//        $course=course::select('CourseName')->where('CID',$data[0]->CourseID)->get();
//        $course2=course::select('CourseName')->where('CID',$data[1]->CourseID)->get();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or Password is not matched";
        }
        else{
//            for($i=0;count($data)<=count($data);$i++){
//                if($i<count($data)){
//                    $course=course::select('CourseName')->where('CID',$data[$i]->CourseID)->get();
//                }
//                else{
//                    break;
//                }
//            }
            session(['doctor' => $user]);
//            session(['data' => $data]);
            return response()->json([
                'status'=> 200,
                'user'=>$user,
                'courses'=>$data,
//                'getType'=>gettype($userID2),
//                'datta'=>$data[0]->CourseID,
//                'datta2'=>$data[1]->CourseID,
//                'course'=>$course,
//                'course2'=>$course2
            ]);
        }
    }

}

//$instances = (array) $db->loadObjectList('id', 'KunenaForumCategory');
//
//foreach ($instances as &$instance)
//{
//    $instance = new KunenaForumCategory(array('id'=>$instance->id));
//    $instance->load();
//}
//    public function show(Request $request){
//        $val=$request->session()->get('doctor');
//        return $val;
//
//    }
//    public function showProfile(Request $request){
//        $email="JeroenOerlemans @fci-cu.edu.eg";
////        $email=$request->session()->get('doctor');
////        dd($email);
//        $data=DB::table('doctors')->where('email','=',$email)->get();
////        print($data);
////        dd($data);
//        return response()->json([
//            'status'=> 200,
//            'Doctor'=>$data,
//        ]);
////    }
//    }
//}
//const usersss = localStorage.getItem('users');
//
//const logout = () =>
//    {
//        localStorage.removeItem("users")
//        history.push("/");
//    }

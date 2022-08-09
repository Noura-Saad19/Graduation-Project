<?php

namespace App\Http\Controllers\Profiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{

    public function showProfile(){
        $email="JeroenOerlemans @fci-cu.edu.eg";
//        $email=$request->session()->get('doctor');
//        dd($email);
        $data=DB::table('doctors')->where('email','=',$email)->get();
//        print($data);
//        dd($data);
        return response()->json([
            'status'=> 200,
            'Doctor'=>$data,
        ]);
    }

//public function showProfile(){
////    define("App\Http\Controllers\Profiles\usersss", localStorage . getItem('users'));
////    print_r(users);
////    dd();
////    $email="JeroenOerlemans @fci-cu.edu.eg";
//        $data=DB::table('doctors')->where("email",'=',session('doctor'))->get();
////        print($data);
////        dd($data);
////        where('email','=',$email)->get();
//        return response()->json([
//            'status'=> 200,
//            'Doctor'=>$data,
//        ]);
////    }
//}













    //'DataBase'=>DB::connection('sqlsrv2')->getDatabaseName(),

//    $databaseName = DB::connection('sqlsrv2')->getDatabaseName();
//    dd($databaseName);


//    $isExist = DB::connection('sqlsrv2')->table('UpdatedDoctors')->select("*")->where("email","=",$email)->exists();
//    if ($isExist) {
//        return response()->json([
//            'status'=> 200,
//            'Doctor'=>$isExist,
//            //'DataBase'=>DB::connection('sqlsrv2')->getDatabaseName(),
//        ]);
////        dd('Record is available.');
//
//    }else{
//        dd('Record is not available.');

//    public function editProfile(){
//        $email="JeroenOerlemans @fci-cu.edu.eg";
//        $data=DB::connection('sqlsrv2')->table('UpdateDoctors');
//    }
//INSERT INTO UpdatedDoctors(DrID, DrName, Gender, BirthYear, MasterDegree, GraduationYear,old,password,Description,Department,created_at,updated_at)
//VALUES ('1','AliRisan','Male','AliRisan@fci-cu.edu.eg','1969','Assistant professor degree','1993','L5mDSSc','$2y$10$GwOTsKZm4dwpXusEmOV/JuTi8e3oKNbdNPaqOV3pgahPNEB7N5k2K',
//'Exemplary skills in reading, analysis, research, critical thinking, and writing, giving me the optimal tools to make further advances in the field.'
//,'1','22/5/2021','15/8/2031');
}

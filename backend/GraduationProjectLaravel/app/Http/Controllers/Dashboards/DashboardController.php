<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\studentfacttable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    //chart1
    public function averageGPA(){
        $result = DB::select(DB::raw("SELECT YEAR(time.FullTime) AS StudentYears ,
        AVG(students.GPA) as StudentGPAs
        FROM ((studentfacttables
        INNER JOIN students ON studentfacttables.StudentID = students.StudentID)
        INNER JOIN time ON studentfacttables.TimeID  = time.TimeID)
        Where time.mounth=9
        group by studentfacttables.TimeID , YEAR(time.FullTime)"));
//        $data="";
//        foreach($result as $val){
//            $data.="['".$val->StudentYears."',".$val->StudentGPAs."'],";
//        }
        return response()->json([
            'status' => 200,
            'chart1' => $result,
        ]);
    }

    //chart1Doctor
    /*public function relationExamType(){
        $result = DB::select(DB::raw("SELECT exams.ExamType, Count(studentfacttables.FinalWork) AS avgFinalWork
                FROM (studentfacttables
                INNER JOIN exams ON studentfacttables.examID  = exams.examID)
                where (studentfacttables.FinalWork)>18
                group by exams.ExamType"));
        return response()->json([
            'status' => 200,
            'chart1' => $result,
        ]);
    }*/
    //Chart1 Doctor
    public function relationExamType(Request $request){
        $course=course::select('CID')->where('CourseName',$request->course1)->get();
        $data=studentfacttable::
        selectRaw('exams.ExamType ,
        count(studentfacttables.FinalWork) as avgFinalWork')
            ->where("studentfacttables.CourseID", $course[0]->CID)
            ->where('studentfacttables.FinalWork', '>', 18)
            ->join("exams", "studentfacttables.ExamID", "=", "exams.examID")
            ->groupBy('exams.ExamType')
            ->get();
        return response()->json([
            'status' => 200,
            'chart1' => $data,
        ]);

    }
    //chart 1 Dean
    public function relationBetSuccessYears(){
        $result = DB::select(DB::raw("SELECT YEAR(time.FullTime) AS Years, count(studentfacttables.CourseSuccess) AS countSuccess
        FROM (studentfacttables
        INNER JOIN time ON studentfacttables.TimeID  = time.TimeID) where time.mounth=9 and studentfacttables.CourseSuccess=0
		group by time.FullTime"));
        return response()->json([
            'status' => 200,
            'chart1' => $result,
        ]);
    }


    //chart4 QA

    //CS
    public function getCSPerformance()
    {
        $data = \DB::select('select avg(distinct[dbo].[students].[GPA]) as CSStudents
        from [dbo].[students],[dbo].[studentfacttables]
        where DeptCode=1 and [dbo].[students].StudentID=[dbo].[studentfacttables].StudentID');
        return response()->json([
            'status' => 200,
            'CSPerformance' => $data,
        ]);
    }
    //IS
    public function getISPerformance()
    {
        $data = \DB::select('select avg(distinct [dbo].[students].[GPA]) as ISStudents
        from [dbo].[students],[dbo].[studentfacttables]
        where [DeptCode]=2 and [dbo].[students].StudentID=[dbo].[studentfacttables].StudentID');
        return response()->json([
            'status' => 200,
            'ISPerformance' => $data,
        ]);
        // dd($data);
    }
    //IT
    public function getITPerformance()
    {
        $data = \DB::select('select avg(distinct [dbo].[students].[GPA]) as ITStudents
        from [dbo].[students],[dbo].[studentfacttables]
        where [DeptCode]=3 and [dbo].[students].StudentID=[dbo].[studentfacttables].StudentID');
        return response()->json([
            'status' => 200,
            'ITPerformance' => $data,
        ]);
        // dd($data);
    }
    //DS
    public function getDSPerformance()
    {
        $data = \DB::select('select avg(distinct [dbo].[students].[GPA]) as DSStudents
        from [dbo].[students],[dbo].[studentfacttables]
        where [DeptCode]=4 and [dbo].[students].StudentID=[dbo].[studentfacttables].StudentID');
        return response()->json([
            'status' => 200,
            'DSPerformance' => $data,
        ]);
        // dd($data);
    }
    //AI
    public function getAIPerformance()
    {
        $data = \DB::select('select avg(distinct [dbo].[students].[GPA]) as AIStudents
        from [dbo].[students],[dbo].[studentfacttables]
        where [DeptCode]=5 and [dbo].[students].StudentID=[dbo].[studentfacttables].StudentID');
        return response()->json([
            'status' => 200,
            'AIPerformance' => $data,
        ]);
        // dd($data);
    }
    // Chart 3,2
    public function studentPerformance(){
        $data=\DB::select('select avg(GPA)*10 as StudentPerformance from students;');
        return response()->json([
            'status' => 200,
            'StudentPerformance' => $data,
        ]);

    }
    public function doctorPerformance(){
        $data=\DB::select('select avg(DrScore)*100 as DoctorPerformance from studentfacttables;');
        return response()->json([
            'status' => 200,
            'DoctorPerformance' => $data,
        ]);
    }
    public function TAPerformance(){
        $data=\DB::select('select avg(TaScore)*100 as TAPerformance from studentfacttables;');
        return response()->json([
            'status' => 200,
            'TAPerformance' => $data,
        ]);
    }

    public function studentPerformanceForCourse(Request $request)
    {
        //691
        $course=course::select('CID')->where('CourseName',$request->course1)->get();
        $result= studentfacttable::selectRaw( "SUM( YearWork + FinalWork ) as SUM" )->where('CourseID',$course[0]->CID)->get("SUM");
        $result2=studentfacttable::selectRaw("CAST(count(StudentID) AS INT) as countt")->where('CourseID',$course[0]->CID)->get();
        $avg=($result->sum("SUM")/$result2[0]->countt);
        session(['Studentper' => $avg]);
        return response()->json([
            'status'=> 200,
            'Studentper'=>$avg,
        ]);

    }
    public function TAPerformanceForCourse(Request $request)
    {
        $course=course::select('CID')->where('CourseName',$request->course1)->get();
        $result= studentfacttable::where('CourseID',$course[0]->CID)->avg('TaScore')*100;
        session(['TAper' => $result]);
        return response()->json([
            'status'=> 200,
            'TAper'=>$result,
        ]);

    }
    public function attendancePercentageForCourse(Request $request){
        $course=course::select('CID')->where('CourseName',$request->course1)->get();
        $result= studentfacttable::where('CourseID',$course[0]->CID)->avg('AttendancePercentage')*100;
        session(['Attendper' => $result]);
        return response()->json([
            'status'=> 200,
            'Attendper'=>$result,
        ]);
//        $data=\DB::select('select avg(AttendancePercentage)*1000 as AtendancePercentage from studentfacttables where CourseID=1;');
//        return response()->json([
//            'status' => 200,
//            'attendancePercentageForCourse' => $data,
//        ]);
    }

    public function getStudentsCount(){
        $data=\DB::select(' select count(distinct (StudentID)) as Students from students');
        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }
    public function getDoctorsCount(){
        $data=\DB::select('select count(distinct (DrID)) as Doctors from doctors;');
        return response()->json([
            'status' => 200,
            'Doctors' => $data,
        ]);

    }
    public function getTAsCount(){
        $data=\DB::select('select count(distinct (TaID)) as TAs  from teacherassistants;');
        return response()->json([
            'status' => 200,
            'TAs' => $data,
        ]);

    }
    public function getDepartmentsCount(){
        $data=\DB::select('select count(distinct (Dep_code)) as Departments  from departments;');
        return response()->json([
            'status' => 200,
            'Departments' => $data,
        ]);
    }



    //    public function studentPerformanceForCourse(Request $request){
//        $course=course::select('CID')->where('CourseName',$request->course1)->get();
//        $sum=studentfacttable::select(\DB::raw('SUM(YearWork + FinalWork) as StudentPerformanceForCourse')->where('CourseID',$course[0]->CID)->get();
//        $result= studentfacttable::
//            select(DB::raw('SUM(YearWork + FinalWork) as StudentPerformanceForCourse'))
//                ->where('CourseID',$course[0]->CID)->avg('StudentPerformanceForCourse')*1000;
//        session(['Studentper' => $result]);
//        return response()->json([
//            'status'=> 200,
//            'Studentper'=>$result,
//        ]);
////        $data=\DB::select('select avg(YearWork+FinalWork)*10 as StudentPerformanceForCourse from studentfacttables where CourseID=1;');
////        return response()->json([
////            'status' => 200,
////            'studentPerformanceForCourse' => $data,
////        ]);
//    }
////    public function TAPerformanceForCourse(){
////        $data=\DB::select('select avg(TaScore)*1000 as TAPerformanceForCourse from studentfacttables where CourseID=1;');
////        return response()->json([
////            'status' => 200,
////            'TAPerformanceForCourse' => $data,
////        ]);
////    }
//for doctor
//
//Ta Performnce
//select avg(TaScore)*100 as TAPerformance from studentfacttable where CourseID=1;
//
//STudent Performce
//select avg(YearWork+FinalWork) as StudentPerformance from studentfacttable where CourseID=1;
//
//Atendance
//
//select avg(AttendancePercentage)*100 as AtendancePercentage from studentfacttable where CourseID=1;
//
//
//QA:
//
//-Doctor Performance: Avg of (year work +final work)
//
//-TA performance: Tascore OR avg of year work
//
//-Students performance: avg of gpas
//
//
//——- Doctors ——-
//
//Ta Performance : msh 3rfa bsra7a lesa mmkn n5leh 3la asas el Tascore wla 3la asas el yearwork bt3 el mada eli darsha
//
//-Attendance percentage performance: Avg of attendance percentage lel talba fel mada el dr darseha
//
//Students performance el yearwork + finalwork bt3 el mada eli el dr drsha
//
//——- Dean ——
//Nfs el Qa lel students w el doctors bs
}

//select count(distinct [StudentID]) as CSStudents
//from [dbo].[studentfacttable]
//where [DeptCode]=1
//------------------------------------
//select count(distinct [StudentID]) as ISStudents
//from [dbo].[studentfacttable]
//where [DeptCode]=2
//-------------------------------------
//select count(distinct [StudentID]) as ITStudents
//from [dbo].[studentfacttable]
//where [DeptCode]=3
//-------------------------------------
//select count(distinct [StudentID]) as DSStudents
//from [dbo].[studentfacttable]
//where [DeptCode]=4
//-------------------------------------
//select count(distinct [StudentID]) as AIStudents
//from [dbo].[studentfacttable]
//where [DeptCode]=5


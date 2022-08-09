<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\exam;
use App\Models\studentfacttable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reports extends Controller
{

    public function QaReport()
    {

        $data = \DB::select('select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);
    }

    public function DeanReport()
    {

        $data = \DB::select('select
       doctors.DrName,courses.CourseName,time.Year,AVG(studentfacttables.FinalWork+studentfacttables.YearWork) as AverageOfGrades
       from studentfacttables,courses,doctors,time
       where
             studentfacttables.DoctorID=doctors.DrID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.TimeID=time.TimeID
       group by doctors.DrName,courses.CourseName,time.Year ;');


        return response()->json([
            'status' => 200,
            'Doctors' => $data,
        ]);
    }

    public function Year2017()
    {

        $data = \DB::select('SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2017,
        TaScore*100 AS TAPerformanceIn2017,DrScore*100 AS DRPerformanceIn2017
        FROM studentfacttables,time,courses
        where  studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID and time.Year=2017 ; ');


        return response()->json([
            'status' => 200,
            'Year2017' => $data,
        ]);
    }

    public function Year2018()
    {

        $data = \DB::select('    SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2018,
TaScore*100 AS TAPerformanceIn2018,DrScore*100 AS DRPerformanceIn2018
FROM studentfacttables,time,courses
where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2018');


        return response()->json([
            'status' => 200,
            'Year2018' => $data,
        ]);
    }

    public function Year2019()
    {

        $data = \DB::select('SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2019,
TaScore*100 AS TAPerformanceIn2019,DrScore*100 AS DRPerformanceIn2019
FROM studentfacttables,time,courses
where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2019');


        return response()->json([
            'status' => 200,
            'Year2019' => $data,
        ]);
    }

    public function Year2020()
    {

        $data = \DB::select('SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2020,
TaScore*100 AS TAPerformanceIn2020,DrScore*100 AS DRPerformanceIn2020
FROM studentfacttables,time,courses
where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2020');


        return response()->json([
            'status' => 200,
            'Year2020' => $data,
        ]);
    }

    public function Year2021()
    {

        $data = \DB::select('SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2021,
TaScore*100 AS TAPerformanceIn2021,DrScore*100 AS DRPerformanceIn2021
FROM studentfacttables,time,courses
where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2021');


        return response()->json([
            'status' => 200,
            'Year2021' => $data,
        ]);
    }

    public function Year2022()
    {

        $data = \DB::select('SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2022,
TaScore*100 AS TAPerformanceIn2022,DrScore*100 AS DRPerformanceIn2022
FROM studentfacttables,time,courses
where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2022');


        return response()->json([
            'status' => 200,
            'Year2022' => $data,
        ]);
    }

    public function AverageYear2017()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2017
group by time.Year');

        return response()->json([
            'status' => 200,
            'AverageYear2017' => $data,
        ]);
    }

    public function AverageYear2018()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2018
group by time.Year');


        return response()->json([
            'status' => 200,
            'AverageYear2018' => $data,
        ]);
    }

    public function AverageYear2019()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2019
group by time.Year');


        return response()->json([
            'status' => 200,
            'AverageYear2019' => $data,
        ]);
    }

    public function AverageYear2020()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2020
group by time.Year');


        return response()->json([
            'status' => 200,
            'AverageYear2020' => $data,
        ]);
    }

    public function AverageYear2021()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2021
group by time.Year');


        return response()->json([
            'status' => 200,
            'AverageYear2021' => $data,
        ]);
    }

    public function AverageYear2022()
    {

        $data = \DB::select('select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
from studentfacttables , doctors,time
where  studentfacttables.TimeID=time.TimeID and
time.Year=2022
group by time.Year');


        return response()->json([
            'status' => 200,
            'AverageYear2022' => $data,
        ]);
    }

    public function StudentFailed()
    {

        $data = \DB::select('select count(studentfacttables.StudentID) AS NoStudentsFailed,courses.CourseName
from studentfacttables
INNER JOIN courses ON studentfacttables.CourseID=courses.CID where studentfacttables.CourseSuccess=0
group by courses.CourseName');


        return response()->json([
            'status' => 200,
            'StudentFailed' => $data,
        ]);
    }


    public function FailedStudent2017()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2017;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function FailedStudent2018()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2018;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function FailedStudent2019()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2019;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function FailedStudent2020()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2020;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function FailedStudent2021()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2021;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function FailedStudent2022()
    {
        $data = \DB::select(' select
       students.FullName,studentfacttables.FinalWork+studentfacttables.YearWork AS FinalGrade,courses.CourseName,time.Year,courses.CreditHours
       from studentfacttables,students,time,courses,exams
       where
             studentfacttables.StudentID=students.StudentID and
             studentfacttables.CourseID=courses.CID and
             studentfacttables.examID=exams.examID and
             studentfacttables.TimeID=time.TimeID and
             studentfacttables.CourseSuccess=0 and
             time.Year=2022;');

        return response()->json([
            'status' => 200,
            'Students' => $data,
        ]);

    }

    public function getAllCourses(){
        $data=\DB::select('   select courses.CourseName from courses;');

        return response()->json([
            'status' => 200,
            'Courses' => $data,
        ]);

    }
    public function getScoreBySpecificCourse(Request $request)
    {
//        $data=studentfacttable::where("courses.CourseName", $request->course)
////        sum(\DB::raw('studentfacttables.YearWork + studentfacttables.FinalWork As StudentScore'))->
////        avg('dbo.TaScore As TAScore','dbo.DrScore AS DRScore')
//            ->
//        select(array('courses.CID','dbo.DoctorID' ,'doctors.DrName',
////            '',
////            'AVG(studentfacttables.TaScore)*100 As TAScore','AVG(studentfacttables.DrScore)*100 As DrScore'
//        ))
//            ->join("courses", "dbo.CourseID", "=", "courses.CID")
//            ->join("doctors","dbo.DoctorID", "=", "doctors.DrID")
//
////            ->group('courses.CID','dbo.DoctorID' ,'doctors.DrName',
//////                'dbo.YearWork','dbo.FinalWork',
////            'dbo.TaScore','dbo.DrScore')
//            ->avg('dbo.TaScore As TAScore','dbo.DrScore AS DRScore')
//            ->get();
//        $data=studentfacttable::where("courses.CourseName", $request->course)
//            ->avg('dbo.TaScore As TAScore','dbo.DrScore AS DRScore')
//            ->select(array('courses.CID','dbo.DoctorID' ,'doctors.DrName'))
//            ->join("courses", "dbo.CourseID", "=", "courses.CID")
//            ->join("doctors","dbo.DoctorID", "=", "doctors.DrID")
//            ->get();

        $data=studentfacttable::
            selectRaw('courses.CID,studentfacttables.DoctorID ,doctors.DrName ,
            round(avg(YearWork + FinalWork),2) as StudentScore,
            round(avg(studentfacttables.TaScore)*100,2) as TAScore,round(avg(studentfacttables.DrScore)*100,2) as DRScore')
            ->where("courses.CourseName", $request->course)
            ->join("courses", "studentfacttables.CourseID", "=", "courses.CID")
            ->join("doctors","studentfacttables.DoctorID", "=", "doctors.DrID")
            ->groupBy('courses.CID','studentfacttables.DoctorID' ,'doctors.DrName')
            ->get();




//        $course = course::select('CID')->where('CourseName', $request->course)->get();
//        $dr = studentfacttable::select('DoctorID')->distinct()->where('CourseID', $course[0]->CID)->get();
//
//        //hna el moskla eny rag3 5 doctors fa hna msh h3rf amsy 3lehom ell static
//        $result = studentfacttable::selectRaw("SUM( YearWork + FinalWork ) as SUM")
//            ->where('CourseID', $course[0]->CID)->where('DoctorID', $dr[0]->DoctorID)->get("SUM");
//        $result2 = studentfacttable::selectRaw("CAST(count(StudentID) AS INT) as countt")->
//        where('CourseID', $course[0]->CID)->where('DoctorID', $dr[0]->DoctorID)
//            ->get();
//        $avg = ($result->sum("SUM") / $result2[0]->countt) * 10;
//        session(['Studentperforcourse' => $avg]);
//        $result1= studentfacttable::selectRaw( "studentfacttables.DrScore as Avg" )
//            ->where('CourseID',$course[0]->CID)->get("Avg");
//        $result3=studentfacttable::selectRaw("CAST(count(DoctorID) AS INT) as countt")->where('CourseID',$course[0]->CID)->get();
//        $avg1=($result1->AVG("Avg")/$result3[0]->countt)*100000;
//        session(['Doctorperforcourse' => $avg1]);
//
//        $result2= studentfacttable::selectRaw( "studentfacttables.TaScore as Avg" )
//            ->where('CourseID',$course[0]->CID)->get("Avg");
//        $result4=studentfacttable::selectRaw("CAST(count(TAID) AS INT) as countt")->where('CourseID',$course[0]->CID)->get();
//        $avg2=($result2->AVG("Avg")/$result4[0]->countt)*100000;
//        session(['TAperforcourse' => $avg2]);

        return response()->json([
            'status' => 200,
            'data'=>$data
        ]);
    }


    public function DoctorReport(Request  $request){

        $course = course::select('CID')->where('CourseName', $request->course)->get();
        $data=studentfacttable::
        selectRaw('studentfacttables.CourseID,teacherassistants.TAName,
            round(avg(studentfacttables.TaScore)*100,2) as TaFeedback,
            round(avg(studentfacttables.YearWork),2) as StudentsPerformance'
            )
            ->join("teacherassistants", "studentfacttables.TAID", "=", "teacherassistants.TAID")
            ->where("studentfacttables.CourseID", $course[0]->CID)
            ->groupBy('teacherassistants.TAName','studentfacttables.CourseID')
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function DoctorReport2(Request  $request){

        $course = course::select('CID')->where('CourseName', $request->course)->get();
        $data=studentfacttable::
        selectRaw('studentfacttables.YearWork+studentfacttables.FinalWork AS StudentsPerformance ,
         studentfacttables.AttendancePercentage')
            ->where("studentfacttables.CourseID", $course[0]->CID)
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function DoctorReport3(Request  $request){

        $course = course::select('CID')->where('CourseName', $request->course)->get();
        $data=studentfacttable::
        selectRaw('studentfacttables.DeptCode,
            round(avg(studentfacttables.YearWork+studentfacttables.FinalWork),2) as StudentsPerformance')
            ->where("studentfacttables.CourseID", $course[0]->CID)
            ->groupBy('studentfacttables.DeptCode')
            ->get();
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

//    public function examRelation(Request $request)
//    {
//        $course = course::select('CID')->where('CourseName', $request->course)->get();
//        $exam=  studentfacttable::select('examID')->distinct()->where('CourseID',$course[0]->CID)->get();
//        $exam2=exam::select('ExamLevel')->where('examID',$exam[0]->examID)->get();
//        return response()->json([
//            'status' => 200,
//            'course' => $exam2,
//        ]);
//
////        SELECT Distinct(exams.examID)
////      ,ExamLevel = 'easy'
////      ,ExamType = 'essay'
////	  ,CourseName='Introduction to Database Systems',
////	  studentfacttables.StudentID,
////	  studentfacttables.YearWork + studentfacttables.FinalWork as StudentGrade
////  FROM exams,courses,studentfacttables,time
////  where studentfacttables.TimeID=time.TimeID and studentfacttables.examID=exams.examID and studentfacttables.CourseID=courses.CID and time.Year=2017
//    }





}













//specify by year to know student performance, dr ,ta also ,,, bs note lw 5eet el time 2018 fa hygeeb brdo el talba elly ids begin with 2017
//
//SELECT  time.Year ,StudentID,DoctorID,TAID,YearWork,FinalWork,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2017
//
//SELECT  time.Year ,StudentID,DoctorID,TAID,YearWork,FinalWork,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2018
//
//SELECT  time.Year ,StudentID,DoctorID,TAID,YearWork,FinalWork,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2020
//
//SELECT time.Year, StudentID, DoctorID
//,TAID, Sum(YearWork + FinalWork) as overallGrade,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2020
//group by time.Year, studentfacttables.StudentID,studentfacttables.DoctorID,
//studentfacttables.TAID,studentfacttables.TaScore,studentfacttables.DrScore
//
//SELECT  time.Year ,StudentID,DoctorID,TAID,YearWork,FinalWork,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2021
//
//SELECT  time.Year,StudentID,DoctorID,TAID,YearWork,FinalWork,TaScore,DrScore
//FROM studentfacttables,time
//where studentfacttables.TimeID=time.TimeID and time.Year=2022
//

//7l a5r

//hna i will show el courses elly a5doha students of 2017 w el performance of DR,TA,Student
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2017,TaScore*100 AS TAPerformanceIn2017,DrScore*100 AS DRPerformanceIn2017
//FROM studentfacttables,time,courses
//where  studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID and time.Year=2017
//
//hna we will show also student of 2017 bl mawad bt3 sana tanya
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2018,
//TaScore*100 AS TAPerformanceIn2018,DrScore*100 AS DRPerformanceIn2018
//FROM studentfacttables,time,courses
//where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2018
//
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2019,
//TaScore*100 AS TAPerformanceIn2019,DrScore*100 AS DRPerformanceIn2019
//FROM studentfacttables,time,courses
//where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2019
//
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2020,
//TaScore*100 AS TAPerformanceIn2020,DrScore*100 AS DRPerformanceIn2020
//FROM studentfacttables,time,courses
//where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2020
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2021,
//TaScore*100 AS TAPerformanceIn2021,DrScore*100 AS DRPerformanceIn2021
//FROM studentfacttables,time,courses
//where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2021
//
//SELECT courses.CourseName,time.Year,YearWork+FinalWork AS StudentPerformanceIn2022,
//TaScore*100 AS TAPerformanceIn2022,DrScore*100 AS DRPerformanceIn2022
//FROM studentfacttables,time,courses
//where studentfacttables.TimeID=time.TimeID and studentfacttables.CourseID=courses.CID  and time.Year=2022

//mmkn nsht8l bl average bardo

//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2017
//group by time.Year
//
//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2018
//group by time.Year
//
//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2019
//group by time.Year
//
//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2020
//group by time.Year
//
//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2021
//group by time.Year
//
//select AVG(DrScore)*100 AS DRScore ,AVG(TaScore)*100 AS TAScore ,time.Year
//from studentfacttables , doctors,time
//where  studentfacttables.TimeID=time.TimeID and
//time.Year=2022
//group by time.Year


//Know the office hour of TA
//select OfficeHours,TAName from teacherassistants

//specify for each group nshof number of attendance ll students 3shan msln nshof reason of msln leh el gpa olayll
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G1' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G2' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G3' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G4' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G5' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G6' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G7' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G8' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G9' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G10' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G11' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G12' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID
//
//Select   Distinct(students.StudentID),courses.CourseName,labgroups.GroupName,teacherassistants.TAName,labgroups.numberOfAttendees
//from studentfacttables,teacherassistants,labgroups,students,courses
//where GroupName='G13' and studentfacttables.TAID=teacherassistants.TAID and studentfacttables.GID=labgroups.GID
//and studentfacttables.StudentID = students.StudentID and studentfacttables.CourseID=courses.CID
//order by StudentID


//mmkn hna b2a n specify aktr ya3ny yd5l msln el coursename w specify el exam type w level 'easy w essay' dargat el talba kant eh w pla pla....
//SELECT Distinct(exams.examID)
//      ,ExamLevel = 'easy'
//      ,ExamType = 'essay'
//	  ,CourseName='Introduction to Database Systems',
//	  studentfacttables.StudentID,
//	  studentfacttables.YearWork + studentfacttables.FinalWork as StudentGrade
//  FROM exams,courses,studentfacttables,time
//  where studentfacttables.TimeID=time.TimeID and studentfacttables.examID=exams.examID and studentfacttables.CourseID=courses.CID and time.Year=2017


//            ->table(DB::raw('studentfacttable','courses','doctors','time'))->
//       selectRaw('doctors.DrName,courses.CourseName,time.Year,AVG(studentfacttable.FinalWork) as AverageOfGrades')
//            ->where([
//                    ['studentfacttable.DoctorID','=','doctors.DrID'],
//                    ['studentfacttable.CourseID','=','courses.CID'],
//                    ['studentfacttable.TimeID','=','time.TimeID']
//                ]
// )->groupBy('doctors.DrName','courses.CourseName','time.Year')->get();
//$data=DB::connection('sqlsrv2')->table('Exam')
////            FinalWork,,Exam.StudentID
////                subject elly eldoctor edaha bl sana elly edaha feeha w average of grades
//    ->selectRaw('Exam.CID,doctorcourse.DrID,doctors.DrName,Course.CourseName,
//            YEAR(doctorcourse.CourseTime) as Year ,FinalWork')
//    ->join('doctorcourse',function ($join) {
//        $join->on('Exam.CID', '=', 'doctorcourse.CID');
//    }
//    )
//    ->join('doctors',function ($join) {
//        $join->on('doctors.DrID', '=', 'doctorcourse.DrID');
//    }
//    )->join('Course',function ($join) {
//        $join->on('Exam.CID', '=', 'course.CID');
//    })
//
////            ->avg('FinalWork')
//    ->where('Exam.FinalWork','>=',50)->distinct('Year')
//    ->get();
//        $grades=DB::connection('sqlsrv2')->table('Exam')->selectRaw('Exam.FinalWork,Exam.CID')->get();
//        $data=DB::connection('sqlsrv2')->table('doctorcourse')
////            FinalWork,,Exam.StudentID
////                subject elly eldoctor edaha bl sana elly edaha feeha w average of grades
//            ->selectRaw('doctorcourse.CID,doctorcourse.DrID,doctors.DrName,Course.CourseName,
//            YEAR(doctorcourse.CourseTime) as Year ')
////            ,Exam.FinalWork
////            ->join('doctorcourse',function ($join) {
////                $join->on('Exam.CID', '=', 'doctorcourse.CID');
////            }
////            )
//            ->join('doctors',function ($join) {
//                $join->on('doctors.DrID', '=', 'doctorcourse.DrID');
//            }
//            )->join('Course',function ($join) {
//                $join->on('doctorcourse.CID', '=', 'course.CID');
//            })
////            ->join('Exam',function ($join) {
////                $join->on('Exam.CID', '=', 'doctorcourse.CID');
////            }
////            )
//
////            ->avg('FinalWork')
////            ->where('Exam.FinalWork','>=',50)->distinct('Year')
//            ->get();
////

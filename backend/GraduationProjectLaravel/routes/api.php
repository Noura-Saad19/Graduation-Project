<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[App\Http\Controllers\Users\UserController::class,'login']);

Route::get('/Reports/QaReport',[\App\Http\Controllers\Report\Reports::class,'QaReport']);
Route::get('/Reports/DeanReport',[\App\Http\Controllers\Report\Reports::class,'DeanReport']);
Route::get('/Reports/Year2017',[\App\Http\Controllers\Report\Reports::class,'Year2017']);
Route::get('/Reports/Year2018',[\App\Http\Controllers\Report\Reports::class,'Year2018']);
Route::get('/Reports/Year2019',[\App\Http\Controllers\Report\Reports::class,'Year2019']);
Route::get('/Reports/Year2020',[\App\Http\Controllers\Report\Reports::class,'Year2020']);
Route::get('/Reports/Year2021',[\App\Http\Controllers\Report\Reports::class,'Year2021']);
Route::get('/Reports/Year2022',[\App\Http\Controllers\Report\Reports::class,'Year2022']);
Route::get('/Reports/AverageYear2017',[\App\Http\Controllers\Report\Reports::class,'AverageYear2017']);
Route::get('/Reports/AverageYear2018',[\App\Http\Controllers\Report\Reports::class,'AverageYear2018']);
Route::get('/Reports/AverageYear2019',[\App\Http\Controllers\Report\Reports::class,'AverageYear2019']);
Route::get('/Reports/AverageYear2020',[\App\Http\Controllers\Report\Reports::class,'AverageYear2020']);
Route::get('/Reports/AverageYear2021',[\App\Http\Controllers\Report\Reports::class,'AverageYear2021']);
Route::get('/Reports/AverageYear2022',[\App\Http\Controllers\Report\Reports::class,'AverageYear2022']);
Route::get('/Reports/StudentFailed',[\App\Http\Controllers\Report\Reports::class,'StudentFailed']);
Route::get('/Reports/FailedStudent2017',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2017']);
Route::get('/Reports/FailedStudent2018',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2018']);
Route::get('/Reports/FailedStudent2019',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2019']);
Route::get('/Reports/FailedStudent2020',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2020']);
Route::get('/Reports/FailedStudent2021',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2021']);
Route::get('/Reports/FailedStudent2022',[\App\Http\Controllers\Report\Reports::class,'FailedStudent2022']);
Route::post('/Reports/getScoreBySpecificCourse',[\App\Http\Controllers\Report\Reports::class,'getScoreBySpecificCourse']);
Route::get('/Reports/getAllCourses',[\App\Http\Controllers\Report\Reports::class,'getAllCourses']);
Route::post('/Reports/DoctorReport',[\App\Http\Controllers\Report\Reports::class,'DoctorReport']);
Route::post('/Reports/DoctorReport2',[\App\Http\Controllers\Report\Reports::class,'DoctorReport2']);
Route::post('/Reports/DoctorReport3',[\App\Http\Controllers\Report\Reports::class,'DoctorReport3']);

//Route::post('/Reports/examRelation',[\App\Http\Controllers\Report\Reports::class,'examRelation']);



Route::get('/Dashboard/getStudentsCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getStudentsCount']);
Route::get('/Dashboard/getDoctorsCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getDoctorsCount']);
Route::get('/Dashboard/getTAsCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getTAsCount']);
Route::get('/Dashboard/getDepartmentsCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getDepartmentsCount']);
Route::get('/Dashboard/studentPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'studentPerformance']);
Route::get('/Dashboard/doctorPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'doctorPerformance']);
Route::get('/Dashboard/TAPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'TAPerformance']);
//Route::get('/Dashboard/studentPerformanceForCourse',[\App\Http\Controllers\Dashboards\DashboardController::class,'studentPerformanceForCourse']);
//Route::get('/Dashboard/TAPerformanceForCourse',[\App\Http\Controllers\Dashboards\DashboardController::class,'TAPerformanceForCourse']);
//Route::get('/Dashboard/attendancePercentageForCourse',[\App\Http\Controllers\Dashboards\DashboardController::class,'attendancePercentageForCourse']);
Route::post('/Dashboard/studentPerformanceForCourse',[\App\Http\Controllers\Dashboards\DashboardController::class,'studentPerformanceForCourse']);
Route::post('/Dashboard/TAPerformanceForCourse',[App\Http\Controllers\Dashboards\DashboardController::class,'TAPerformanceForCourse']); // lOGIN url
Route::post('/Dashboard/attendancePercentageForCourse',[\App\Http\Controllers\Dashboards\DashboardController::class,'attendancePercentageForCourse']);


Route::get('/Dashboard/getCSPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'getCSPerformance']);
Route::get('/Dashboard/getISPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'getISPerformance']);
Route::get('/Dashboard/getITPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'getITPerformance']);
Route::get('/Dashboard/getDSPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'getDSPerformance']);
Route::get('/Dashboard/getAIPerformance',[\App\Http\Controllers\Dashboards\DashboardController::class,'getAIPerformance']);

Route::get('/Dashboard/getCSCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getCSCount']);
Route::get('/Dashboard/getISCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getISCount']);
Route::get('/Dashboard/getITCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getITCount']);
Route::get('/Dashboard/getDSCount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getDSCount']);
Route::get('/Dashboard/getAICount',[\App\Http\Controllers\Dashboards\DashboardController::class,'getAICount']);

Route::get('/Dashboard/averageGPA',[\App\Http\Controllers\Dashboards\DashboardController::class,'averageGPA']);
Route::get('/Dashboard/relationBetSuccessYears',[\App\Http\Controllers\Dashboards\DashboardController::class,'relationBetSuccessYears']);
Route::post('/Dashboard/relationExamType',[\App\Http\Controllers\Dashboards\DashboardController::class,'relationExamType']);

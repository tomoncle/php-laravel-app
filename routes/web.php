<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function () {
    return "hello world!";
});

Route::get('/student/first', function () {
    // 使用 DB::table 这种方式查单条数据没有问题，查询集合就不行，建议使用  DB::select
    $stu = DB::table('student')->where(['name' => '张三'])->first();
    echo 'console print => id: ' . $stu->id . ' name: ' . $stu->name . ' birth: ' . $stu->birth;
    return $stu;
});

Route::get('/student/list', function () {
    $students = DB::select('select * from student where name like "%张%"');
    foreach ($students as $stu){
        echo '\\n name: '.$stu -> name;
    }
    return json_encode($students);
});
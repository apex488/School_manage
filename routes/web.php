<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\teacherController;
use App\Http\Middleware\validuser;
use App\Http\Middleware\validrole;



Route::get('/', function () {
    return view('welcome');
});
//register/login page route

route::get("/register",[authController::class,'reg'])->name('registerpage');
route::get("/login",[authController::class,'log'])->name('loginpage');

//registeruser/loginuser page route

route::post("/registeruser",[authController::class,'reguser'])->name('userregister');
route::post("/loginuser",[authController::class,'loguser'])->name('userlogin');

//website page

route::get("/web",[userController::class,'webpage'])->name('website')->Middleware(validuser::class);

//user mainsidebar page

route::get("/main",[userController::class,"sidebar"])->name('mainsidebar');

// admin page

route::get("/admin.page",[adminController::class,"adfunc"])->name('adminfunc')->Middleware(validrole::class);

// admin mainsidebar page

route::get("/mainad",[adminController::class,"addfunc"])->name('adminpage')->Middleware(validrole::class);

//user page

route::get("/userpg",[adminController::class,"page"])->name('userpage')->Middleware(validrole::class);

//user delete

route::get("/userdel/{id}",[adminController::class,"delete"])->name('userdel')->Middleware(validrole::class);

//insert course page

route::get("/insert",[adminController::class,'insert'])->name('insertpage')->Middleware(validrole::class);

//course insert form

route::post('data.insert',[adminController::class,"datainsert"])->name('insert.data')->Middleware(validrole::class);

//course page

route::get("/course",[adminController::class,"course"])->name('allcourse')->Middleware(validrole::class);

// course delete

route::get("/delete{id}",[adminController::class,"deletecourse"])->name('coursedel')->Middleware(validrole::class);


// edit course

route::get('/edit{id}',[adminController::class,"edit"])->name('editcourse')->Middleware(validrole::class);

//update course

route::post('/updatecourse/{id}',[adminController::class,'updatecourse'])->name('updatecourse')->Middleware(validrole::class);

//all teacher page

route::get('/allteacher',[teacherController::class,"allteacher"])->name('allteacher')->Middleware(validrole::class);

//insertteacher page

route::get('/insertteacher',[teacherController::class,"insertteacher"])->name('insertteacher')->Middleware(validrole::class);

//form send 

route::post('/senddata',[teacherController::class,"senddata"])->name('senddata')->Middleware(validrole::class);

//logout

route::get('/logout',[authController::class,"logout"])->name('logout');

//deleteteacher

route::get('/teacherdel/{id}',[teacherController::class,"teacherdel"])->name('teacherdel');

//editteacher

route::get('editteacher/{id}',[teacherController::class,"editteaher"])->name('editteacher');

//updateteacher

route::post('/updateteacher',[teacherController::class,"updateteacher"])->name('updateteacher');
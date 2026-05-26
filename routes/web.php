<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pdfController;
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
//teaher page

route::get("/teacher",[userController::class,'teacher'])->name('teacher')->Middleware(validuser::class);
//faq page

route::get("/faq",[userController::class,'faq'])->name('faq')->Middleware(validuser::class);

//about page show

route::get("about", [userController::class,'about'])->name('about')->Middleware(validuser::class);

//course page show
route::get('coursepage', [userController::class, 'coursepage'])->name('coursepage')->Middleware(validuser::class);

//event page show

route::get('eventpage', [userController::class,'eventpage'])->name('eventpage')->Middleware(validuser::class);

//contact page show

route::get('contactpage', [userController::class,'contactpage'])->name('contactpage')->Middleware(validuser::class);

//contact form

route::post('contactform', [userController::class, 'contactform'])->name('contactform')->Middleware(validuser::class);
//enroll page show

route::get('enrollpage/{id}', [userController::class, 'enrollpage'])->name('enrollpage')->Middleware(validuser::class);
//enroll form

route::post('enrollform/{id}', [userController::class, 'enrollform'])->name('enrollform')->Middleware(validuser::class);
//history page show

route::get('historypage', [userController::class, 'historypage'])->name('historypage')->Middleware(validuser::class);

//user mainsidebar page

route::get("/main",[userController::class,"sidebar"])->name('mainsidebar')->Middleware(validuser::class);
//newsletter form

route::post("/newsletter",[userController::class,"newsletter"])->name('newsletter')->Middleware(validuser::class);


// admin page

route::get("/admin.page",[adminController::class,"adfunc"])->name('adminfunc')->Middleware(validrole::class);

// admin mainsidebar page

route::get("/mainad",[adminController::class,"addfunc"])->name('adminpage')->Middleware(validrole::class);

//user page

route::get("/userpg",[adminController::class,"page"])->name('userpage')->Middleware(validrole::class);

//user delete

route::get("/userdel/{id}",[adminController::class,"delete"])->name('userdel')->Middleware(validrole::class);

//user edit

route::get("/useredit/{id}",[adminController::class,"useredit"])->name('useredit')->Middleware(validrole::class);

//user update

route::post("/userupdate/{id}",[adminController::class,"userupdate"])->name('userupdate')->Middleware(validrole::class);

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

route::get('/teacherdel/{id}',[teacherController::class,"teacherdel"])->name('teacherdel')->Middleware(validrole::class);

//editteacher

route::get('editteacher/{id}',[teacherController::class,"editteaher"])->name('editteacher')->Middleware(validrole::class);

//updateteacher

route::post('/updateteacher/{id}',[teacherController::class,"updateteacher"])->name('updateteacher')->Middleware(validrole::class);


// events=>page
route::get('/event', [teacherController::class , "event"])->name('event')->Middleware(validrole::class);
// insert=>events=>page
route::get('/insertevent', [teacherController::class , "insertevent"])->name('insertevent')->Middleware(validrole::class);
// send=>events=>page
route::post('/sendevent', [teacherController::class , "sendevent"])->name('sendevent')->Middleware(validrole::class);
// delete=>events=>page
route::get('/deleteevent/{id}', [teacherController::class , "deleteevent"])->name('deleteevent')->Middleware(validrole::class);
// edit=>events=>page
route::get('/editevent/{id}', [teacherController::class , "editevent"])->name('editevent')->Middleware(validrole::class);
// update=>events=>page
route::post('/updateevent/{id}', [teacherController::class , "updateevent"])->name('updateevent')->Middleware(validrole::class);

//contact page show

route::get('admincontact', [adminController::class, 'admincontact'])->name('admincontact')->Middleware(validrole::class);

// contact delete

route::get('contactdelete/{id}', [adminController::class,'contactdelete'])->name('contactdelete')->Middleware(validrole::class);
// contact edit

route::get('contactedit/{id}', [adminController::class,'contactedit'])->name('contactedit')->Middleware(validrole::class);
// contact update

route::post('contactupdate/{id}', [adminController::class,'contactupdate'])->name('contactupdate')->Middleware(validrole::class);
// newsletter

route::get('newsletter', [adminController::class,'newsletter'])->name('newsletter')->Middleware(validrole::class);
// newsletterform

route::post('newsletterform', [adminController::class,'newsletterform'])->name('newsletterform')->Middleware(validrole::class);
// adminlogout

route::get('adminlogout', [adminController::class,'adminlogout'])->name('adminlogout')->Middleware(validrole::class);
// PDF

route::get('pdf/{id}', [pdfController::class,'pdf'])->name('pdf');

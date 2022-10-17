<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Person;
use App\Teacher;


//..................  Service Container Way-1 .................... 
app()->bind('info1', Person::class); //Person Service Create and bind Person class in service 
//container using info1 key 

Route::get('/serviceContainerPerson1', function(){
  // $personInfo1 = app()->make('info1');   // Object create for service Person using binding key info1
  // $personInfo1->setName('Kamal Hosen');  // Set value that Person service using object
  // echo $personInfo1->getName();          // Get Value that Person service
  });

//..................  Service Container Way-2 .................... 
 // At 1st Go to --> php-web-framework\app\Providers\AppServiceProvider.php
 
Route::get('/serviceContainerPerson2', function(){
   $personInfo2 = app()->make('info2');
   echo $personInfo2;
});


//..................  Service Privider Way-1 .................... 
Route::get('/serviceProviderHuman', function(){
   dd(app());
   $humanInfo = app()->make('info3');
   $humanInfo->setName('Moly Akter');
   echo $humanInfo->getName();
});

//....................  Facade Create.................................. 
   // Follow by https://w3programmers.com/bangla/laravel-facades/
Route::get('/facadeTest', function(){
   
   echo Math::sum(7, 3); // Math facade create
   echo "<br>";

   echo Math::sub(7, 3); 
   echo "<br>";

   echo Math::mul(7, 3); 
   echo "<br>";

   echo Math::div(7, 3); 
  
});



Route::get('/', function(){

   return View::make('home'); 


  // $name = app()->make('getName');
 //  $name->setName('Mahmud Hosen');
  // echo $name->getName();
   // app()->make('myService');
   //  dd(app());
 
   //  $info = 'I am Mahmud Hosen';

    // Many of data pass to view page 
       // return View::make('demo',compact('info'));       // View facade
      //  return View::make('demo',['info' =>  $info]);
      //  return View::make('demo')->with('info', $info);
      //  return view('demo',compact('info'));      // view is alies of View facade
   
        // JSON Response
        // return response()->json([
        //     'name'=>'mahmud',
        //     'email'=>'mahmud@gmail.com',

        // ], 200);


});

$router->get('/object/{id?}', function($value = null){
    return "I am object of Route $value ";

});

 //......................    Redirect  ...............
 // 
 Route::get('login', function()
 {
    return view('login');

 });
 Route::get('profile', function()
 {
    $login = false;

    if($login == false){

        return Redirect::to('login'); //  Redirect::  <-----redirect facade
        return redirect('login');     //  redirect  <-----redirect helper method
        return redirect()->action('StudentController@show');  // redirect to controller
         return redirect()->away('http://google.com');  // redirect to any website

    }
    return View::make('profile');

 });

  //......................    Request  ...............
 // 
 Route::get('userRequest', function()
 {
   return view('userRequest');
 });
 Route::post('userInfo', function(Request $request)
 {
   // $name = Input::get('name');
   // $request = new Request;
   dd($request);

 });


 //.........................  Middleware .........................
 Route::get('ageMiddlewareFrom', function()
 {
   return view('ageMiddlewareFrom');
 });


   use App\Http\Middleware\AgeMiddleware;
     // ...........  Way-1 ..................
   Route::post('ageMiddlewareCheck', function (Request $request) {
      // dd($request);
      return "Login";
   })->middleware(AgeMiddleware::class);

     // ...........  Way-2 ..................
   // Route::post('ageMiddlewareCheck', function (Request $request) {
   //    return "Login";
    
   // })->middleware('age');


   Route::resource('photos', 'PhotoController');
 
   //.............................  Blade Template ...................
   Route::get('template', function()
   {
      $name = "Mahmud";
      return view('template',['name' => $name]);

   });

   //.............................  Request Data  ...................
   Route::get('requestData', function()
   {
      return view('requestData');

   });

   Route::post('requestSubmitData', function (Request $request) {
      Cookie::queue('name1', 'Moly', 1);
      return  $value = Cookie::get('name1');

    return redirect('requestData')->withInput();
      return Input::all();
      return $request->all();
      return "requestSubmitData";
    
   });


   //........................ Query Bilder ..........................
   Route::get('queryBilder', function(){
    return  DB::table('users')->remember(10)->get();
   });


   Route::resource('students', 'StudentController');
   // Route::get('/students','StudentController@index')->name('students.index');
   // Route::get('/students/create','StudentController@create')->name('students.create');
   // Route::get('/students','StudentController@index')->name('students.index');
   // Route::get('/students','StudentController@index')->name('students.index');


 //............................ Token Generate ...............
  
 Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    return $token = csrf_token();
 });

 //............................ Laravel Request ...............

 Route::get('/request', function (Request $request) {
    dd($request->server());
    dd($request->getAcceptableContentTypes());
   });
   
 //............................ Excel File Import/export ...............
 
 Route::get('/excelFile', function () {
   return view('Excel.file');  
 });
 Route::post('/excelImport','UserController@import')->name('import');
 Route::get('/excelExport','UserController@export')->name('export');

 //............................ Auth .......................
 Route::get('/authCheck', function (Request $request) {
    dd("Hi");
   
   });


 // ........................... PDF Generate .....................
 Route::get('generate-pdf','PDFController@generatePDF');




 
   



  
 











Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//.............................   SSLCOMMERZ Start ..............................

Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END





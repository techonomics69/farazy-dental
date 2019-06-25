<?php

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

Route::get('/', [
    'uses'  => 'WelcomeController@index',
    'as'    => 'welcome'
]);

Auth::routes();

Route::get('/home', function (){
    return view('welcome');
})->name('home');

Route::get('about',[
    'uses'  => 'AboutController@index',
    'as'    => 'about'
]);

Route::get('board-of-director',[
    'uses'  => 'BoardOfDirectorController@index',
    'as'    => 'board-of-director'
]);

Route::get('our-services',[
    'uses'  => 'ServicesController@index',
    'as'    => 'our-services'
]);

Route::get('service/details/{id}',[
    'uses'  => 'ServicesController@details',
    'as'    => 'service-details'
]);

Route::get('specialist',[
    'uses'  => 'SpecialistController@index',
    'as'    => 'specialist'
]);

Route::get('dental-tips',[
    'uses'  => 'DentalTipsController@index',
    'as'    => 'dental-tips'
]);

Route::get('news-events',[
    'uses'  => 'NewsController@index',
    'as'    => 'news-events'
]);

Route::get('tips/details/{id}',[
    'uses'  => 'DentalTipsController@details',
    'as'    => 'tips-details'
]);

Route::get('event/details/{id}',[
    'uses'  => 'NewsController@details',
    'as'    => 'event-details'
]);


Route::get('contact',[
    'uses'  => 'ContactController@index',
    'as'    => 'contact'
]);

Route::get('appointment',[
    'uses'  => 'SpecialistController@index',
    'as'    => 'appointment'
]);

Route::get('get-appointment/{id}',[
    'uses'  => 'AppointmentController@index',
    'as'    => 'get-appointment'
]);

Route::get('all-appointment/{id}/{date}',[
    'uses'  => 'AppointmentController@getAllAppointments',
    'as'    => 'all-appointment'
]);

Route::get('all-appointment-list/{id}/{date}',[
    'uses'  => 'AppointmentController@getAllAppointmentList',
    'as'    => 'all-appointment-list'
]);

Route::get('download/appointments/{id}/{date}',[
    'uses'  => 'AppointmentController@downloadAppointmentList',
    'as'    => 'download-appointment-list'
]);
Route::get('download/all-appointments',[
    'uses'  => 'AppointmentController@downloadAllAppointments',
    'as'    => 'download-all-appointments'
]);


Route::post('post-appointment/{id}',[
    'uses'  => 'AppointmentController@store',
    'as'    => 'post-appointment'
]);

Route::get('show-prescription',function(){
    return view('frontend.patient-prescription')->with([
        'prescription'  => null
    ]);
})->name('patient-prescription');

Route::post('search-prescription',function(\Illuminate\Http\Request $request){
    $prescription = \App\Model\Prescription::where('prescription_id','=',$request->input('prescription_id'))->first();
    return view('frontend.patient-prescription')->with([
        'prescription'  => $prescription
    ]);
})->name('search-prescription');

Route::get('download-prescription/{id}',[
    'uses'  => 'Backend\PrescriptionController@download',
    'as'    => 'download-prescription'
]);

Route::get('director-details/{id}',function($id){
    $director = \App\Model\BoardOfDirector::findOrFail($id);
    return view('frontend.director-details')->with([
        'director'  => $director
    ]);
})->name('show-director-detail');

/**
 * Backend
 */



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function (){

    Route::get('dashboard',[
        'uses'  => 'Backend\DashboardController@index',
        'as'    => 'dashboard'
    ]);

    Route::get('appointments',[
        'uses'  => 'Backend\AppointmentController@index',
        'as'    => 'appointments'
    ]);

    Route::get('logout',function(){
        Auth::logout();
        return redirect()->route('login');
    });
});

Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('users',[
        'uses'  => 'Backend\UserController@index',
        'as'    => 'users'
    ]);

    Route::post('create-user',[
        'uses'  => 'Backend\UserController@store',
        'as'    => 'create-user'
    ]);

    Route::get('update-user/{id}',[
        'uses'  => 'Backend\UserController@edit',
        'as'    => 'edit-user'
    ]);

    Route::post('update-user/{id}',[
        'uses'  => 'Backend\UserController@update',
        'as'    => 'update-user'
    ]);

    Route::get('delete-user/{id}',[
        'uses'  => 'Backend\UserController@delete',
        'as'    => 'delete-user'
    ]);

    /**
     * Basic Settings
     */

    Route::get('basic-settings',[
        'uses'  => 'Backend\BasicSettingsController@index',
        'as'    => 'basic-settings'
    ]);

    Route::post('basic-settings',[
        'uses'  => 'Backend\BasicSettingsController@update',
        'as'    => 'update-basic-settings'
    ]);


    /**all-appointment-list
     * Departments
     */

    Route::get('departments',[
        'uses'  => 'Backend\DepartmentController@index',
        'as'    => 'departments'
    ]);

    Route::post('create-department',[
        'uses'  => 'Backend\DepartmentController@store',
        'as'    => 'create-department'
    ]);

    Route::get('update-department/{id}',[
        'uses'  => 'Backend\DepartmentController@edit',
        'as'    => 'edit-department'
    ]);

    Route::post('update-department/{id}',[
        'uses'  => 'Backend\DepartmentController@update',
        'as'    => 'update-department'
    ]);

    Route::get('delete-department/{id}',[
        'uses'  => 'Backend\DepartmentController@delete',
        'as'    => 'delete-department'
    ]);


    /**
     * Category
     */

    Route::get('categories',[
        'uses'  => 'Backend\CategoryController@index',
        'as'    => 'categories'
    ]);

    Route::post('create-category',[
        'uses'  => 'Backend\CategoryController@store',
        'as'    => 'create-category'
    ]);

    Route::get('update-category/{id}',[
        'uses'  => 'Backend\CategoryController@edit',
        'as'    => 'edit-category'
    ]);

    Route::post('update-category/{id}',[
        'uses'  => 'Backend\CategoryController@update',
        'as'    => 'update-category'
    ]);

    Route::get('delete-category/{id}',[
        'uses'  => 'Backend\CategoryController@delete',
        'as'    => 'delete-category'
    ]);

    /**
     * About Section
     */

    Route::get('section-about',[
        'uses'  => 'Backend\SectionAboutController@index',
        'as'    => 'section-about'
    ]);

    Route::post('create-section-about',[
        'uses'  => 'Backend\SectionAboutController@store',
        'as'    => 'create-section-about'
    ]);

    /**
     * Services
     */

    Route::get('services',[
        'uses'  => 'Backend\ServicesController@index',
        'as'    => 'services'
    ]);

    Route::post('create-service',[
        'uses'  => 'Backend\ServicesController@store',
        'as'    => 'create-service'
    ]);

    Route::get('update-service/{id}',[
        'uses'  => 'Backend\ServicesController@edit',
        'as'    => 'edit-service'
    ]);

    Route::post('update-service/{id}',[
        'uses'  => 'Backend\ServicesController@update',
        'as'    => 'update-service'
    ]);

    Route::get('delete-service/{id}',[
        'uses'  => 'Backend\ServicesController@delete',
        'as'    => 'delete-service'
    ]);

    /**
     * Slider
     */

    Route::get('sliders',[
        'uses'  => 'Backend\SliderController@index',
        'as'    => 'sliders'
    ]);

    Route::post('create-slider',[
        'uses'  => 'Backend\SliderController@store',
        'as'    => 'create-slider'
    ]);

    Route::get('update-slider/{id}',[
        'uses'  => 'Backend\SliderController@edit',
        'as'    => 'edit-slider'
    ]);

    Route::post('update-slider/{id}',[
        'uses'  => 'Backend\SliderController@update',
        'as'    => 'update-slider'
    ]);

    Route::get('delete-slider/{id}',[
        'uses'  => 'Backend\SliderController@delete',
        'as'    => 'delete-slider'
    ]);

    /**
     * Partner
     */

    Route::get('partners',[
        'uses'  => 'Backend\CorporatePartnerController@index',
        'as'    => 'partners'
    ]);

    Route::post('create-partner',[
        'uses'  => 'Backend\CorporatePartnerController@store',
        'as'    => 'create-partner'
    ]);

    Route::get('update-partner/{id}',[
        'uses'  => 'Backend\CorporatePartnerController@edit',
        'as'    => 'edit-partner'
    ]);

    Route::post('update-partner/{id}',[
        'uses'  => 'Backend\CorporatePartnerController@update',
        'as'    => 'update-partner'
    ]);

    Route::get('delete-partner/{id}',[
        'uses'  => 'Backend\CorporatePartnerController@delete',
        'as'    => 'delete-partner'
    ]);

    /**
     * Designations
     */

    Route::get('designations',[
        'uses'  => 'Backend\DesignationController@index',
        'as'    => 'designations'
    ]);

    Route::post('create-designation',[
        'uses'  => 'Backend\DesignationController@store',
        'as'    => 'create-designation'
    ]);

    Route::get('update-designation/{id}',[
        'uses'  => 'Backend\DesignationController@edit',
        'as'    => 'edit-designation'
    ]);

    Route::post('update-designation/{id}',[
        'uses'  => 'Backend\DesignationController@update',
        'as'    => 'update-designation'
    ]);

    Route::get('delete-designation/{id}',[
        'uses'  => 'Backend\DesignationController@delete',
        'as'    => 'delete-designation'
    ]);

    /**
     * Doctors
     */

    Route::get('doctors',[
        'uses'  => 'Backend\DoctorsController@index',
        'as'    => 'doctors'
    ]);

    Route::get('create-doctor',[
        'uses'  => 'Backend\DoctorsController@create',
        'as'    => 'create-doctor'
    ]);

    Route::post('create-doctor',[
        'uses'  => 'Backend\DoctorsController@store',
        'as'    => 'store-doctor'
    ]);

    Route::get('edit-doctor/{id}',[
        'uses'  => 'Backend\DoctorsController@edit',
        'as'    => 'edit-doctor'
    ]);

    Route::post('update-doctor/{id}',[
        'uses'  => 'Backend\DoctorsController@update',
        'as'    => 'update-doctor'
    ]);

    Route::get('show-doctor/{id}',[
        'uses'  => 'Backend\DoctorsController@show',
        'as'    => 'show-doctor'
    ]);

    Route::post('update-doctor/{id}',[
        'uses'  => 'Backend\DoctorsController@update',
        'as'    => 'update-doctor'
    ]);

    Route::get('delete-doctor/{id}',[
        'uses'  => 'Backend\DoctorsController@delete',
        'as'    => 'delete-doctor'
    ]);

    Route::post('create-doctor-account/{id}',[
        'uses'  => 'Backend\DoctorsController@createAccount',
        'as'    => 'create-doctor-account'
    ]);

    Route::get('get-create-prescription',[
        'uses'  => 'Backend\PrescriptionController@create',
        'as'    => 'get-create-prescription'
    ]);

    Route::post('get-create-prescription',[
        'uses'  => 'Backend\PrescriptionController@store',
        'as'    => 'post-create-prescription'
    ]);

    Route::get('get-edit-prescription/{id}',[
        'uses'  => 'Backend\PrescriptionController@edit',
        'as'    => 'get-edit-prescription'
    ]);

    Route::post('get-update-prescription/{id}',[
        'uses'  => 'Backend\PrescriptionController@update',
        'as'    => 'post-update-prescription'
    ]);
    Route::get('get-delete-prescription/{id}',[
        'uses'  => 'Backend\PrescriptionController@delete',
        'as'    => 'get-delete-prescription'
    ]);

    Route::get('doctor-prescription-detail/{id}',[
        'uses'  => 'Backend\PrescriptionController@show',
        'as'    => 'doctor-prescription-detail'
    ]);

    Route::get('prescriptions',[
        'uses'  => 'Backend\PrescriptionController@index',
        'as'    => 'prescriptions'
    ]);

    /**
     * Directors
     */

    Route::get('directors',[
        'uses'  => 'Backend\BoardOfDirectorController@index',
        'as'    => 'directors'
    ]);

    Route::post('create-director',[
        'uses'  => 'Backend\BoardOfDirectorController@store',
        'as'    => 'create-director'
    ]);

    Route::get('update-director/{id}',[
        'uses'  => 'Backend\BoardOfDirectorController@edit',
        'as'    => 'edit-director'
    ]);

    Route::post('update-director/{id}',[
        'uses'  => 'Backend\BoardOfDirectorController@update',
        'as'    => 'update-director'
    ]);

    Route::get('delete-director/{id}',[
        'uses'  => 'Backend\BoardOfDirectorController@delete',
        'as'    => 'delete-director'
    ]);



    Route::post('update-directors/{id}',[
        'uses'  => 'Backend\DoctorsController@update',
        'as'    => 'update-directors'
    ]);

    Route::get('delete-directors/{id}',[
        'uses'  => 'Backend\DoctorsController@delete',
        'as'    => 'delete-directors'
    ]);

    /**
     * Doctors Opening
     */

    Route::post('create-opening',[
        'uses'  => 'Backend\OpeningController@store',
        'as'    => 'create-opening'
    ]);
    Route::get('edit-opening/{id}',[
        'uses'  => 'Backend\OpeningController@edit',
        'as'    => 'edit-opening'
    ]);
    Route::post('edit-opening/{id}',[
        'uses'  => 'Backend\OpeningController@update',
        'as'    => 'update-opening'
    ]);

    Route::get('delete-opening/{id}',[
        'uses'  => 'Backend\OpeningController@delete',
        'as'    => 'delete-opening'
    ]);


    /*
     * Dental Tips
     */

    Route::get('posts',[
        'uses'  => 'Backend\DentalTipsController@index',
        'as'    => 'posts'
    ]);

    Route::post('create-post',[
        'uses'  => 'Backend\DentalTipsController@store',
        'as'    => 'create-post'
    ]);

    Route::get('edit-dental-tip/{id}',[
        'uses'  => 'Backend\DentalTipsController@edit',
        'as'    => 'edit-dental-tip'
    ]);

    Route::post('edit-dental-tip/{id}',[
        'uses'  => 'Backend\DentalTipsController@update',
        'as'    => 'update-dental-tip'
    ]);

    Route::get('delete-dental-tip/{id}',[
        'uses'  => 'Backend\DentalTipsController@delete',
        'as'    => 'delete-dental-tip'
    ]);

    /**
     * News Nad Event
     */

    Route::get('events',[
        'uses'  => 'Backend\NewsAndEventController@index',
        'as'    => 'events'
    ]);

    Route::post('create-event',[
        'uses'  => 'Backend\NewsAndEventController@store',
        'as'    => 'create-event'
    ]);

    Route::get('edit-event/{id}',[
        'uses'  => 'Backend\NewsAndEventController@edit',
        'as'    => 'edit-event'
    ]);

    Route::post('edit-event/{id}',[
        'uses'  => 'Backend\NewsAndEventController@update',
        'as'    => 'update-event'
    ]);

    Route::get('delete-event/{id}',[
        'uses'  => 'Backend\NewsAndEventController@delete',
        'as'    => 'delete-event'
    ]);

    /**
     * Medicine Routes
     */

    Route::get('item-types',[
        'uses'  => 'Backend\Item\ItemTypeController@index',
        'as'    => 'item-types'
    ]);

    Route::post('item-type',[
        'uses'  => 'Backend\Item\ItemTypeController@store',
        'as'    => 'create-item-type'
    ]);

    Route::get('item-type/{id}',[
        'uses'  => 'Backend\Item\ItemTypeController@getItemType',
        'as'    => 'item-type'
    ]);

    Route::post('item-type/{id}',[
        'uses'  => 'Backend\Item\ItemTypeController@update',
        'as'    => 'item-type'
    ]);

    Route::get('delete-item-type/{id}',[
        'uses'  => 'Backend\Item\ItemTypeController@delete',
        'as'    => 'delete-item-type'
    ]);

    /**
     * Generic Name
     */

    Route::get('generic-names',[
        'uses'  => 'Backend\Item\GenericNameController@index',
        'as'    => 'generic-names'
    ]);

    Route::post('generic-name',[
        'uses'  => 'Backend\Item\GenericNameController@store',
        'as'    => 'create-generic-name'
    ]);

    Route::get('generic-name/{id}',[
        'uses'  => 'Backend\Item\GenericNameController@getGenericName',
        'as'    => 'generic-name'
    ]);

    Route::post('generic-name/{id}',[
        'uses'  => 'Backend\Item\GenericNameController@update',
        'as'    => 'generic-name'
    ]);

    Route::get('delete-generic-name/{id}',[
        'uses'  => 'Backend\Item\GenericNameController@delete',
        'as'    => 'delete-generic-name'
    ]);



    Route::get('manufacturers',[
        'uses'  => 'Backend\Manufacturer\ManufacturerController@index',
        'as'    => 'manufacturers'
    ]);

    Route::post('manufacturer',[
        'uses'  => 'Backend\Manufacturer\ManufacturerController@store',
        'as'    => 'create-manufacturer'
    ]);

    Route::get('manufacturer/{id}',[
        'uses'  => 'Backend\Manufacturer\ManufacturerController@getManufacturer',
        'as'    => 'manufacturer'
    ]);

    Route::post('manufacturer/{id}',[
        'uses'  => 'Backend\Manufacturer\ManufacturerController@update',
        'as'    => 'manufacturer'
    ]);

    Route::get('delete-manufacturer/{id}',[
        'uses'  => 'Backend\Manufacturer\ManufacturerController@delete',
        'as'    => 'delete-manufacturer'
    ]);


    /**
     * ItemGroup
     */

    Route::get('groups',[
        'uses'  => 'Backend\Item\GroupController@index',
        'as'    => 'groups'
    ]);

    Route::get('get-groups',[
        'uses'  => 'Backend\Item\GroupController@getGroups',
        'as'    => 'get-groups'
    ]);

    Route::post('group',[
        'uses'  => 'Backend\Item\GroupController@store',
        'as'    => 'create-group'
    ]);

    Route::get('group/{id}',[
        'uses'  => 'Backend\Item\GroupController@getGroup',
        'as'    => 'group'
    ]);

    Route::post('group/{id}',[
        'uses'  => 'Backend\Item\GroupController@update',
        'as'    => 'group'
    ]);

    Route::get('delete-group/{id}',[
        'uses'  => 'Backend\Item\GroupController@delete',
        'as'    => 'delete-group'
    ]);

    /**
     * ItemUnit
     */

    Route::get('parties',[
        'uses'  => 'Backend\Party\PartyController@index',
        'as'    => 'parties'
    ]);

    Route::post('party',[
        'uses'  => 'Backend\Party\PartyController@store',
        'as'    => 'create-party'
    ]);

    Route::get('party/{id}',[
        'uses'  => 'Backend\Party\PartyController@getParty',
        'as'    => 'party'
    ]);

    Route::post('party/{id}',[
        'uses'  => 'Backend\Party\PartyController@update',
        'as'    => 'party'
    ]);

    Route::get('delete-party/{id}',[
        'uses'  => 'Backend\Party\PartyController@delete',
        'as'    => 'delete-party'
    ]);


    /**
     * THERAPETRIC CLASS
     */
    Route::get('/th-classes',[
        'uses'  => 'Backend\Item\ItemThController@index',
        'as'    => 'th-classes'
    ]);

    Route::post('th-class',[
        'uses'  => 'Backend\Item\ItemThController@store',
        'as'    => 'create-th-class'
    ]);

    Route::get('th-class/{id}',[
        'uses'  => 'Backend\Item\ItemThController@getThCLass',
        'as'    => 'th-class'
    ]);

    Route::post('th-class/{id}',[
        'uses'  => 'Backend\Item\ItemThController@update',
        'as'    => 'th-class'
    ]);

    Route::get('delete-th-class/{id}',[
        'uses'  => 'Backend\Item\ItemThController@delete',
        'as'    => 'delete-th-class'
    ]);

    /**
     * Tests
     */

    Route::get('/tests',[
        'uses'  => 'Backend\TestController@index',
        'as'    => 'tests'
    ]);

    Route::post('test',[
        'uses'  => 'Backend\TestController@store',
        'as'    => 'test'
    ]);

    Route::get('test/{id}',[
        'uses'  => 'Backend\TestController@getTest',
        'as'    => 'get-test'
    ]);

    Route::post('test/{id}',[
        'uses'  => 'Backend\TestController@update',
        'as'    => 'store-test'
    ]);

    Route::get('delete-test/{id}',[
        'uses'  => 'Backend\TestController@delete',
        'as'    => 'delete-test'
    ]);

    /**
     * Advices
     */
    Route::get('/advices',[
        'uses'  => 'Backend\AdviceController@index',
        'as'    => 'advices'
    ]);

    Route::post('advice',[
        'uses'  => 'Backend\AdviceController@store',
        'as'    => 'advice'
    ]);

    Route::get('advice/{id?}',[
        'uses'  => 'Backend\AdviceController@getAdvice',
        'as'    => 'get-advice'
    ]);

    Route::post('advice/{id}',[
        'uses'  => 'Backend\AdviceController@update',
        'as'    => 'store-advice'
    ]);

    Route::get('delete-advice/{id}',[
        'uses'  => 'Backend\AdviceController@delete',
        'as'    => 'delete-advice'
    ]);

    /**
     * Symtom
     */
    Route::get('/symptoms',[
        'uses'  => 'Backend\SymptomController@index',
        'as'    => 'symptoms'
    ]);

    Route::post('symptom',[
        'uses'  => 'Backend\SymptomController@store',
        'as'    => 'symptom'
    ]);

    Route::get('symptom/{id?}',[
        'uses'  => 'Backend\SymptomController@getSymptom',
        'as'    => 'get-symptom'
    ]);

    Route::post('symptom/{id}',[
        'uses'  => 'Backend\SymptomController@update',
        'as'    => 'store-advice'
    ]);

    Route::get('delete-symptom/{id}',[
        'uses'  => 'Backend\SymptomController@delete',
        'as'    => 'delete-symptom'
    ]);


    /**
     * Items
     */

    Route::get('items',[
        'uses'  => 'Backend\Item\ItemController@index',
        'as'    => 'items'
    ]);

    Route::get('get-items/{id?}',[
        'uses'  => 'Backend\Item\ItemController@getItems',
        'as'    => 'get-items'
    ]);

    Route::post('item',[
        'uses'  => 'Backend\Item\ItemController@store',
        'as'    => 'create-item'
    ]);

    Route::get('item/{id}',[
        'uses'  => 'Backend\Item\ItemController@getItem',
        'as'    => 'item'
    ]);

    Route::post('item/{id}',[
        'uses'  => 'Backend\Item\ItemController@update',
        'as'    => 'item'
    ]);

    Route::get('delete-item/{id}',[
        'uses'  => 'Backend\Item\ItemController@delete',
        'as'    => 'delete-item'
    ]);


    /**
     * Doctor Appointments
     */

    // Route::get('appointments',[
    //     'uses'  => 'Backend\AppointmentController@index',
    //     'as'    => 'appointments'
    // ]);

    Route::get('appointments/{id}',[
        'uses'  => 'Backend\AppointmentController@doctorAppointments',
        'as'    => 'doctor-appointments'
    ]);

    Route::post('send-message',[
        'uses'  => 'ContactController@create',
        'as'    => 'send-message'
    ]);

    Route::get('all-message',[
        'uses'  => 'ContactController@getContacts',
        'as'    => 'all-message'
    ]);

    Route::get('search-prescription',function(){
        return view('frontend.patient-prescription')->with([
            'prescription'  => null
        ]);
    });



});



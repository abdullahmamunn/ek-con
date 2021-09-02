<?php
Route::get('sub-menu/demo', 'Frontend\FrontController@demo');

Route::get('/locale/{lang}', function($lang) {
	Session::put('locale', $lang);
	return redirect()->back();
})->name('locale');

Route::get('/cache_clear', function(){
	try {
		Artisan::call('config:cache');
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
	} catch(\Exception $e) {
		dd($e);
	}
});


//Reset Password
Route::get('reset/password','Backend\PasswordResetController@resetPassword')->name('reset.password');
Route::post('check/email','Backend\PasswordResetController@checkEmail')->name('check.email');
Route::get('check/name','Backend\PasswordResetController@checkName')->name('check.name');
Route::get('check/code','Backend\PasswordResetController@checkCode')->name('check.code');
Route::post('submit/check/code','Backend\PasswordResetController@submitCode')->name('submit.check.code');
Route::get('new/password','Backend\PasswordResetController@newPassword')->name('new.password');
Route::post('store/new/password','Backend\PasswordResetController@newPasswordStore')->name('store.new.password');



Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'Backend\HomeController@index')->name('dashboard');

	Route::group(['middleware'=>['permission']],function(){

		Route::prefix('menu')->group(function(){
			Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
			Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
			Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
			Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
			Route::post('/update/{id}','Backend\Menu\MenuController@update')->name('menu.update');
			Route::get('/subparent','Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

			Route::get('/icon','Backend\Menu\MenuIconController@index')->name('menu.icon');
			Route::post('icon/store','Backend\Menu\MenuIconController@store')->name('menu.icon.store');
			Route::get('icon/edit','Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
			Route::post('icon/update/{id}','Backend\Menu\MenuIconController@update')->name('menu.icon.update');
			Route::post('icon/delete','Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
		});

		Route::post('/data/statuschange', 'Backend\DefaultController@statusChange')->name('table.status.change');
		Route::post('/data/delete', 'Backend\DefaultController@delete')->name('table.data.delete');
		Route::get('/sub/menu', 'Backend\DefaultController@SubMenu')->name('table.data.submenu');

		Route::prefix('user')->group(function(){
			Route::get('/','UserController@index')->name('user');
			Route::get('/add','UserController@userAdd')->name('user.add');
			Route::post('/store','UserController@userStore')->name('user.store');
			Route::get('/edit/{id}','UserController@userEdit')->name('user.edit');
			Route::post('/update/{id}','UserController@updateUser')->name('user.update');
			Route::get('/delete/{id}','UserController@deleteUser')->name('user.delete');

			Route::get('/role','Backend\Menu\RoleController@index')->name('user.role');
			Route::post('/role/store','Backend\Menu\RoleController@storeRole')->name('user.role.store');
			Route::get('/role/edit','Backend\Menu\RoleController@getRole')->name('user.role.edit');
			Route::post('/role/update/{id}','Backend\Menu\RoleController@updateRole')->name('user.role.update');
			Route::post('/role/delete','Backend\Menu\RoleController@deleteRole')->name('user.role.delete');

			Route::get('/permission','Backend\Menu\MenuPermissionController@index')->name('user.permission');
			Route::get('/permission/store','Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');
		});

		Route::prefix('profile-management')->group(function(){

			//Change Password
			Route::get('change/password','Backend\PasswordChangeController@changePassword')->name('profile-management.change.password');
			Route::post('store/password','Backend\PasswordChangeController@storePassword')->name('profile-management.store.password');
		});

		Route::prefix('site-setting')->group(function(){

			//test page
			Route::get('test/page','Backend\PasswordChangeController@changePassword')->name('site-setting.test.page');

		});




		Route::prefix('frontend-menu')->group(function(){
			//Post
			Route::get('/post/view', 'Backend\Post\PostController@view')->name('frontend-menu.post.view');
	        Route::get('/post/add','Backend\Post\PostController@add')->name('frontend-menu.post.add');
	        Route::get('/sub/post/add','Backend\Post\PostController@addSubPost')->name('frontend-menu.sub.post.add');
			Route::post('/post/store','Backend\Post\PostController@store')->name('frontend-menu.post.store');
			Route::get('/post/edit/{id}','Backend\Post\PostController@edit')->name('frontend-menu.post.edit');
			Route::post('/post/update/{id}','Backend\Post\PostController@update')->name('frontend-menu.post.update');
	        Route::get('/post/delete', 'Backend\Post\PostController@destroy')->name('frontend-menu.post.destroy');
	        //Frontend Menu
	        Route::get('/menu/view', 'Backend\Post\FrontendMenuController@view')->name('frontend-menu.menu.view');
	        Route::get('/menu/add','Backend\Post\FrontendMenuController@add')->name('frontend-menu.menu.add');
			Route::post('/menu/single/store','Backend\Post\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
			Route::post('/menu/store','Backend\Post\FrontendMenuController@store')->name('frontend-menu.menu.store');
			Route::get('/menu/edit/{id}','Backend\Post\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
			Route::post('/menu/update/{id}','Backend\Post\FrontendMenuController@update')->name('frontend-menu.menu.update');
			Route::post('/menu/submenu/update/{id}','Backend\Post\FrontendMenuController@updateSubmenu')->name('frontend-menu.submenu.update');
	        Route::get('/submenu/delete/{id}', 'Backend\Post\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');
	        Route::get('menu/delete/{id}', 'Backend\Post\FrontendMenuController@destroyMenu');

			//contact
			Route::get('/contact/view', 'Backend\Post\FrontendMenuController@viewContact')->name('frontend-menu.contact.view');
			Route::get('/view-cv', 'Backend\Post\FrontendMenuController@viewCv')->name('frontend-menu.cv.view');
		});

	});
});

// Frontend
// Route::get('/{menu_name}', function(){
//      return "mamun";
// });
// Route::get('/', function () {
// 	$data = DB::table('menu_posts')->where('key','welcome')->first();
//     return view('frontend.single_pages.home',compact('data'));
// });

Route::get('/','Frontend\FrontController@defaultHome');
Route::get('/{url}','Frontend\FrontController@home')->name('home');

// Route::get('/{url}','Frontend\FrontController@items')->name('menu.item');
// Route::get('/{menu}/{submenu}','Frontend\FrontController@sumMenuitems')->name('menu.submenu.item');
// Route::get('/homepage','Frontend\FrontController@home');
// Route::get('/approach','Frontend\FrontController@ourApproach')->name('approach');
// Route::get('/vision','Frontend\FrontController@ourVision')->name('vision');
// Route::get('/services','Frontend\FrontController@ourServices')->name('services');
// Route::get('/clients','Frontend\FrontController@ourClients')->name('clients');
// Route::get('/our-team','Frontend\FrontController@ourTeam')->name('team');
// Route::get('/management-profile','Frontend\FrontController@managementProfile')->name('management-profile');
// Route::get('/contact-us','Frontend\FrontController@ourContact')->name('contact-us');
// Route::get('/upload-cv','Frontend\FrontController@uploadCv')->name('upload-cv');
Route::post('/contact-form','Frontend\FrontController@contactForm')->name('contact-form');
Route::post('/upload-cv','Frontend\FrontController@uploadCv')->name('upload.cv');
Route::get('/delete/cv/{id}','Frontend\FrontController@deleteCv')->name('destroy.cv');
Route::get('/delete/contact/{id}','Frontend\FrontController@deleteUsermessage')->name('delete.contactus');


// Route::get('{menu_url}', 'Frontend\FrontController@MenuUrl')->name('menu_url')->where('menu_url', '.*');

// Route::get('/',function(){
// 	return redirect()->route('login');
// });

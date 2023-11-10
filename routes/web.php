<?php

use App\Http\Controllers\Backend\Media\ImageController;
use App\Http\Controllers\Backend\Media\UploadController;
use App\Http\Controllers\Frontend\ClubMemberRegistration;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\Faculty\FacultyController;
use App\Http\Controllers\Frontend\Procurement\ProcurementController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\NewsEventNoticeController;
use App\Http\Controllers\Frontend\Academics\FrontAcademicsController;
use App\Models\CoreMunicipalityInfo;
use App\Models\GeneralMunicipalityInfo;
use Illuminate\Http\Request;

Route::get('/cache_clear', function () {
	try {
		Artisan::call('config:cache');
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
	} catch (\Exception $e) {
		dd($e);
	}
});



Route::get('/club-member-registration', [ClubMemberRegistration::class, 'registrationForm']);
Route::post('/club-member-registration', [ClubMemberRegistration::class, 'registration'])->name('registration.form.submit');
Route::get('/verify-email/{token}', [ClubMemberRegistration::class, 'verify'])->name('verify.email');
// Route::get('/club-members',[ClubMemberRegistration::class,'getUsers']);
Route::get('/q/{menu?}', 'FrontController@MenuUrl')->name('menu_url');

Route::get('/', 'Frontend\FrontController@index')->name('index');
Route::get('archivement/{id}', 'Frontend\FrontController@archivement')->name('archivement');

Route::get('pages/{id}', 'Frontend\PagesController@pages')->name('pages');

Route::get('news/details/{id}', 'Frontend\NewsEventNoticeController@news')->name('news.details');
Route::get('news/all/', 'Frontend\NewsEventNoticeController@allnews')->name('news.all');
Route::get('events/details/{id}', 'Frontend\NewsEventNoticeController@events')->name('events.details');
Route::get('events/all/', 'Frontend\NewsEventNoticeController@allevents')->name('events.all');
Route::get('notice/details/{id}', 'Frontend\NewsEventNoticeController@notice')->name('notice.details');
Route::get('notice/all/', 'Frontend\NewsEventNoticeController@allnotice')->name('notice.all');

//Office
Route::get('offices', 'Frontend\Office\FrontOfficeController@officePeople')->name('offices');
Route::get('office/people/details/{id}', 'Frontend\Office\FrontOfficeController@officePeopleDetails')->name('office.people.details');

// Faculty wise tamplate
Route::get('/faculty_home/{id}', [FacultyController::class, 'facultyHome'])->name('faculty_home');

//Faculty Member
Route::get('faculty-members', 'Frontend\FacultyMember\FacultyMemberController@FacultyMember')->name('faculty_member');
Route::get('faculty-member/details/{id}', 'Frontend\FacultyMember\FacultyMemberController@FacultyMemberDetails')->name('faculty_member.details');
// Route::get('faculty-member/details/{id}', 'Frontend\alleventsFacultyMember\FacultyMemberController@FacultyMemberDetails')->name('faculty_member.details');
// Route::get('office', 'Frontend\FrontController@officer')->name('office');

//About Staffs Start
Route::get('/about', [FrontController::class, 'about_overview'])->name('about_overview');
Route::get('/pp', [FrontController::class, 'pp'])->name('pp');
Route::get('/vc_information', [FrontController::class, 'vcInformation'])->name('vc_info');
Route::get('/research/{id}', [FrontController::class, 'research'])->name('research');
//Procurement Started
Route::get('/procurement', [ProcurementController::class, 'procurement'])->name('procurement');
Route::get('/procurement/{id}', [ProcurementController::class, 'procurementSingle'])->name('procurementSingle');


//IQAC Start
Route::get('/iqac', 'Frontend\IQAC\IQACController@iqacHome')->name('iqac');
Route::get('/iqac_team', 'Frontend\IQAC\IQACController@iqacTeam')->name('iqac_team');
Route::get('/iqac_training_workshop', 'Frontend\IQAC\IQACController@iqacTrainingWorkshop')->name('iqac_training_workshop');
Route::get('/iqac_document', 'Frontend\IQAC\IQACController@iqacDocument')->name('iqac_document');
Route::get('/iqac_contact', 'Frontend\IQAC\IQACController@iqacContact')->name('iqac_contact');
Route::get('/iqac_news_event', 'Frontend\IQAC\IQACController@iqacNewsEvent')->name('iqac_news_event');
Route::get('/iqac_faq', 'Frontend\IQAC\IQACController@iqacFAQ')->name('iqac_faq');

// Regulatory body
Route::get('/regulatory-body/{id}', 'Frontend\RegulatoryBody\RegulatoryBodyController@regulatory_body')->name('senate.member');

//bb chair

Route::prefix('bangabandhu_chair')->group(function () {
	Route::get('/', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChair')->name('bangabandhu_chair');
	Route::get('research', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairResearch')->name('bangabandhu_chair.research');
	Route::get('research/{type}/{id}', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairResearchDetail')->name('bangabandhu_chair.research.detail');
	Route::get('project', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairProject')->name('bangabandhu_chair.project');
	Route::get('collaboration', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairCollaboration')->name('bangabandhu_chair.collaboration');
	Route::get('publication', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairPublication')->name('bangabandhu_chair.publication');
	Route::get('publication/{id}', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairPublicationDetails')->name('bangabandhu_chair.publication.details');
	Route::get('gallery', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairGallery')->name('bangabandhu_chair.gallery');
});

Route::get('research-by-type', 'Frontend\ResearchController@researchByType')->name('research_by_type');


//oefcd
Route::get('oefcd', 'Frontend\OefcdController@index')->name('oefcd');
Route::get('oefcd/faculty', 'Frontend\OefcdController@faculty')->name('oefcd.faculty');
Route::get('oefcd/staff', 'Frontend\OefcdController@training')->name('oefcd.staff');
Route::get('oefcd/international', 'Frontend\OefcdController@international_affairs')->name('oefcd.affairs');
Route::get('oefcd/research_sponsored', 'Frontend\OefcdController@research_sponsored')->name('oefcd.research_sponsored');
Route::get('oefcd/project', 'Frontend\OefcdController@project')->name('oefcd.project');
Route::get('oefcd/collaborations', 'Frontend\OefcdController@collaborations')->name('oefcd.collaborations');
Route::get('oefcd/publications', 'Frontend\OefcdController@publications')->name('oefcd.publications');
Route::get('oefcd/oefcd_faq', 'Frontend\OefcdController@oefcdFAQ')->name('oefcd.oefcd_faq');
Route::get('oefcd/oefcd_gallery', 'Frontend\OefcdController@oefcdGallery')->name('oefcd.oefcd_gallery');
Route::get('oefcd/gallery/category/{id}', 'Frontend\OefcdController@oefcdGallery_category')->name('oefcd.gallery.category');
Route::get('get_gdata', 'Frontend\OefcdController@get_gdata')->name('get_gdata');

//affiliation
Route::get('affiliate-institute/{id}', 'Frontend\AffiliationController@index')->name('affiliation');
Route::get('all-affiliate-institutes', 'Frontend\AffiliationController@allAffiliation')->name('all.affiliate.institutes');
Route::get('affiliate-institutes-by-type', 'Frontend\AffiliationController@affiliationByType')->name('affiliate_institutes_by_type');

//chsr
Route::get('/chsr', 'Frontend\Chsr\ChsrController@chsr_home')->name('chsr_home');


Route::get('academics', 'Frontend\Academics\FrontAcademicsController@index')->name('academics');
Route::get('academics/academics_details/{id}', 'Frontend\Academics\FrontAcademicsController@academics_details')->name('academics.academics_details');
Route::post('academics_srch', 'Frontend\Academics\FrontAcademicsController@academics_srch')->name('academics_srch');

Route::get('vc', 'Frontend\FrontController@vc')->name('vc');
Route::get('vc2', 'Frontend\FrontController@vc2')->name('vc2');
Route::get('business_studies', 'Frontend\FrontController@business_studies')->name('business_studies');
Route::get('banghabondhu', 'Frontend\FrontController@banghabondhu')->name('banghabondhu');
Route::get('campus-life', 'Frontend\FrontController@campus_life')->name('campus_life');

//Reset Password
// Route::get('reset/password', 'Backend\PasswordResetController@resetPassword')->name('reset.password');
// Route::post('check/email', 'Backend\PasswordResetController@checkEmail')->name('check.email');
// Route::get('check/name', 'Backend\PasswordResetController@checkName')->name('check.name');
// Route::get('check/code', 'Backend\PasswordResetController@checkCode')->name('check.code');
// Route::post('submit/check/code', 'Backend\PasswordResetController@submitCode')->name('submit.check.code');
// Route::get('new/password', 'Backend\PasswordResetController@newPassword')->name('new.password');
// Route::post('store/new/password', 'Backend\PasswordResetController@newPasswordStore')->name('store.new.password');

Route::get('findapi', function () {
	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
	// dd($res);
	$clientdatas = json_decode($res->getBody()->getContents());
	return $clientdatas;
});

// Route::group(['middleware' => 'prevent.back'], function(){
Auth::routes();
Route::middleware(['auth'])->group(function () {
	// Route::middleware(['jisf.auth'])->group(function () {

	Route::get('/home', 'Backend\HomeController@index')->name('dashboard');

	Route::group(['middleware' => ['permission']], function () {

		Route::prefix('menu')->group(function () {
			Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
			Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
			Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
			Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
			Route::post('/update/{id}', 'Backend\Menu\MenuController@update')->name('menu.update');
			Route::get('/subparent', 'Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

			Route::get('/icon', 'Backend\Menu\MenuIconController@index')->name('menu.icon');
			Route::post('icon/store', 'Backend\Menu\MenuIconController@store')->name('menu.icon.store');
			Route::get('icon/edit', 'Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
			Route::post('icon/update/{id}', 'Backend\Menu\MenuIconController@update')->name('menu.icon.update');
			Route::post('icon/delete', 'Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
		});

		Route::post('/data/statuschange', 'Backend\DefaultController@statusChange')->name('table.status.change');
		Route::post('/data/delete', 'Backend\DefaultController@delete')->name('table.data.delete');
		Route::get('/sub/menu', 'Backend\DefaultController@SubMenu')->name('table.data.submenu');

		Route::get('/search-policy', 'Backend\HomeController@searchPolicy')->name('search.policy');
		Route::get('/policy=details/{id}', 'Backend\HomeController@policyDetails')->name('policy.details');

		Route::prefix('user')->group(function () {
			Route::get('/', 'UserController@index')->name('user');
			Route::get('/add', 'UserController@userAdd')->name('user.add');
			Route::post('/store', 'UserController@userStore')->name('user.store');
			Route::get('/edit/{id}', 'UserController@userEdit')->name('user.edit');
			Route::post('/update/{id}', 'UserController@updateUser')->name('user.update');
			Route::post('/delete', 'UserController@deleteUser')->name('user.delete');


			Route::get('/add/personals_to_user', 'PersonalUserController@userAdd')->name('personals_user.add');
			Route::post('/store/personals_user', 'PersonalUserController@userStore')->name('personals_user.store');


			Route::get('/add/club_member_user', 'PersonalUserController@clubUserAdd')->name('club_member_user.add');
			Route::post('/store/club_member', 'PersonalUserController@club_member_store')->name('club_member.store');

			//get single personal data
			Route::get('/find_single_profile', 'PersonalUserController@find_single_profile')->name('find_single_profile');

			//get single student data
			Route::get('/find_single_student', 'PersonalUserController@find_single_student')->name('find_single_student');
			// Route::get('/edit/personals_user/{id}', 'UserController@userEdit')->name('personals_user.edit');
			// Route::post('/update/personals_user/{id}', 'UserController@updateUser')->name('personals_user.update');
			// Route::post('/delete/personals_user', 'UserController@deleteUser')->name('personals_user.delete');


			Route::get('/user/status/', 'UserController@userStatus')->name('user.status.change');

			Route::get('/role', 'Backend\Menu\RoleController@index')->name('user.role');
			Route::post('/role/store', 'Backend\Menu\RoleController@storeRole')->name('user.role.store');
			Route::get('/role/edit', 'Backend\Menu\RoleController@getRole')->name('user.role.edit');
			Route::post('/role/update/{id}', 'Backend\Menu\RoleController@updateRole')->name('user.role.update');
			Route::post('/role/delete', 'Backend\Menu\RoleController@deleteRole')->name('user.role.delete');

			Route::get('/permission', 'Backend\Menu\MenuPermissionController@index')->name('user.permission');
			Route::post('/permission/store', 'Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');
		});

		Route::prefix('profile-management')->group(function () {
			//Change Password
			Route::get('change/password', 'Backend\PasswordChangeController@changePassword')->name('profile-management.change.password');
			Route::post('store/password', 'Backend\PasswordChangeController@storePassword')->name('profile-management.store.password');
			//Profile
			Route::get('change/profile', 'Backend\PasswordChangeController@changeProfile')->name('profile-management.change.profile');
			Route::post('store/profile', 'Backend\PasswordChangeController@storeProfile')->name('profile-management.store.profile');
		});

		Route::prefix('frontend-menu')->group(function () {
			//Post
			Route::get('/post/view', 'Backend\Page\PageController@view')->name('frontend-menu.post.view');
			Route::get('/post/add', 'Backend\Page\PageController@add')->name('frontend-menu.post.add');
			Route::post('/post/store', 'Backend\Page\PageController@store')->name('frontend-menu.post.store');
			Route::get('/post/edit/{id}', 'Backend\Page\PageController@edit')->name('frontend-menu.post.edit');
			Route::post('/post/update/{id}', 'Backend\Page\PageController@update')->name('frontend-menu.post.update');
			Route::get('/post/delete', 'Backend\Page\PageController@destroy')->name('frontend-menu.post.destroy');
			//Frontend Menu
			Route::get('/menu/view/{id}', 'Backend\FrontendMenu\FrontendMenuController@view')->name('frontend-menu.menu.view');
			Route::get('/menu/add', 'Backend\FrontendMenu\FrontendMenuController@add')->name('frontend-menu.menu.add');
			Route::post('/menu/single/store', 'Backend\FrontendMenu\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
			Route::post('/menu/store', 'Backend\FrontendMenu\FrontendMenuController@store')->name('frontend-menu.menu.store');
			Route::get('/menu/edit/{id}', 'Backend\FrontendMenu\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
			Route::post('/menu/update/{id}', 'Backend\FrontendMenu\FrontendMenuController@update')->name('frontend-menu.menu.update');
			Route::get('/menu/delete', 'Backend\FrontendMenu\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');

			// Frontend menu type
			Route::get('menu_type/view', 'Backend\FrontendMenu\FrontendMenuController@viewMenuType')->name('frontend-menu.menu_type.view');
			Route::get('menu_type/create', 'Backend\FrontendMenu\FrontendMenuController@createMenuType')->name('frontend-menu.menu_type.create');
			Route::post('menu_type/store', 'Backend\FrontendMenu\FrontendMenuController@storeMenuType')->name('frontend-menu.menu_type.store');
			Route::get('menu_type/edit/{id}', 'Backend\FrontendMenu\FrontendMenuController@editMenuType')->name('frontend-menu.menu_type.edit');
			Route::post('menu_type/update/{id}', 'Backend\FrontendMenu\FrontendMenuController@updateMenuType')->name('frontend-menu.menu_type.update');

			//top menu

			Route::get('top_menu/view', 'Backend\FrontendMenu\FrontendTopMenuController@viewMenu')->name('frontend-menu.top_menu');
			Route::get('top_menu/create', 'Backend\FrontendMenu\FrontendTopMenuController@createMenu')->name('frontend-menu.top_menu.create');
			Route::post('top_menu/store', 'Backend\FrontendMenu\FrontendTopMenuController@storeMenu')->name('frontend-menu.top_menu.store');
			Route::get('top_menu/edit/{id}', 'Backend\FrontendMenu\FrontendTopMenuController@editMenu')->name('frontend-menu.top_menu.edit');
			Route::post('top_menu/update/{id}', 'Backend\FrontendMenu\FrontendTopMenuController@updateMenu')->name('frontend-menu.top_menu.update');
		});

		Route::prefix('about')->group(function () {
			Route::get('/view', 'Backend\AboutController@aboutView')->name('about.overview');
			Route::get('/about/add', 'Backend\AboutController@aboutAdd')->name('about.add');
			Route::post('/about/store', 'Backend\AboutController@aboutStore')->name('about.store');
			Route::get('/about/edit/{id}', 'Backend\AboutController@aboutEdit')->name('about.edit');
			Route::post('/about/update/{id}', 'Backend\AboutController@aboutUpdate')->name('about.update');
			Route::post('/about/delete', 'Backend\AboutController@aboutDelete')->name('about.delete');

			Route::get('vc-information', 'Backend\AboutController@vcInformation')->name('vc.information');
			Route::post('vc-information/{id}', 'Backend\AboutController@vcInformationUpdate')->name('vc.information.update');

			Route::get('vc/honor/board/list', 'Backend\VcHonorBoardController@list')->name('vc.honor.board.list');
			Route::get('vc/honor/board/create', 'Backend\VcHonorBoardController@create')->name('vc.honor.board.create');
			Route::post('vc/honor/board/store', 'Backend\VcHonorBoardController@store')->name('vc.honor.board.store');
			Route::get('vc/honor/board/edit/{id}', 'Backend\VcHonorBoardController@edit')->name('vc.honor.board.edit');
			Route::post('vc/honor/board/update/{id}', 'Backend\VcHonorBoardController@update')->name('vc.honor.board.update');
		});

		Route::prefix('homepages')->group(function () {
			//Slider type
			Route::get('/slider/view', 'Backend\Homepage\SliderController@sliderView')->name('homepages.slider.view');
			Route::get('/slider/type', 'Backend\Homepage\SliderController@sliderTypAdd')->name('homepages.slider.type');
			Route::post('/slider/type/store', 'Backend\Homepage\SliderController@sliderTypeStore')->name('homepages.slider.type.store');
			Route::get('/slider/edit/{id}', 'Backend\Homepage\SliderController@sliderTypeEdit')->name('homepages.slider.type.edit');
			Route::post('/slider/update/{id}', 'Backend\Homepage\SliderController@sliderUpdate')->name('homepages.slider.type.update');
			Route::post('/slider/delete', 'Backend\Homepage\SliderController@sliderDelete')->name('homepages.slider.delete');


			//Slider Add
			Route::get('/slider/add/{id}', 'Backend\Homepage\SliderController@sliderAdd')->name('homepages.slider.add');
			Route::post('slider-store', 'Backend\Homepage\SliderController@sliderStore')->name('homepages.slider-store');
			Route::get('/slider-view/{id}', 'Backend\Homepage\SliderController@typeWiseSlideView')->name('homepages.slider.typeView');
			Route::get('/slider-edit/{id}', 'Backend\Homepage\SliderController@typeWiseSlideEdit')->name('homepages.slider.wise.edit');
			Route::post('slider-update', 'Backend\Homepage\SliderController@sliderWiseUpdate')->name('homepages.slider-update');


			//About Us
			Route::get('/about/view', 'Backend\Homepage\AboutController@aboutView')->name('homepages.about.view');
			Route::get('/about/add', 'Backend\Homepage\AboutController@aboutAdd')->name('homepages.about.add');
			Route::post('/about/store', 'Backend\Homepage\AboutController@aboutStore')->name('homepages.about.store');
			Route::get('/about/edit/{id}', 'Backend\Homepage\AboutController@aboutEdit')->name('homepages.about.edit');
			Route::post('/about/update/{id}', 'Backend\Homepage\AboutController@aboutUpdate')->name('homepages.about.update');
			Route::post('/about/delete', 'Backend\Homepage\AboutController@aboutDelete')->name('homepages.about.delete');

			//Gallery Category
			Route::get('gallery/category', 'Backend\Homepage\GalleryCategoryController@index')->name('homepages.gallery.category');
			Route::get('gallery/category/add', 'Backend\Homepage\GalleryCategoryController@galleryCategoryAdd')->name('homepages.gallery.category.add');
			Route::post('gallery/category/store', 'Backend\Homepage\GalleryCategoryController@galleryCategoryStore')->name('homepages.gallery.category.store');
			Route::get('gallery/category/edit/{id?}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryEdit')->name('homepages.gallery.category.edit');
			Route::post('gallery/category/update/{id}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryUpdate')->name('homepages.gallery.category.update');
			Route::post('gallery/category/delete', 'Backend\Homepage\GalleryCategoryController@galleryCategoryDelete')->name('homepages.gallery.category.delete');

			//image Gallery
			Route::get('image-gallery', 'Backend\Homepage\ImageGalleryController@index')->name('homepages.gallery');
			Route::get('image-gallery/add', 'Backend\Homepage\ImageGalleryController@galleryAdd')->name('homepages.gallery.add');
			Route::post('image-gallery/store', 'Backend\Homepage\ImageGalleryController@galleryStore')->name('homepages.gallery.store');
			Route::get('image-gallery/edit/{id?}', 'Backend\Homepage\ImageGalleryController@galleryEdit')->name('homepages.gallery.edit');
			Route::post('image-gallery/update/{id}', 'Backend\Homepage\ImageGalleryController@galleryUpdate')->name('homepages.gallery.update');
			Route::post('image-gallery/delete', 'Backend\Homepage\ImageGalleryController@galleryDelete')->name('homepages.gallery.delete');

			//Video Gallery Category
			Route::get('video-gallery/category', 'Backend\Homepage\GalleryCategoryController@index')->name('homepages.video.gallery');
			Route::get('video-gallery/category/add', 'Backend\Homepage\GalleryCategoryController@galleryCategoryAdd')->name('homepages.gallery.category.add');
			Route::post('video-gallery/category/store', 'Backend\Homepage\GalleryCategoryController@galleryCategoryStore')->name('homepages.gallery.category.store');
			Route::get('video-gallery/category/edit/{id?}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryEdit')->name('homepages.gallery.category.edit');
			Route::post('video-gallery/category/update/{id}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryUpdate')->name('homepages.gallery.category.update');
			Route::post('video-gallery/category/delete', 'Backend\Homepage\GalleryCategoryController@galleryCategoryDelete')->name('homepages.gallery.category.delete');

			//Video Gallery
			Route::get('video-gallery', 'Backend\Homepage\VideoCategoryController@index')->name('homepages.video.gallery');
			Route::get('video-gallery/add', 'Backend\Homepage\VideoCategoryController@galleryAdd')->name('homepages.gallery.add');
			Route::post('video-gallery/store', 'Backend\Homepage\VideoCategoryController@galleryStore')->name('homepages.gallery.store');
			Route::get('video-gallery/edit/{id?}', 'Backend\Homepage\VideoCategoryController@galleryEdit')->name('homepages.gallery.edit');
			Route::post('video-gallery/update/{id}', 'Backend\Homepage\VideoCategoryController@galleryUpdate')->name('homepages.gallery.update');
			Route::post('video-gallery/delete', 'Backend\Homepage\VideoCategoryController@galleryDelete')->name('homepages.gallery.delete');

			//event
			Route::get('/event', 'Backend\Homepage\EventController@index')->name('homepages.event');
			Route::get('/event/add', 'Backend\Homepage\EventController@Add')->name('homepages.event.add');
			Route::post('/event/store', 'Backend\Homepage\EventController@Store')->name('homepages.event.store');
			Route::get('/event/edit/{id}', 'Backend\Homepage\EventController@Edit')->name('homepages.event.edit');
			Route::post('/event/update/{id}', 'Backend\Homepage\EventController@Update')->name('homepages.event.update');
			Route::post('/event/delete', 'Backend\Homepage\EventController@Delete')->name('homepages.event.delete');


			Route::get('/notice', 'Backend\Homepage\NoticeController@index')->name('homepages.notice');
			Route::get('/news', 'Backend\Homepage\NewsController@index')->name('homepages.news');
		});

		Route::prefix('manage-faculty')->group(function () {
			//Faculty
			Route::get('/faculty', 'Backend\ManageFacultyController@index')->name('manage_faculty.faculty');
			Route::get('/faculty/add', 'Backend\ManageFacultyController@Add')->name('manage_faculty.faculty.add');
			Route::post('/faculty/store', 'Backend\ManageFacultyController@Store')->name('manage_faculty.faculty.store');
			Route::get('/faculty/edit/{id}', 'Backend\ManageFacultyController@Edit')->name('manage_faculty.faculty.edit');
			Route::post('/faculty/update/{id}', 'Backend\ManageFacultyController@Update')->name('manage_faculty.faculty.update');
			Route::post('/faculty/delete', 'Backend\ManageFacultyController@Delete')->name('manage_faculty.faculty.delete');
		});

		Route::prefix('setup')->group(function () {
			// Developed by Mamun
			//Faculty
			Route::get('/faculty', 'Backend\ManageFacultyController@index')->name('setup.manage_faculty');
			Route::get('/faculty/add', 'Backend\ManageFacultyController@Add')->name('setup.manage_faculty.add');
			Route::post('/faculty/store', 'Backend\ManageFacultyController@Store')->name('setup.manage_faculty.store');
			Route::get('/faculty/edit/{id}', 'Backend\ManageFacultyController@Edit')->name('setup.manage_faculty.edit');
			Route::post('/faculty/update/{id}', 'Backend\ManageFacultyController@Update')->name('setup.manage_faculty.update');
			Route::post('/faculty/delete', 'Backend\ManageFacultyController@Delete')->name('setup.manage_faculty.delete');

			//Faculty for API
			Route::get('/faculty-from-api', 'Backend\ManageFacultyController@newFacultyfromApi')->name('setup.manage_faculty.new_faculty_from_api');
			Route::get('/insert-all-faculty-to-db', 'Backend\ManageFacultyController@insertAllToDB')->name('setup.manage_faculty.insert_all_faculty_to_db');

			//Department
			Route::get('/department', 'Backend\ManageDepartmentController@index')->name('setup.manage_department');
			Route::get('/department/add', 'Backend\ManageDepartmentController@Add')->name('setup.manage_department.add');
			Route::post('/department/store', 'Backend\ManageDepartmentController@Store')->name('setup.manage_department.store');
			Route::get('/department/edit/{id}', 'Backend\ManageDepartmentController@Edit')->name('setup.manage_department.edit');
			Route::post('/department/update/{id}', 'Backend\ManageDepartmentController@Update')->name('setup.manage_department.update');
			Route::post('/department/delete', 'Backend\ManageDepartmentController@Delete')->name('setup.manage_department.delete');

			//Department for API
			Route::get('/department-from-api', 'Backend\ManageDepartmentController@newDepartmentfromApi')->name('setup.manage_department.new_department_from_api');
			Route::get('/insert-all-department-to-db', 'Backend\ManageDepartmentController@insertAllToDB')->name('setup.manage_department.insert_all_department_to_db');
			//end by Mamun


			//Form
			Route::get('/form', 'Backend\FormController@index')->name('setup.manage_form');
			Route::get('/form/add', 'Backend\FormController@Add')->name('setup.manage_form.add');
			Route::post('/form/store', 'Backend\FormController@Store')->name('setup.manage_form.store');
			Route::get('/form/edit/{id}', 'Backend\FormController@Edit')->name('setup.manage_form.edit');
			Route::post('/form/update/{id}', 'Backend\FormController@Update')->name('setup.manage_form.update');
			Route::post('/form/delete', 'Backend\FormController@Delete')->name('setup.manage_form.delete');

			//Academic Calender
			Route::get('/academic_calender', 'Backend\AcademicCalenderController@index')->name('setup.academic_calender');
			Route::get('/academic_calender/add', 'Backend\AcademicCalenderController@Add')->name('setup.academic_calender.add');
			Route::post('/academic_calender/store', 'Backend\AcademicCalenderController@Store')->name('setup.academic_calender.store');
			Route::get('/academic_calender/edit/{id}', 'Backend\AcademicCalenderController@Edit')->name('setup.academic_calender.edit');
			Route::post('/academic_calender/update/{id}', 'Backend\AcademicCalenderController@Update')->name('setup.academic_calender.update');
			Route::post('/academic_calender/delete', 'Backend\AcademicCalenderController@Delete')->name('setup.academic_calender.delete');
			//    Route::get('faculty_wise_department','AcademicCalenderController@facultyWiseDepartment')->name('faculty_wise_department');
			Route::get('department_wise_program', 'Backend\AcademicCalenderController@DepartmentWiseProgram')->name('department_wise_program');


			// Hall

			Route::get('/hall', 'Backend\HallController@index')->name('setup.manage_hall');
			Route::get('/hall', 'Backend\HallController@index')->name('setup.manage_hall');
			Route::get('/hall/add', 'Backend\HallController@Add')->name('setup.manage_hall.add');
			Route::post('/hall/store', 'Backend\HallController@Store')->name('setup.manage_hall.store');
			Route::get('/hall/edit/{id}', 'Backend\HallController@Edit')->name('setup.manage_hall.edit');
			Route::post('/hall/update/{id}', 'Backend\HallController@Update')->name('setup.manage_hall.update');
			Route::post('/hall/delete', 'Backend\HallController@Delete')->name('setup.manage_hall.delete');


			//Hall Member
			Route::get('/hall_member/{id}', 'Backend\HallMemberController@index')->name('setup.manage_hall_member');
			Route::get('/hall_member/add/{id}', 'Backend\HallMemberController@Add')->name('setup.manage_hall_member.add');
			Route::post('/hall_member/store', 'Backend\HallMemberController@Store')->name('setup.manage_hall_member.store');
			Route::get('/hall_member/edit/{id}', 'Backend\HallMemberController@Edit')->name('setup.manage_hall_member.edit');
			Route::post('/hall_member/update/{id}', 'Backend\HallMemberController@Update')->name('setup.manage_hall_member.update');
			Route::post('/hall_member/delete', 'Backend\HallMemberController@Delete')->name('setup.manage_hall_member.delete');
			Route::get('/member_wise_hall', 'Backend\HallMemberController@memberWiseHall')->name('member_wise_hall');


			//Program Category
			Route::get('/program_category', 'Backend\ProgramCategoryController@index')->name('setup.program_category');
			Route::get('/program_category/add', 'Backend\ProgramCategoryController@Add')->name('setup.program_category.add');
			Route::post('/program_category/store', 'Backend\ProgramCategoryController@Store')->name('setup.program_category.store');
			Route::get('/program_category/edit/{id}', 'Backend\ProgramCategoryController@Edit')->name('setup.program_category.edit');
			Route::post('/program_category/update/{id}', 'Backend\ProgramCategoryController@Update')->name('setup.program_category.update');
			Route::post('/program_category/delete', 'Backend\ProgramCategoryController@Delete')->name('setup.program_category.delete');

			//Program
			Route::get('/program', 'Backend\ProgramController@index')->name('setup.program');
			Route::get('/program/add', 'Backend\ProgramController@Add')->name('setup.program.add');
			Route::post('/program/store', 'Backend\ProgramController@Store')->name('setup.program.store');
			Route::get('/program/edit/{id}', 'Backend\ProgramController@Edit')->name('setup.program.edit');
			Route::post('/program/update/{id}', 'Backend\ProgramController@Update')->name('setup.program.update');
			// Route::post('/program/delete', 'Backend\ProgramController@Delete')->name('setup.program.delete');
			//Admission ON/OFF
			Route::post('/program/approve/{id}', 'Backend\ProgramController@programApprove')->name('program.approve');

			//ajax
			Route::get('faculty-wise-department', 'Backend\ProgramController@facultyWiseDepartment')->name('faculty_wise_department');

			//Program from Api
			Route::get('/program-from-api', 'Backend\Program\ProgramFromApiController@index')->name('setup.program.program_from_api');
			Route::get('/program-from-api/store', 'Backend\Program\ProgramFromApiController@store')->name('setup.program.program_from_api.store');


			//FAQ
			Route::get('/faq', 'Backend\FAQController@index')->name('setup.faq');
			Route::get('/faq/add', 'Backend\FAQController@Add')->name('setup.faq.add');
			Route::post('/faq/store', 'Backend\FAQController@Store')->name('setup.faq.store');
			Route::get('/faq/edit/{id}', 'Backend\FAQController@Edit')->name('setup.faq.edit');
			Route::post('/faq/update/{id}', 'Backend\FAQController@Update')->name('setup.faq.update');
			Route::post('/faq/delete', 'Backend\FAQController@Delete')->name('setup.faq.delete');

			//ajax
			Route::get('multiple-faculty-wise-department', 'Backend\FAQController@multipleFacultyWiseDepartment')->name('multiple_faculty_wise_department');
			Route::get('multiple-department-wise-program', 'Backend\FAQController@multipleDepartmentWiseProgram')->name('multiple_department_wise_program');

			//Gallery Category
			Route::get('/gallery_category', 'Backend\GalleryCategoryController@index')->name('setup.gallery_category');
			Route::get('/gallery_category/add', 'Backend\GalleryCategoryController@Add')->name('setup.gallery_category.add');
			Route::post('/gallery_category/store', 'Backend\GalleryCategoryController@Store')->name('setup.gallery_category.store');
			Route::get('/gallery_category/edit/{id}', 'Backend\GalleryCategoryController@Edit')->name('setup.gallery_category.edit');
			Route::post('/gallery_category/update/{id}', 'Backend\GalleryCategoryController@Update')->name('setup.gallery_category.update');
			Route::post('/gallery_category/delete', 'Backend\GalleryCategoryController@Delete')->name('setup.gallery_category.delete');

			//Manage Photo
			Route::get('/photo', 'Backend\PhotoController@index')->name('setup.photo');
			Route::get('/photo/add', 'Backend\PhotoController@Add')->name('setup.photo.add');
			Route::post('/photo/store', 'Backend\PhotoController@Store')->name('setup.photo.store');
			Route::post('/photo/store/avatar', 'Backend\PhotoController@avatarStore')->name('avatar');
			Route::post('/photo/stores', 'Backend\PhotoController@StoreImage')->name('filepond.server.url');
			Route::get('/photo/edit/{id}', 'Backend\PhotoController@Edit')->name('setup.photo.edit');
			Route::post('/photo/update/{id}', 'Backend\PhotoController@Update')->name('setup.photo.update');
			Route::post('/photo/delete', 'Backend\PhotoController@Delete')->name('setup.photo.delete');
			//Crop Image Save to folder
			Route::post('crop-image-upload', 'Backend\PhotoController@cropImageSave')->name('crop_image_upload');
			Route::post('/photos/upload', 'Backend\PhotoController@PhotosUpload')->name('setup.photo.photos_upload');



			Route::get('/image', 'Backend\Media\ImageController@index')->name('image.upload');
			Route::post('/submit', 'Backend\Media\ImageController@store')->name('submitImage');
			// Route::post('/submit', 'store')->name('submitImage');


			//route filepond
			Route::post('/upload', 'Backend\Media\UploadController@store')->name('upload');
			Route::delete('/hapus', 'Backend\Media\UploadController@destroy')->name('hapus');
			// Route::delete('/hapus', 'destroy')->name('hapus');


			//Video Gallery
			Route::get('video_gallery', 'Backend\VideoGalleryController@index')->name('setup.video_gallery');
			Route::get('video_gallery/add', 'Backend\VideoGalleryController@addVideoGallery')->name('setup.video_gallery.add');
			Route::post('video_gallery/store', 'Backend\VideoGalleryController@storeVideoGallery')->name('setup.video_gallery.store');
			Route::get('video_gallery/edit/{id}', 'Backend\VideoGalleryController@editVideoGallery')->name('setup.video_gallery.edit');
			Route::post('video_gallery/update/{id}', 'Backend\VideoGalleryController@updateVideoGallery')->name('setup.video_gallery.update');
			Route::post('video_gallery/delete', 'Backend\VideoGalleryController@deleteVideoGallery')->name('setup.video_gallery.delete');


			//Career
			Route::get('/view', 'Backend\CareerController@index')->name('setup.career.view');
			Route::get('/add', 'Backend\CareerController@add')->name('setup.career.add');
			Route::post('/single/store', 'Backend\CareerController@singleStore')->name('setup.career.single.store');
			Route::post('/store', 'Backend\CareerController@store')->name('setup.career.store');
			Route::get('/edit/{id}', 'Backend\CareerController@edit')->name('setup.career.edit');
			Route::post('/update/{id}', 'Backend\CareerController@update')->name('setup.career.update');
			Route::post('/delete', 'Backend\CareerController@destroy')->name('setup.career.delete');
			//Remove Career Attachment
			Route::get('/remove_career_attachment/{id}', 'Backend\CareerController@careerAttachmentRemove')->name('setup.career.remove_career_attachment');
			Route::post('/remove_career_attachment', 'Backend\CareerController@careerAttachmentRemove')->name('setup.career.remove_career_attachment');
			//Office
			Route::get('/office', 'Backend\ManageOfficeController@index')->name('setup.manage_office');
			Route::get('/office/add', 'Backend\ManageOfficeController@Add')->name('setup.manage_office.add');
			Route::post('/office/store', 'Backend\ManageOfficeController@Store')->name('setup.manage_office.store');
			Route::get('/office/edit/{id}', 'Backend\ManageOfficeController@Edit')->name('setup.manage_office.edit');
			Route::post('/office/update/{id}', 'Backend\ManageOfficeController@Update')->name('setup.manage_office.update');
			Route::post('/office/delete', 'Backend\ManageOfficeController@Delete')->name('setup.manage_office.delete');

			//Office for API
			Route::get('/office-from-api', 'Backend\ManageOfficeController@newOfficefromApi')->name('setup.manage_office.new_office_from_api');
			Route::get('/insert-all-office-to-db', 'Backend\ManageOfficeController@insertAllToDB')->name('setup.manage_office.insert_all_office_to_db');

			//Manage Affiliations
			Route::get('/affiliation', 'Backend\AffiliationController@index')->name('setup.affiliation');
			Route::get('/affiliation/add', 'Backend\AffiliationController@Add')->name('setup.affiliation.add');
			Route::post('/affiliation/store', 'Backend\AffiliationController@Store')->name('setup.affiliation.store');
			Route::get('/affiliation/edit/{id}', 'Backend\AffiliationController@Edit')->name('setup.affiliation.edit');
			Route::post('/affiliation/update/{id}', 'Backend\AffiliationController@Update')->name('setup.affiliation.update');
			Route::post('/affiliation/delete', 'Backend\AffiliationController@Delete')->name('setup.affiliation.delete');

			Route::get('/affiliation/api', 'Backend\AffiliationController@getAffiliationsFromApi')->name('affiliation.api');
			Route::get('/affiliation/api/store', 'Backend\AffiliationController@storeAffiliationsFromApi')->name('affiliation.api.store');


			//Custom Pages
			Route::get('/custom_page', 'Backend\CustomPageController@index')->name('setup.custom_page');
			Route::get('/custom_page/add', 'Backend\CustomPageController@Add')->name('setup.custom_page.add');
			Route::post('/custom_page/store', 'Backend\CustomPageController@Store')->name('setup.custom_page.store');
			Route::get('/custom_page/edit/{id}', 'Backend\CustomPageController@Edit')->name('setup.custom_page.edit');
			Route::post('/custom_page/update/{id}', 'Backend\CustomPageController@Update')->name('setup.custom_page.update');
			Route::post('/custom_page/delete', 'Backend\CustomPageController@Delete')->name('setup.custom_page.delete');
		});

		Route::prefix('manage-profile')->group(function () {
			//From API
			Route::get('/profile-office', 'Backend\ProfileFromApiController@index_office')->name('manage_office_profile.from_api');
			Route::get('/profile', 'Backend\ProfileFromApiController@index')->name('manage_profile.from_api');
			Route::get('/profile/add', 'Backend\ProfileFromApiController@Add')->name('manage_profile.from_api.add');
			Route::post('/profile/store', 'Backend\ProfileFromApiController@Store')->name('manage_profile.from_api.store');
			Route::get('/profile/view/{BupNo}', 'Backend\ProfileFromApiController@viewSingleProfile')->name('manage_profile.from_api.view_single_profile');
			Route::get('/profile/view/{NameEng}', 'Backend\ProfileFromApiController@viewSingleProfilewithName')->name('manage_profile.from_api.view_single_profile');
			Route::get('/profile/edit/{id}', 'Backend\ProfileFromApiController@Edit')->name('manage_profile.from_api.edit');
			Route::post('/profile/update/{id}', 'Backend\ProfileFromApiController@Update')->name('manage_profile.from_api.update');
			Route::post('/profile/delete', 'Backend\ProfileFromApiController@Delete')->name('manage_profile.from_api.delete');
			Route::get('/insert-all-to-db', 'Backend\ProfileFromApiController@insertAllToDB')->name('manage_profile.from_api.insertAllToDB');
			Route::get('/insert-all-to-db-office', 'Backend\ProfileFromApiController@insertAllToDB_Office')->name('manage_profile.from_api.insertAllToDB_Office');


			//From Database
			Route::get('/profiles_in_database', 'Backend\ProfileFromDatabaseController@index')->name('manage_profile.from_database');
			Route::get('/profiles_in_database/add', 'Backend\ProfileFromDatabaseController@Add')->name('manage_profile.from_database.add');
			Route::post('/profiles_in_database/store', 'Backend\ProfileFromDatabaseController@Store')->name('manage_profile.from_database.store');
			Route::get('/profiles_in_database/view/{BupNo}', 'Backend\ProfileFromDatabaseController@viewSingleProfile')->name('manage_profile.from_database.view_single_profile');
			Route::get('/profiles_in_database/edit/{id}', 'Backend\ProfileFromDatabaseController@Edit')->name('manage_profile.from_database.edit');
			Route::post('/profiles_in_database/update/{id}', 'Backend\ProfileFromDatabaseController@Update')->name('manage_profile.from_database.update');
			Route::post('/profiles_in_database/delete', 'Backend\ProfileFromDatabaseController@Delete')->name('manage_profile.from_database.delete');
			Route::get('/updated-list-in-faculty-api', 'Backend\ProfileFromDatabaseController@updatedListInFacultyApi')->name('manage_profile.from_database.updated_list_in_faculty_api');
			//Modified Personnels
			Route::get('/modified_personnels/edit/{BupNo}', 'Backend\ProfileFromDatabaseController@editModifiedPersonnels')->name('manage_profile.from_database.edit_modified_personnels');
			Route::post('/modified_personnels/update/{BupNo}', 'Backend\ProfileFromDatabaseController@updateModifiedPersonnels')->name('manage_profile.from_database.update_modified_personnels');

			//Profile Journal Info Edit
			Route::get('/profile_journal_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_journal_info_edit')->name('profile_journal_info_edit');
			Route::post('/profile_journal_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_journal_info_update')->name('profile_journal_info_update');
			Route::post('/remove_profile_journal', 'Backend\ProfileOtherInfosController@profile_journal_remove')->name('remove_profile_journal');
			//Profile Journal Info Add
			Route::get('/profile_journal_info_add', 'Backend\ProfileOtherInfosController@profile_journal_info_add')->name('profile_journal_info_add');
			Route::post('/profile_journal_info_store', 'Backend\ProfileOtherInfosController@profile_journal_info_store')->name('profile_journal_info_store');

			//Profile Conference Info Edit
			Route::get('/profile_conference_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_conference_info_edit')->name('profile_conference_info_edit');
			Route::post('/profile_conference_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_conference_info_update')->name('profile_conference_info_update');
			Route::post('/remove_profile_conference', 'Backend\ProfileOtherInfosController@profile_conference_remove')->name('remove_profile_conference');

			//Profile Book Info Edit
			Route::get('/profile_book_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_book_info_edit')->name('profile_book_info_edit');
			Route::post('/profile_book_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_book_info_update')->name('profile_book_info_update');
			Route::post('/remove_profile_book', 'Backend\ProfileOtherInfosController@profile_book_remove')->name('remove_profile_book');

			//Profile Biography Info Edit
			Route::get('/profile_biography_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_biography_info_edit')->name('profile_biography_info_edit');
			Route::post('/profile_biography_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_biography_info_update')->name('profile_biography_info_update');
			Route::post('/remove_profile_biography', 'Backend\ProfileOtherInfosController@profile_biography_remove')->name('remove_profile_biography');

			//Profile Professional Activity Info Edit
			Route::get('/profile_professional_activity_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_professional_activity_info_edit')->name('profile_professional_activity_info_edit');
			Route::post('/profile_professional_activity_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_professional_activity_info_update')->name('profile_professional_activity_info_update');
			Route::post('/remove_profile_professional_activity', 'Backend\ProfileOtherInfosController@profile_professional_activity_remove')->name('remove_profile_professional_activity');


			//Profile Course Taught Info Edit
			Route::get('/profile_course_taught_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_course_taught_info_edit')->name('profile_course_taught_info_edit');
			Route::post('/profile_course_taught_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_course_taught_info_update')->name('profile_course_taught_info_update');
			Route::post('/remove_profile_course_taught', 'Backend\ProfileOtherInfosController@profile_course_taught_remove')->name('remove_profile_course_taught');

			//Profile Award Honor Info Edit
			Route::get('/profile_award_honor_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_award_honor_info_edit')->name('profile_award_honor_info_edit');
			Route::post('/profile_award_honor_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_award_honor_info_update')->name('profile_award_honor_info_update');
			Route::post('/remove_profile_award_honor', 'Backend\ProfileOtherInfosController@profile_award_honor_remove')->name('remove_profile_award_honor');

			//Profile Membership Info Edit
			Route::get('/profile_membership_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_membership_info_edit')->name('profile_membership_info_edit');
			Route::post('/profile_membership_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_membership_info_update')->name('profile_membership_info_update');
			Route::post('/remove_profile_membership', 'Backend\ProfileOtherInfosController@profile_membership_remove')->name('remove_profile_membership');

			//Profile Research Area Interest Info Edit
			Route::get('/profile_research_area_interest_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_area_interest_info_edit')->name('profile_research_area_interest_info_edit');
			Route::post('/profile_research_area_interest_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_area_interest_info_update')->name('profile_research_area_interest_info_update');
			Route::post('/remove_profile_research_area_interest', 'Backend\ProfileOtherInfosController@profile_research_area_interest_remove')->name('remove_profile_research_area_interest');

			//Profile Google Scholar Info Edit
			Route::get('/profile_google_scholar_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_google_scholar_info_edit')->name('profile_google_scholar_info_edit');
			Route::post('/profile_google_scholar_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_google_scholar_info_update')->name('profile_google_scholar_info_update');
			Route::post('/remove_profile_google_scholar', 'Backend\ProfileOtherInfosController@profile_google_scholar_remove')->name('remove_profile_google_scholar');

			//Profile Research Gate Info Edit
			Route::get('/profile_research_gate_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_gate_info_edit')->name('profile_research_gate_info_edit');
			Route::post('/profile_research_gate_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_gate_info_update')->name('profile_research_gate_info_update');
			Route::post('/remove_profile_research_gate', 'Backend\ProfileOtherInfosController@profile_research_gate_remove')->name('remove_profile_research_gate');

			//Profile Website Info Edit
			Route::get('/profile_website_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_website_info_edit')->name('profile_website_info_edit');
			Route::post('/profile_website_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_website_info_update')->name('profile_website_info_update');
			Route::post('/remove_profile_website', 'Backend\ProfileOtherInfosController@profile_website_remove')->name('remove_profile_website');
			//Profile Social media Info Edit
			Route::get('/profile_Social_media_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_social_media_info_edit')->name('profile_Social_media_info_edit');
			Route::post('/profile_Social_media_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_social_media_info_update')->name('profile_Social_media_info_update');
			Route::post('/remove_profile_Social_media', 'Backend\ProfileOtherInfosController@profile_social_media_remove')->name('remove_profile_Social_media');
			Route::post('/profile_Social_media_store', 'Backend\ProfileOtherInfosController@profile_Social_media_store')->name('profile_Social_media_store');
			// Route::post('/profile_Social_media_store/{id}', 'Backend\ProfileOtherInfosController@profile_Social_media_store')->name('profile_Social_media_store');

			//Personnels to Faculty
			Route::get('/personnels_to_faculty', 'Backend\PersonnelsToFacultyController@index')->name('manage_profile.personnels_to_faculty');
			Route::get('/personnels_to_faculty/add', 'Backend\PersonnelsToFacultyController@Add')->name('manage_profile.personnels_to_faculty.add');
			Route::post('/personnels_to_faculty/store', 'Backend\PersonnelsToFacultyController@Store')->name('manage_profile.personnels_to_faculty.store');
			Route::get('/personnels_to_faculty/view/{BupNo}', 'Backend\PersonnelsToFacultyController@viewSingleProfile')->name('manage_profile.personnels_to_faculty.view_single_profile');
			Route::get('/personnels_to_faculty/edit/{id}', 'Backend\PersonnelsToFacultyController@Edit')->name('manage_profile.personnels_to_faculty.edit');
			Route::post('/personnels_to_faculty/update/{id}', 'Backend\PersonnelsToFacultyController@Update')->name('manage_profile.personnels_to_faculty.update');
			Route::post('/personnels_to_faculty/delete', 'Backend\PersonnelsToFacultyController@Delete')->name('manage_profile.personnels_to_faculty.delete');

			Route::post('personnels_to_faculty/status_change', 'Backend\PersonnelsToFacultyController@status_change')->name('personnels_to_faculty.status_change');

			//Personnels to Office
			Route::get('/personnels_to_office', 'Backend\PersonnelsToOfficeController@index')->name('manage_profile.personnels_to_office');
			Route::get('/personnels_to_office/add', 'Backend\PersonnelsToOfficeController@Add')->name('manage_profile.personnels_to_office.add');
			Route::post('/personnels_to_office/store', 'Backend\PersonnelsToOfficeController@Store')->name('manage_profile.personnels_to_office.store');
			Route::get('/personnels_to_office/view/{BupNo}', 'Backend\PersonnelsToOfficeController@viewSingleProfile')->name('manage_profile.personnels_to_office.view_single_profile');
			Route::get('/personnels_to_office/edit/{id}', 'Backend\PersonnelsToOfficeController@Edit')->name('manage_profile.personnels_to_office.edit');
			Route::post('/personnels_to_office/update/{id}', 'Backend\PersonnelsToOfficeController@Update')->name('manage_profile.personnels_to_office.update');
			Route::post('/personnels_to_office/delete', 'Backend\PersonnelsToOfficeController@Delete')->name('manage_profile.personnels_to_office.delete');

			Route::post('personnels_to_office/status_change', 'Backend\PersonnelsToOfficeController@status_change')->name('personnels_to_office.status_change');

			//Numbers at a glance
			Route::get('/numbers_at_a_glance', 'Backend\AtAGlanceController@index')->name('manage_profile.numbers_at_a_glance');
			Route::post('/numbers_at_a_glance/store', 'Backend\AtAGlanceController@store')->name('manage_profile.numbers_at_a_glance.store');
			Route::post('/numbers_at_a_glance/update/{id}', 'Backend\AtAGlanceController@update')->name('manage_profile.numbers_at_a_glance.update');
		});

		Route::prefix('news')->group(function () {

			Route::get('/list', 'Backend\NewsController@index')->name('news.list');
			Route::get('/add', 'Backend\NewsController@add')->name('news.add');
			Route::post('/store', 'Backend\NewsController@store')->name('news.store');
			Route::get('/edit/{id}', 'Backend\NewsController@edit')->name('news.edit');
			Route::post('/update/{id}', 'Backend\NewsController@update')->name('news.update');
			Route::get('/delete', 'Backend\NewsController@delete')->name('news.delete');

			Route::get('news-event-notice/filter_news', 'Backend\NewsController@filterNews')->name('news.filter_news');
			Route::get('news-event-notice/filter_event', 'Backend\NewsController@filterEvent')->name('news.filter_event');
			Route::get('news-event-notice/filter_notice', 'Backend\NewsController@filterNotice')->name('news.filter_notice');
			Route::get('news-event-notice/filter_general_notice', 'Backend\NewsController@filterGeneralNotice')->name('news.filter_general_notice');
			Route::get('news-event-notice/filter_special_notice', 'Backend\NewsController@filterSpecialNotice')->name('news.filter_special_notice');
			Route::get('news-event-notice/filter_tender_notice', 'Backend\NewsController@filterTenderNotice')->name('news.filter_tender_notice');

			// On Going Research

			Route::get('ongoing_research', 'Backend\OngoingResearchController@index')->name('news.ongoing_research');
			Route::get('ongoing_research/add', 'Backend\OngoingResearchController@add')->name('news.ongoing_research.add');
			Route::post('ongoing_research/store', 'Backend\OngoingResearchController@store')->name('news.ongoing_research.store');
			Route::get('ongoing_research/edit/{id}', 'Backend\OngoingResearchController@edit')->name('news.ongoing_research.edit');
			Route::post('ongoing_research/update/{id}', 'Backend\OngoingResearchController@update')->name('news.ongoing_research.update');
			Route::get('ongoing_research/delete', 'Backend\OngoingResearchController@delete')->name('news.ongoing_research.delete');

			//Completed Research


			Route::get('completed_research', 'Backend\CompletedResearchController@index')->name('news.completed_research');
			Route::get('completed_research/add', 'Backend\CompletedResearchController@add')->name('news.completed_research.add');
			Route::post('completed_research/store', 'Backend\CompletedResearchController@store')->name('news.completed_research.store');
			Route::get('completed_research/edit/{id}', 'Backend\CompletedResearchController@edit')->name('news.completed_research.edit');
			Route::post('completed_research/update/{id}', 'Backend\CompletedResearchController@update')->name('news.completed_research.update');
			Route::get('completed_research/delete', 'Backend\CompletedResearchController@delete')->name('news.completed_research.delete');

			// news letter
			Route::get('news_letter/list', 'Backend\NewsletterController@index')->name('news.newsletter.list');
			Route::get('news_letter/add', 'Backend\NewsletterController@add')->name('news.newsletter.add');
			Route::post('news_letter/store', 'Backend\NewsletterController@store')->name('news.newsletter.store');
			Route::get('news_letter/edit/{id}', 'Backend\NewsletterController@edit')->name('news.newsletter.edit');
			Route::post('news_letter/update/{id}', 'Backend\NewsletterController@update')->name('news.newsletter.update');
			Route::post('news_letter/status_change', 'Backend\NewsletterController@status_change')->name('news.newsletter.status_change');


			// Magazine
			Route::get('magazine/list', 'Backend\MagazineController@index')->name('news.magazine.list');
			Route::get('magazine/add', 'Backend\MagazineController@add')->name('news.magazine.add');
			Route::post('magazine/store', 'Backend\MagazineController@store')->name('news.magazine.store');
			Route::get('magazine/edit/{id}', 'Backend\MagazineController@edit')->name('news.magazine.edit');
			Route::post('magazine/update/{id}', 'Backend\MagazineController@update')->name('news.magazine.update');
			Route::post('magazine/status_change', 'Backend\MagazineController@status_change')->name('news.magazine.status_change');


			//Journal Paper (Shafi - 3 Nov 2022)
			Route::get('journal/list', 'Backend\JournalController@index')->name('news.journal_paper.list');
			Route::get('journal/add', 'Backend\JournalController@add')->name('news.journal_paper.add');
			Route::post('journal/store', 'Backend\JournalController@store')->name('news.journal_paper.store');
			Route::get('journal/edit/{id}', 'Backend\JournalController@edit')->name('news.journal_paper.edit');
			Route::post('journal/update/{id}', 'Backend\JournalController@update')->name('news.journal_paper.update');

			// Route::get('delete','Backend\JournalController@delete')->name('journal_paper.delete');

		});

		// Develop by Mamun 6 september
		Route::prefix('regulatory_bodies')->group(function () {
			Route::get('/committee-member-setup', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@index')->name('regulatory_bodies.committe.member.setup');
			Route::get('/committee-type-create', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@create')->name('regulatory_bodies.committe.type.create');
			Route::post('/committee-type-store', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@store')->name('regulatory_bodies.committe.type.store');
			Route::get('/committee-type-edit/{id}', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@edit')->name('regulatory_bodies.committe.type.edit');
			Route::post('/committee-type-update/{id}', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@update')->name('regulatory_bodies.committe.type.update');

			Route::get('/committee-member', 'Backend\RegulatoryBody\CommitteeController@index')->name('regulatory_bodies.senate.committee.member');
			Route::get('/committee-member/add', 'Backend\RegulatoryBody\CommitteeController@create')->name('regulatory_bodies.senate.committee.member.add');
			Route::post('/committee-member/store', 'Backend\RegulatoryBody\CommitteeController@store')->name('regulatory_bodies.senate.committee.member.store');
			Route::get('/committee-member/edit/{id}', 'Backend\RegulatoryBody\CommitteeController@edit')->name('regulatory_bodies.senate.committee.member.edit');
			Route::post('/committee-member/update/{id}', 'Backend\RegulatoryBody\CommitteeController@update')->name('regulatory_bodies.senate.committee.member.update');

			Route::post('/member/status/{id}', 'Backend\RegulatoryBody\CommitteeController@statusChange')->name('member.status.change');


			// Route::get('/senate-committee-member', 'Backend\SenateCommitteeController@index')->name('regulatory_bodies.senate.committee.member');
			// Route::get('/senate-committee-member/add', 'Backend\SenateCommitteeController@create')->name('regulatory_bodies.senate.committee.member.add');
			// Route::post('/senate-committee-member/store', 'Backend\SenateCommitteeController@store')->name('regulatory_bodies.senate.committee.member.store');
			// Route::get('/senate-committee-member/edit/{id}', 'Backend\SenateCommitteeController@edit')->name('regulatory_bodies.senate.committee.member.edit');
			// Route::post('/senate-committee-member/update/{id}', 'Backend\SenateCommitteeController@update')->name('regulatory_bodies.senate.committee.member.update');

			// Route::post('/member/status/{id}','Backend\SenateCommitteeController@statusChange')->name('member.status.change');

			Route::get('/syndicate-committee-member', 'Backend\SyndicateCommitteeMemberController@index')->name('syndicate.committee.member');
			Route::get('/syndicate-committee-member/add', 'Backend\SyndicateCommitteeMemberController@create')->name('syndicate.committee.member.add');
			Route::post('/syndicate-committee-member/store', 'Backend\SyndicateCommitteeMemberController@store')->name('syndicate.committee.member.store');
			Route::get('/syndicate-committee-member/edit/{id}', 'Backend\SyndicateCommitteeMemberController@edit')->name('syndicate.committee.member.edit');
			Route::post('/syndicate-committee-member/update/{id}', 'Backend\SyndicateCommitteeMemberController@update')->name('syndicate.committee.member.update');

			Route::get('/academic-council-member', 'Backend\AcademicCommitteeMemberController@index')->name('academic.committee.member');
			Route::get('/academic-council-member/add', 'Backend\AcademicCommitteeMemberController@create')->name('academic.committee.member.add');
			Route::post('/academic-council-member/store', 'Backend\AcademicCommitteeMemberController@store')->name('academic.committee.member.store');
			Route::get('/academic-council-member/edit/{id}', 'Backend\AcademicCommitteeMemberController@edit')->name('academic.committee.member.edit');
			Route::post('/academic-council-member/update/{id}', 'Backend\AcademicCommitteeMemberController@update')->name('academic.committee.member.update');


			Route::get('/finance-committee-member', 'Backend\FinanceCommitteeMemberController@index')->name('finance.committee.member');
			Route::get('/finance-committee-member/add', 'Backend\FinanceCommitteeMemberController@create')->name('finance.committee.member.add');
			Route::post('/academic-committee-member/store', 'Backend\FinanceCommitteeMemberController@store')->name('finance.committee.member.store');
			Route::get('/finance-committee-member/edit/{id}', 'Backend\FinanceCommitteeMemberController@edit')->name('finance.committee.member.edit');
			Route::post('/finance-committee-member/update/{id}', 'Backend\FinanceCommitteeMemberController@update')->name('finance.committee.member.update');
		});
		// Develop by Mamun 7 september
		Route::prefix('club')->group(function () {

			Route::get('/event/list/{id}', 'Backend\ClubController@club_event_list')->name('club.events.list');
			Route::get('/list', 'Backend\ClubController@index')->name('club.list');
			Route::get('/new-add', 'Backend\ClubController@create')->name('club.add');
			Route::post('/club-store', 'Backend\ClubController@store')->name('club.store');
			Route::get('/club-edit/club_id={id}', 'Backend\ClubController@edit')->name('club.edit');
			Route::post('/club-update/{id}', 'Backend\ClubController@update')->name('club.update');
			Route::get('/club-delete', 'Backend\ClubController@delete')->name('club.delete');

			Route::get('/get-department/{id}', 'Backend\ClubController@getDepartment')->name('get-department');

			// add club-member
			Route::prefix('member')->group(function () {
				Route::get('/list', 'Backend\ClubMemberController@index')->name('club.member.list');
				Route::get('/list/without/club', 'Backend\ClubMemberController@member_list');
				Route::get('/add', 'Backend\ClubMemberController@create')->name('club.member.add');
				Route::post('/store', 'Backend\ClubMemberController@store')->name('club.member.store');
				Route::get('/edit/{id}', 'Backend\ClubMemberController@edit')->name('club.member.edit');
				Route::post('/update/{id}', 'Backend\ClubMemberController@update')->name('club.member.update');

				Route::get('/assign-to-club', 'Backend\ClubMemberController@assignToClub')->name('club.assign.to.club');
				Route::post('/assign-to-club', 'Backend\ClubMemberController@memberAssignToClub')->name('club.member.assign.to.club');
			});


			// Route::post('/store', 'Backend\ClubMemberController@store')->name('member.store');
			// Route::get('/edit/club_id={id}', 'Backend\EventController@edit')->name('event.edit');
			// Route::post('/update/{id}', 'Backend\EventController@update')->name('event.update');
			// Route::get('/delete', 'Backend\EventController@delete')->name('event.delete');

		});

		Route::prefix('financial-aid')->group(function () {
			Route::get('edit/', 'Backend\FinancialAidController@edit')->name('financial-aid.edit');
			Route::post('update/{id}', 'Backend\FinancialAidController@update')->name('financial-aid.update');
		});

		Route::prefix('lab-center')->group(function () {

			Route::get('list', 'Backend\LabCenterController@index')->name('lab-center.list');
			Route::get('add', 'Backend\LabCenterController@addlab')->name('lab-center.add');
			Route::post('store', 'Backend\LabCenterController@store')->name('lab-center.store');
			Route::get('edit/{id}', 'Backend\LabCenterController@edit')->name('lab-center.edit');
			Route::post('update/{id}', 'Backend\LabCenterController@update')->name('lab-center.update');
			Route::post('status_change', 'Backend\LabCenterController@status_change')->name('lab-center.status_change');
		});

		Route::prefix('dean-office')->group(function () {
			// Dean's Office
			Route::get('list', 'Backend\DeanInformationController@index')->name('dean-office.information');
			Route::get('add', 'Backend\DeanInformationController@add')->name('dean-office.add');
			Route::post('store', 'Backend\DeanInformationController@store')->name('dean-office.store');
			Route::get('edit/{id}', 'Backend\DeanInformationController@edit')->name('dean-office.edit');
			Route::post('update/{id}', 'Backend\DeanInformationController@update')->name('dean-office.update');
			Route::post('status_change', 'Backend\DeanInformationController@status_change')->name('dean-office.status_change');
			// Dean's Staff List
			Route::get('/staff_list/{id}', 'Backend\DeanStaffListController@index')->name('dean-office.staff_list');
			Route::get('/staff_list/add/{id}', 'Backend\DeanStaffListController@add')->name('dean-office.staff_list.add');
			Route::post('/staff_list/store', 'Backend\DeanStaffListController@store')->name('dean-office.staff_list.store');
			Route::get('/staff_list/edit/{id}/{dean_information_id}', 'Backend\DeanStaffListController@edit')->name('dean-office.staff_list.edit');
			Route::post('/staff_list/update/{id}', 'Backend\DeanStaffListController@update')->name('dean-office.staff_list.update');
			// Dean's Honor Board
			Route::get('honor_board/list', 'Backend\DeanHonorBoardController@index')->name('dean-office.honor_board.list');
			Route::get('honor_board/add', 'Backend\DeanHonorBoardController@add')->name('dean-office.honor_board.add');
			Route::post('honor_board/store', 'Backend\DeanHonorBoardController@store')->name('dean-office.honor_board.store');
			Route::get('honor_board/edit/{id}', 'Backend\DeanHonorBoardController@edit')->name('dean-office.honor_board.edit');
			Route::post('honor_board/update/{id}', 'Backend\DeanHonorBoardController@update')->name('dean-office.honor_board.update');
			Route::post('honor_board/status_change', 'Backend\DeanHonorBoardController@status_change')->name('dean-office.honor_board.status_change');
		});

		// Transport (Shafi - 3 Nov 2022)
		Route::prefix('transport')->group(function () {
			// University Transport

			Route::get('/route_list', 'Backend\TransportController@index')->name('transport.list');
			Route::get('/route_create', 'Backend\TransportController@create')->name('transport.create');
			Route::post('/route_store', 'Backend\TransportController@store')->name('transport.store');
			Route::get('/route_edit/{id}', 'Backend\TransportController@edit')->name('transport.edit');
			Route::post('/route_update/{id}', 'Backend\TransportController@update')->name('transport.update');
			Route::get('/route_delete/{id}', 'Backend\TransportController@delete')->name('transport.delete');

			// Transport Time
			Route::get('/route_time/{id}', 'Backend\RouteTimeController@index')->name('route.time.list');
			Route::get('/route_time_create/{id}', 'Backend\RouteTimeController@create')->name('route.time.create');
			Route::post('/route_time_store', 'Backend\RouteTimeController@store')->name('route.time.store');
			Route::get('/route_time_edit/{id}', 'Backend\RouteTimeController@edit')->name('route.time.edit');
			Route::post('/route_time_update/{id}', 'Backend\RouteTimeController@update')->name('route.time.update');
			Route::get('/route_time_delete/{id}', 'Backend\RouteTimeController@delete')->name('route.time.delete');
		});


		Route::prefix('noc')->group(function () {

			Route::get('list', 'Backend\NocController@index')->name('noc.list');
			Route::get('add', 'Backend\NocController@add_noc')->name('noc.add');
			Route::post('store', 'Backend\NocController@store')->name('noc.store');
			Route::get('edit/{id}', 'Backend\NocController@edit')->name('noc.edit');
			Route::post('update/{id}', 'Backend\NocController@update')->name('noc.update');
			Route::post('status_change', 'Backend\NocController@status_change')->name('noc.status_change');
			Route::get('category-wise-deptOrOffice', 'Backend\NocController@categoryWiseDeptOrOffice')->name('category_wise_deptOrOffice');
			Route::get('member-wise-designation', 'Backend\NocController@MemberWiseDesignation')->name('member_wise_designation');
			Route::get('department-wise-member', 'Backend\NocController@departmentWiseMember')->name('department_wise_member');
			Route::get('office-wise-member', 'Backend\NocController@officeWiseMember')->name('office_wise_member');
		});
		Route::prefix('landing-modal')->group(function () {

			Route::get('list', 'Backend\LandingModalController@index')->name('landing-modal.modal_list');
			Route::get('add', 'Backend\LandingModalController@addmodal')->name('landing-modal.add');
			Route::post('store', 'Backend\LandingModalController@store')->name('landing-modal.store');
			Route::get('edit/{id}', 'Backend\LandingModalController@edit')->name('landing-modal.edit');
			Route::post('update/{id}', 'Backend\LandingModalController@update')->name('landing-modal.update');
			Route::post('status_change', 'Backend\LandingModalController@status_change')->name('landing-modal.status_change');
		});

		Route::prefix('cpc')->group(function () {
			Route::get('view', 'Backend\CpcController@view')->name('cpc.view');
			Route::get('add', 'Backend\CpcController@add')->name('cpc.add');
			Route::post('store', 'Backend\CpcController@store')->name('cpc.store');
			Route::get('event/list/{id}', 'Backend\CpcController@eventList')->name('cpc.event.list');
			Route::get('news/list/{id}', 'Backend\CpcController@newstList')->name('cpc.news.list');

			// cpc section
			Route::get('section/{id}', 'Backend\CpcController@cpcSectionList')->name('cpc.section');
			// Route::get('section','Backend\CpcController@sectionAdd')->name('cpc.section');
			Route::post('cpc-section', 'Backend\CpcController@sectionStore')->name('cpc.section.store');
			Route::get('cpc-section-edit/{id}', 'Backend\CpcController@sectionEdit')->name('cpc.section.edit');
			Route::post('cpc-section-update/{id}', 'Backend\CpcController@updateCpcSection')->name('cpc.section.update');

			Route::get('cpc-team', 'Backend\CpcController@ourTeam')->name('cpc.section.ourteam');

			Route::get('cpc-resource-people-list/{cpc_id}', 'Backend\CpcController@resourceList')->name('cpc.section.people.list');
			Route::get('cpc-resource-people/{cpc_id}', 'Backend\CpcController@resourcePeople')->name('cpc.section.people');
			Route::post('cpc-resource-people-store', 'Backend\CpcController@resourceStore')->name('cpc.resource.perople.store');

			Route::get('cpc-section-faq-list/{cpc_id}', 'Backend\CpcController@cpcFaqList')->name('cpc.section.faq.list');
			Route::get('cpc-section-faq/{cpc_id}', 'Backend\CpcController@cpcFaq')->name('cpc.section.faq');
			Route::post('cpc-faq-store', 'Backend\CpcController@cpcfaqStore')->name('cpc.faq.store');
			// Route::get('cpc-section-contact/{cpc_id}','Backend\CpcController@cpcFaq')->name('cpc.section.faq');

			Route::get('cpc-contact-list/{cpc_id}', 'Backend\CpcController@cpcContactList')->name('cpc.contact.list');
			Route::get('cpc-contact/{cpc_id}', 'Backend\CpcController@cpcContact')->name('cpc.contact');
			Route::post('cpc-contact-store', 'Backend\CpcController@cpcContactStore')->name('cpc.contact.store');
		});

		Route::prefix('special_achievement')->group(function () {
			//News
			Route::get('/list', 'Backend\SpecialAchievementController@index')->name('special_achievement.list');
			Route::get('/add', 'Backend\SpecialAchievementController@add')->name('special_achievement.add');
			Route::post('/store', 'Backend\SpecialAchievementController@store')->name('special_achievement.store');
			Route::get('/edit/{id}', 'Backend\SpecialAchievementController@edit')->name('special_achievement.edit');
			Route::post('/update/{id}', 'Backend\SpecialAchievementController@update')->name('special_achievement.update');
			Route::get('/delete', 'Backend\SpecialAchievementController@delete')->name('special_achievement.delete');

			Route::get('achievement/filter_student', 'Backend\SpecialAchievementController@filterStudent')->name('special_achievement.filter_student');
			Route::get('achievement/filter_teacher', 'Backend\SpecialAchievementController@filterTeacher')->name('special_achievement.filter_teacher');
			Route::get('achievement/filter_organization', 'Backend\SpecialAchievementController@filterOrganization')->name('special_achievement.filter_organization');
		});


		// On Campus Facilities

		Route::prefix('on-campus')->group(function () {
			Route::get('facilities', 'Backend\OnCampusFacilitesController@FacilityList')->name('facilities');
			Route::get('facility-edit/{id}', 'Backend\OnCampusFacilitesController@FacilityEdit')->name('on.campus.facility');
			Route::post('facility-update/{id}', 'Backend\OnCampusFacilitesController@FacilityUpdate')->name('on.campus.update');
		});

		Route::prefix('site-settings')->group(function () {
			//Slider
			Route::get('slider/{slider_master_id}', 'Backend\SliderController@index')->name('site-setting.slider')->where('slider_master_id', '[0-9]+');
			Route::get('slider/add/{slider_master_id}', 'Backend\SliderController@addSlider')->name('site-setting.slider.add');
			Route::post('slider/store', 'Backend\SliderController@storeSlider')->name('site-setting.slider.store');
			Route::get('slider/edit/{slider_master_id}/{id}', 'Backend\SliderController@editSlider')->name('site-setting.slider.edit');
			Route::post('slider/update/{id}', 'Backend\SliderController@updateSlider')->name('site-setting.slider.update');
			Route::get('slider/delete', 'Backend\SliderController@deleteSlider')->name('site-setting.slider.delete');
			//Slider Video
			Route::post('slider/store/video', 'SliderController@storeSliderVideo')->name('site-setting.slider.store_video');

			//Slider Master
			Route::get('slider-master', 'Backend\SliderMasterController@index')->name('site-setting.slider-master');
			Route::get('slider-master/add', 'Backend\SliderMasterController@add')->name('site-setting.slider-master.add');
			Route::post('slider-master/store', 'Backend\SliderMasterController@store')->name('site-setting.slider-master.store');
			Route::get('slider-master/edit/{id}', 'Backend\SliderMasterController@edit')->name('site-setting.slider-master.edit');
			Route::post('slider-master/update/{id}', 'Backend\SliderMasterController@update')->name('site-setting.slider-master.update');
			Route::get('slider-master/delete', 'Backend\SliderMasterController@delete')->name('site-setting.slider-master.delete');

			//Banner
			Route::get('banner', 'Backend\BannerController@index')->name('site-setting.banner');
			Route::get('banner/add', 'Backend\BannerController@add')->name('site-setting.banner.add');
			Route::post('banner/store', 'Backend\BannerController@store')->name('site-setting.banner.store');
			Route::get('banner/edit/{id}', 'Backend\BannerController@edit')->name('site-setting.banner.edit');
			Route::post('banner/update/{id}', 'Backend\BannerController@update')->name('site-setting.banner.update');
			Route::post('banner/delete', 'Backend\BannerController@delete')->name('site-setting.banner.delete');

			// Study Leave

			Route::get('/leave', 'Backend\StudyLeaveController@index')->name('manage_leave');
			Route::get('/leave/add', 'Backend\StudyLeaveController@add')->name('manage_leave.add');
			Route::post('/leave/store', 'Backend\StudyLeaveController@store')->name('manage_leave.store');
			Route::get('/leave/edit/{id}', 'Backend\StudyLeaveController@edit')->name('manage_leave.edit');
			Route::post('/leave/update/{id}', 'Backend\StudyLeaveController@update')->name('manage_leave.update');
			Route::post('/leave/delete', 'Backend\StudyLeaveController@delete')->name('manage_leave.delete');

			//designation
			Route::get('/designation', 'DesignationController@index')->name('user.designation');
			Route::get('/designation/add', 'DesignationController@add')->name('user.designation.add');
			Route::post('/designation/store', 'DesignationController@store')->name('user.designation.store');
			Route::get('/designation/edit/{id}', 'DesignationController@edit')->name('user.designation.edit');
			Route::post('/designation/update/{id}', 'DesignationController@update')->name('user.designation.update');
			Route::post('/designation/delete', 'DesignationController@delete')->name('user.designation.delete');
		});

		Route::prefix('chsr')->group(function () {
			Route::get('/view', 'Backend\Chsr\AboutChsrController@aboutView')->name('chsr.view');
			// Route::get('/vision', 'Backend\Chsr\AboutChsrController@vision')->name('chsr.vision');
			// Route::get('/mission', 'Backend\Chsr\AboutChsrController@mission')->name('chsr.mission');
			// Route::get('/goal', 'Backend\Chsr\AboutChsrController@goal')->name('chsr.goal');
			// Route::get('/organogram', 'Backend\Chsr\AboutChsrController@organogram')->name('chsr.organogram');
			// Route::get('/contact', 'Backend\Chsr\AboutChsrController@organogram')->name('chsr.contact');

			Route::get('/faq-tt', 'Backend\Chsr\AboutChsrController@faq')->name('chsr.faq');
			Route::get('/faq/create', 'Backend\Chsr\AboutChsrController@create')->name('chsr.faq.create');
			Route::post('/faq/store', 'Backend\Chsr\AboutChsrController@store')->name('chsr.faq.store');
			Route::post('/faq/update', 'Backend\Chsr\AboutChsrController@update')->name('chsr.faq.update');

			Route::get('/chsr-edit/{id}', 'Backend\Chsr\AboutChsrController@editChsr')->name('chsr.edit');
			Route::post('/chsr-update/{id}', 'Backend\Chsr\AboutChsrController@updateChsr')->name('chsr.update');

			Route::get('office/view', 'Backend\Chsr\ChsrOfficeController@index')->name('chsr.about.office');
			Route::get('office/add', 'Backend\Chsr\ChsrOfficeController@create')->name('chsr.about.create');
			Route::post('office/store', 'Backend\Chsr\ChsrOfficeController@store')->name('chsr.about.store');
			Route::get('office/edit/{id}', 'Backend\Chsr\ChsrOfficeController@edit')->name('chsr.about.edit');
			Route::post('office/update/{id}', 'Backend\Chsr\ChsrOfficeController@update')->name('chsr.about.update');
			Route::get('office/profile_wise_rank', 'Backend\Chsr\ChsrOfficeController@profileWiseRank')->name('profile_wise_rank');

			Route::get('office/dean-lists', 'Backend\Chsr\ChsrOfficeController@deanList')->name('chsr.dean.list');
			Route::get('office/director-lists', 'Backend\Chsr\ChsrOfficeController@directorList')->name('chsr.director.list');
			Route::get('office/deputy-director-lists', 'Backend\Chsr\ChsrOfficeController@deputyDirectorList')->name('chsr.deputy.director.list');
			Route::get('office/assistant-director-lists', 'Backend\Chsr\ChsrOfficeController@assistantDirectorList')->name('chsr.assistant.director.list');
			Route::get('office/officer-lists', 'Backend\Chsr\ChsrOfficeController@officerList')->name('chsr.officer.list');

			Route::get('program/list', 'Backend\Chsr\ChsrProgramController@index')->name('chsr.programs');
			Route::get('program/add', 'Backend\Chsr\ChsrProgramController@create')->name('chsr.program.create');

			Route::get('researcher/lists', 'Backend\Chsr\ChsrResearcherController@index')->name('chsr.researcher.list');
			Route::get('researcher/add', 'Backend\Chsr\ChsrResearcherController@create')->name('chsr.researcher.create');
			Route::post('researcher/store', 'Backend\Chsr\ChsrResearcherController@store')->name('chsr.researcher.store');
			Route::get('researcher/edit/{id}', 'Backend\Chsr\ChsrResearcherController@edit')->name('chsr.researcher.edit');
			Route::get('researcher/update/{id}', 'Backend\Chsr\ChsrResearcherController@update')->name('chsr.researcher.update');
			Route::get('researcher/view/{id}', 'Backend\Chsr\ChsrResearcherController@viewSingle')->name('chsr.researcher.view');

			Route::get('/category_wise_program', 'Backend\Chsr\ChsrResearcherController@categoryWiseProgram')->name('category_wise_program');

			Route::get('supervisor/lists', 'Backend\Chsr\ChsrSupervisorController@index')->name('chsr.supervisor.list');
			Route::get('supervisor/add', 'Backend\Chsr\ChsrSupervisorController@create')->name('chsr.supervisor.create');
			Route::post('supervisor/store', 'Backend\Chsr\ChsrSupervisorController@store')->name('chsr.supervisor.store');
			Route::get('supervisor/edit/{id}', 'Backend\Chsr\ChsrSupervisorController@edit')->name('chsr.supervisor.edit');
			Route::post('supervisor/update/{id}', 'Backend\Chsr\ChsrSupervisorController@update')->name('chsr.supervisor.update');
			Route::post('supervisor/delete', 'Backend\Chsr\ChsrSupervisorController@delete')->name('chsr.supervisor.delete');

			Route::get('research-project/lists', 'Backend\Chsr\ChsrResearcherController@projectList')->name('chsr.research.project.list');

			Route::get('/faq/lists', 'Backend\Chsr\ChsrFaqController@faqList')->name('chsr.faq.list');

			Route::get('/admission/requirements', 'Backend\Chsr\ChsrProgramAdmissionRequirementController@create')->name('chsr.admission.requirements');
			Route::post('/admission/requirements/store', 'Backend\Chsr\ChsrProgramAdmissionRequirementController@store')->name('chsr.admission.requirements.store');
		});

		Route::get('/view-home-link', 'Backend\HomeLinkController@viewHomeLink')->name('home_link');
		Route::get('/add-home-link', 'Backend\HomeLinkController@addHomeLink')->name('home_link.add');
		Route::post('/store-home-link', 'Backend\HomeLinkController@storeHomeLink')->name('home_link.store');
		Route::get('/edit-home-link/{id}', 'Backend\HomeLinkController@editHomeLink')->name('home_link.edit');
		Route::post('/update-home-link/{id}', 'Backend\HomeLinkController@updateHomeLink')->name('home_link.update');
		Route::post('/delete-home-link', 'Backend\HomeLinkController@deleteHomeLink')->name('home_link.delete');

		// manage events
		Route::get('/event', 'Backend\EventController@index')->name('event.list');
		Route::get('/add', 'Backend\EventController@create')->name('event.add');
		Route::post('/store', 'Backend\EventController@store')->name('event.store');
		Route::get('/edit/club_id={id}', 'Backend\EventController@edit')->name('event.edit');
		Route::post('/update/{id}', 'Backend\EventController@update')->name('event.update');
		Route::get('/delete', 'Backend\EventController@delete')->name('event.delete');
	});


	Route::prefix('procurements')->group(function () {
		Route::get('/procurement', 'ProcurementController@index')->name('manage_procurement');
		Route::get('/procurement/add', 'ProcurementController@add')->name('manage_procurement.add');
		Route::get('/procurement/add/{id}', 'ProcurementController@add')->name('manage_procurement.add');
		Route::post('/procurement/store', 'ProcurementController@store')->name('manage_procurement.store');
		Route::get('/procurement/delete/{id}', 'ProcurementController@delete')->name('manage_procurement.delete');
	});



	Route::prefix('iqac')->group(function () {

		Route::get('/workshop_seminar', 'TrainingWorkShopSeminarController@index')->name('manage_workshop_seminar');
		Route::get('/workshop_seminar/add', 'TrainingWorkShopSeminarController@add')->name('manage_workshop_seminar.add');
		Route::post('/workshop_seminar/store', 'TrainingWorkShopSeminarController@store')->name('manage_workshop_seminar.store');
		Route::get('/workshop_seminar/edit/{id}', 'TrainingWorkShopSeminarController@edit')->name('manage_workshop_seminar.edit');
		Route::post('/workshop_seminar/update/{id}', 'TrainingWorkShopSeminarController@update')->name('manage_workshop_seminar.update');
		Route::post('/workshop_seminar/delete', 'TrainingWorkShopSeminarController@delete')->name('manage_workshop_seminar.delete');

		Route::get('/document', 'DocumentController@index')->name('manage_document');
		Route::get('/document/add', 'DocumentController@add')->name('manage_document.add');
		Route::post('/document/store', 'DocumentController@store')->name('manage_document.store');
		Route::get('/document/edit/{id}', 'DocumentController@edit')->name('manage_document.edit');
		Route::post('/document/update/{id}', 'DocumentController@update')->name('manage_document.update');
		Route::get('/document/delete', 'DocumentController@delete')->name('manage_document.delete');

		Route::get('/team', 'TeamController@index')->name('manage_team');
		Route::get('/team/add', 'TeamController@add')->name('manage_team.add');
		Route::post('/team/store', 'TeamController@store')->name('manage_team.store');
		Route::get('/team/edit/{id}', 'TeamController@edit')->name('manage_team.edit');
		Route::post('/team/update/{id}', 'TeamController@update')->name('manage_team.update');
		Route::get('/team/delete', 'TeamController@delete')->name('manage_team.delete');

		Route::get('/iqac_about', 'IqacAboutController@index')->name('manage_iqac_about');
		Route::get('/iqac_about/add', 'IqacAboutController@add')->name('manage_iqac_about.add');
		Route::post('/iqac_about/store', 'IqacAboutController@store')->name('manage_iqac_about.store');
		Route::get('/iqac_about/edit/{id}', 'IqacAboutController@edit')->name('manage_iqac_about.edit');
		Route::post('/iqac_about/update/{id}', 'IqacAboutController@update')->name('manage_iqac_about.update');
		Route::post('/iqac_about/delete', 'IqacAboutController@delete')->name('manage_iqac_about.delete');
	});

	Route::prefix('project_mananement')->group(function () {
		Route::get('news-event-notice', 'NewsController@index')->name('site-setting.news');
		Route::get('news-event-notice/add', 'NewsController@addNews')->name('site-setting.news.add');
		Route::post('news-event-notice/store', 'NewsController@storeNews')->name('site-setting.news.store');
		Route::get('news-event-notice/edit/{id}', 'NewsController@editNews')->name('site-setting.news.edit');
		Route::post('news-event-notice/update/{id}', 'NewsController@updateNews')->name('site-setting.news.update');
		Route::get('news-event-notice/delete', 'NewsController@deleteNews')->name('site-setting.news.delete');

		Route::get('news-event-notice/filter_news', 'NewsController@filterNews')->name('site-setting.news.filter_news');
		Route::get('news-event-notice/filter_event', 'NewsController@filterEvent')->name('site-setting.news.filter_event');
		Route::get('news-event-notice/filter_notice', 'NewsController@filterNotice')->name('site-setting.news.filter_notice');
		Route::get('news-event-notice/filter_press_release', 'NewsController@filterPressRelease')->name('site-setting.news.filter_press_release');
		Route::get('news-event-notice/filter_general_notice', 'NewsController@filterGeneralNotice')->name('site-setting.news.filter_general_notice');
		Route::get('news-event-notice/filter_special_notice', 'NewsController@filterSpecialNotice')->name('site-setting.news.filter_special_notice');
		Route::get('news-event-notice/filter_tender_notice', 'NewsController@filterTenderNotice')->name('site-setting.news.filter_tender_notice');
	});

	Route::prefix('oefcd')->group(function () {
		Route::get('/view', 'Backend\OEFCDController@index')->name('oefcd.index');
		Route::get('/training-list', 'Backend\TrainingController@index')->name('oefcd.staff.training.list');
		Route::get('/training/create', 'Backend\TrainingController@create')->name('oefcd.staff.training.create');
		Route::post('/training/store', 'Backend\TrainingController@store')->name('oefcd.staff.training.store');
		Route::get('/training/edit/{id}', 'Backend\TrainingController@edit')->name('oefcd.staff.training.edit');
		Route::post('/training/update/{id}', 'Backend\TrainingController@update')->name('oefcd.staff.training.update');

		Route::get('/training-event/trainer-list/{id}', 'Backend\TrainingEventController@index')->name('oefcd.staff.training_event.trainer_list');
		Route::get('/trainer/trainer-create/{id}', 'Backend\TrainingEventController@trainer_create')->name('oefcd.staff.trainer.trainer_create');
		Route::post('/trainer/trainer-store', 'Backend\TrainingEventController@trainer_store')->name('oefcd.staff.trainer.trainer_store');

		Route::get('/trainer/trainer-edit/{id}', 'Backend\TrainingEventController@trainer_edit')->name('oefcd.staff.trainer.trainer_edit');
		Route::post('/trainer/trainer-update/{id}', 'Backend\TrainingEventController@trainer_update')->name('oefcd.staff.trainer.trainer_update');

		Route::get('/trainer/trainee-edit/{id}', 'Backend\TrainingEventController@trainee_edit')->name('oefcd.staff.trainee.trainee_edit');
		Route::post('/training_event/trainee-update/{id}', 'Backend\TrainingEventController@trainee_update')->name('oefcd.staff.training_event.trainee_update');

		Route::get('/training-event/trainee-list/{id}', 'Backend\TrainingEventController@trainee_index')->name('oefcd.staff.training_event.trainee_list');
		Route::get('/training-event/trainee-create/{id}', 'Backend\TrainingEventController@trainee_create')->name('oefcd.staff.training_event.trainee_create');
		Route::post('/training-event/trainee-store', 'Backend\TrainingEventController@trainee_store')->name('oefcd.staff.training_event.trainee_store');
		// Route::get('/trainer-list','Backend\OEFCDController@trainerList')->name('oefcd.staff.trainer.list');
		// Route::get('/trainer/create','Backend\OEFCDController@create')->name('oefcd.staff.trainer.create');
		// Route::post('/trainer/store','Backend\OEFCDController@store')->name('oefcd.staff.trainer.store');

		//international.affair
		Route::get('/about/international_affair', 'Backend\OEFCDController@aboutInternationalAffair')->name('international.affair.about');
		Route::post('/about/international_affair/update/{id}', 'Backend\OEFCDController@aboutInternationalAffairUpdate')->name('international.affair.update');
		Route::get('/international_affair', 'Backend\OEFCDController@internationalAffair')->name('international.affair');
		Route::get('/post/list', 'Backend\OEFCDController@postList')->name('post.list');
		Route::get('/contact', 'Backend\OEFCDController@contact')->name('international_affairs.contact');
		Route::post('/contact-update', 'Backend\OEFCDController@contactUpdate')->name('international_affairs.contact.update');

		//Faculty development program

		Route::get('/faculty/development_program', 'Backend\OEFCDController@development_program')->name('development_program');
		Route::post('/faculty/development_program/update/{id}', 'Backend\OEFCDController@development_program_update')->name('development_program.update');


		Route::get('/trainer-list', 'Backend\OEFCDController@trainerList')->name('oefcd.staff.trainer.list');
		Route::get('/trainer/create', 'Backend\OEFCDController@create')->name('oefcd.staff.trainer.create');
		Route::post('/trainer/store', 'Backend\OEFCDController@store')->name('oefcd.staff.trainer.store');
		Route::get('/trainer/edit/{id}', 'Backend\OEFCDController@edit')->name('oefcd.staff.trainer.edit');
		Route::post('/trainer/update/{id}', 'Backend\OEFCDController@update')->name('oefcd.staff.trainer.update');
	});

	Route::prefix('blog')->group(function () {
		Route::get('/view', 'Backend\BlogController@index')->name('blog.index');
		Route::get('/create', 'Backend\BlogController@create')->name('blog.create');
		Route::post('/store', 'Backend\BlogController@store')->name('blog.store');
		Route::get('/edit/{id}', 'Backend\BlogController@edit')->name('blog.edit');
		Route::post('/update/{id}', 'Backend\BlogController@update')->name('blog.update');
		Route::post('/delete', 'Backend\BlogController@delete')->name('blog.delete');
	});
	Route::prefix('bangabandhu_chair')->group(function () {
		Route::get('about/view', 'Backend\BangabandhuChair\BangabandhuChairAboutController@index')->name('bangabandhu_chair.about');
		Route::post('about/store', 'Backend\BangabandhuChair\BangabandhuChairAboutController@store')->name('bangabandhu_chair.about.store');
		Route::post('about/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairAboutController@update')->name('bangabandhu_chair.about.update');
		// });
		// Route::prefix('bangabandhu-chair-quote')->group(function() {
		Route::get('quote/view', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@index')->name('bangabandhu_chair.quote');
		Route::get('quote/create', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@create')->name('bangabandhu_chair.quote.create');
		Route::post('quote/store', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@store')->name('bangabandhu_chair.quote.store');
		Route::get('quote/edit/{id}', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@edit')->name('bangabandhu_chair.quote.edit');
		Route::post('quote/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@update')->name('bangabandhu_chair.quote.update');
		Route::post('quote/delete', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@delete')->name('bangabandhu_chair.quote.delete');
		//});
		// Route::prefix('bangabandhu-chair-researcher')->group(function() {
		Route::get('researcher/view', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@index')->name('bangabandhu_chair.researcher');
		Route::get('researcher/create', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@create')->name('bangabandhu_chair.researcher.create');
		Route::post('researcher/store', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@store')->name('bangabandhu_chair.researcher.store');
		Route::get('researcher/edit/{id}', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@edit')->name('bangabandhu_chair.researcher.edit');
		Route::post('researcher/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@update')->name('bangabandhu_chair.researcher.update');
		Route::post('researcher/delete', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@delete')->name('bangabandhu_chair.researcher.delete');
	});
	Route::get('bangabandhu-chair-research-list', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@researchList')->name('bangabandhu_chair.research.list');

	//Message
	Route::prefix('message')->group(function () {
		Route::get('view', 'Backend\MessageController@index')->name('message');
		Route::get('add', 'Backend\MessageController@add')->name('message.add');
		Route::post('store', 'Backend\MessageController@store')->name('message.store');
		Route::get('edit/{id}', 'Backend\MessageController@edit')->name('message.edit');
		Route::post('update/{id}', 'Backend\MessageController@update')->name('message.update');
		Route::post('delete', 'Backend\MessageController@destroy')->name('message.delete');
	});
	Route::get('type-wise-category', 'Backend\MessageController@typeWiseCategory')->name('type_wise_category');
	Route::get('category-wise-head', 'Backend\MessageController@categoryWiseHead')->name('category_wise_head');
});

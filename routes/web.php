<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    HomeController,
    UserController,
    HimmahStoreController as HimmahStore,

    ShopUserController,
};

use App\Http\Controllers\Manage\{
    CategoryController,
    PaketUmrohController,
    CompanyProfile as ManageCompanyProfile,
    CompassController as ManageCompassController,
    ProductController
};


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



Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::prefix('home')->group(function () {

    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/konten', [HomeController::class, 'konten'])->name('konten');
    Route::get('/company-profile', [ManageCompanyProfile::class, 'index'])->name('company_profile');
    Route::get('/compass', [ManageCompassController::class, 'index'])->name('compass');

    Route::get('/paket-umroh', [PaketUmrohController::class, 'get'])->name('home.paket-umroh');
    Route::get('/paket-umroh/{slug}', [PaketUmrohController::class, 'detail'])->name('home.paket-umroh.detail');
});



// Route store shop user
Route::group(['prefix' => 'store/shop'], function () {

    Route::get('/', [HimmahStore::class, 'get_shop'])->name('shops');

    Route::prefix('{slug_toko}')->group(function () {

        Route::get('/', [ShopUserController::class, 'index'])->name('shop.user');
        Route::get('/products', [ShopUserController::class, 'products'])->name('shop.user.products');

        Route::get('/categories', [ShopUserController::class, 'categories'])->name('shop.user.categories');
        Route::get('/categories/{slug_category}', [ShopUserController::class, 'show_category'])->name('shop.user.categories.products');
        Route::get('/categories/{slug_category}/{slug_product}', [ShopUserController::class, 'category_product'])->name('shop.user.categories.show');

        Route::get('/{slug_product}', [ShopUserController::class, 'show_product'])->name('shop.user.products.show');
    });
});

// controller Himmah Store
Route::resource('store', HimmahStore::class);

Route::prefix('store/{store:slug}')->group(function () {
    Route::get('/{product:slug}', [HimmahStore::class, 'detail_produk'])->name('detail_produk');
});
// end controller Himmah Store



Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::prefix('{email}')->middleware('isAuthUser')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/settings', [UserController::class, 'pengaturan_akun'])->name('user.setting');
        Route::get('/settings/{field}', [UserController::class, 'field_pengaturan_akun'])->name('user.setting.field');
        Route::post('/settings/{field}', [UserController::class, 'store_field_pengaturan_akun'])->name('user.setting.field.store');


        Route::middleware('OnlyHaventStore')->group(function () {
            Route::get('/make-store', [ShopUserController::class, 'make_shop'])->name('buat_toko');
            Route::get('/make-store/form', [ShopUserController::class, 'show_form'])->name('form_buat_toko');
            Route::post('/make-store/form', [ShopUserController::class, 'store_form'])->name('store_shop');
        });

        Route::prefix('store')->middleware('MustHaveStore')->group(function () {
            Route::get('/', [ShopUserController::class, 'my_shop'])->name("manage.shop.user");
            Route::get('/edit', [ShopUserController::class, 'edit_shop'])->name('manage.shop.user.edit');
            Route::put('/edit', [ShopUserController::class, 'update_shop'])->name('manage.shop.user.update');

            Route::resources([
                'products' => ProductController::class,
                'categories' => CategoryController::class,
            ]);
        });
    });

    Route::prefix('manage')->middleware('isRole:super_admin,admin')->group(function () {
        Route::get('/company-profile', [ManageCompanyProfile::class, 'get'])->name('manage.company.profile');

        Route::get('/company-profile/{field}', [ManageCompanyProfile::class, 'view_field'])->name('manage.company.profile.field');
        Route::post('/company-profile/{field}', [ManageCompanyProfile::class, 'store_field'])->name('manage.company.profile.field.store');


        // controller Jadwal/Paket Umroh
        Route::resource('paket-umroh', PaketUmrohController::class);
        // end controller


    });
});

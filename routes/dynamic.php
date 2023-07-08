<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\admin\FrontendController;
    use App\Http\Controllers\FoodController;
    use App\Http\Controllers\ChefController;
    use App\Http\Controllers\BannerController;
    use App\Http\Controllers\FooterController;
    use App\Http\Controllers\HeaderController;
    use App\Http\Controllers\CounterController;
    use App\Http\Controllers\CompanyVmgController;
    use App\Http\Controllers\AboutChooseController;
    
    Route::prefix('dashboard/dynamic-edit')->group(function () {
        Route::middleware(['auth','isAdmin'])->group(function () {
            Route::get('/', [FrontendController::class, 'index']);

            Route::get('categories', [CategoryController::class, 'index']);
            Route::get('add-categories', [CategoryController::class, 'add']);
            Route::post('insert-category', [CategoryController::class, 'store']);
            Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
            Route::put('update-category/{id}', [CategoryController::class, 'update']);
            Route::get('delete-category/{id}', [CategoryController::class, 'delete']);

            Route::get('foods', [FoodController::class, 'index']);
            Route::get('add-foods', [FoodController::class, 'add']);
            Route::post('insert-foods', [FoodController::class, 'store']);
            Route::get('edit-foods/{id}', [FoodController::class, 'edit']);
            Route::put('update-foods/{id}', [FoodController::class, 'update']);
            Route::get('delete-foods/{id}', [FoodController::class, 'delete']);

            Route::get('chefs', [ChefController::class, 'index']);
            Route::get('add-chefs', [ChefController::class, 'add']);
            Route::post('insert-chefs', [ChefController::class, 'store']);
            Route::get('edit-chefs/{id}', [ChefController::class, 'edit']);
            Route::put('update-chefs/{id}', [ChefController::class, 'update']);
            Route::get('delete-chefs/{id}', [ChefController::class, 'delete']);

            Route::get('/banner', [BannerController::class, 'index']);
            Route::post('/banner', [BannerController::class, 'store']);
            Route::post('banner-update/{id}', [BannerController::class, 'update']);
            Route::post('/banner-update', [BannerController::class, 'update']);
            Route::get('/deleteBannerImage/{image}', [BannerController::class,'deleteImage'])->name('deleteBannerImage');
            Route::get('delete-banner/{id}', [BannerController::class, 'deleteBanner']);

            Route::get('/footer', [FooterController::class, 'index']);
            Route::post('/footer', [FooterController::class, 'store']);
            Route::post('footer-update/{id}', [FooterController::class, 'update']);

            Route::get('/header', [HeaderController::class, 'index']);
            Route::post('/header', [HeaderController::class, 'store']);
            Route::post('header-update/{id}', [HeaderController::class, 'update']);

            Route::get('counter', [CounterController::class, 'index']);
            Route::get('add-counter', [CounterController::class, 'add']);
            Route::post('insert-counter', [CounterController::class, 'store']);
            Route::get('edit-counter/{id}', [CounterController::class, 'edit']);
            Route::put('update-counter/{id}', [CounterController::class, 'update']);
            Route::get('delete-counter/{id}', [CounterController::class, 'delete']);
            Route::get('deleteAll-counter', [CounterController::class, 'deleteAll']);

            Route::get('/company_vmg', [CompanyVmgController::class, 'index']);
            Route::get('add-company_vmg', [CompanyVmgController::class, 'add']);
            Route::post('insert-company_vmg', [CompanyVmgController::class, 'store']);
            Route::get('edit-company_vmg/{id}', [CompanyVmgController::class, 'edit']);
            Route::put('update-company_vmg/{id}', [CompanyVmgController::class, 'update']);
            Route::get('delete-company_vmg/{id}', [CompanyVmgController::class, 'delete']);
            Route::get('deleteAll-company_vmg', [CompanyVmgController::class, 'deleteAll']);

            Route::get('/about_choose', [AboutChooseController::class, 'index']);
            Route::post('/about_choose', [AboutChooseController::class, 'store']);
            Route::post('about_choose-update/{id}', [AboutChooseController::class, 'update']);
            Route::get('deleteAll-about_choose/{id}', [AboutChooseController::class, 'deleteAboutChoose']);
            Route::get('delete-about_choose/{title}', [AboutChooseController::class, 'deleteRow']);
        });
    });
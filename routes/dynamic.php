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
        });
    });
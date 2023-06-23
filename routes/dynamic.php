<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\admin\FrontendController;
    use App\Http\Controllers\FoodController;
    use App\Http\Controllers\ChefController;
    
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
        });
    });
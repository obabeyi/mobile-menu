<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Campaign
    Route::post('campaigns/media', 'CampaignApiController@storeMedia')->name('campaigns.storeMedia');
    Route::apiResource('campaigns', 'CampaignApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Pages
    Route::post('pages/media', 'PagesApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PagesApiController');

    // Comments
    Route::post('comments/media', 'CommentsApiController@storeMedia')->name('comments.storeMedia');
    Route::apiResource('comments', 'CommentsApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');
});

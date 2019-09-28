<?php

Route::apiResource('tags', 'TagsAPIController');

Route::apiResource('categories', 'CategoryAPIController');

Route::apiResource('news', 'NewsAPIController');

Route::get('news/categories/{id}', 'NewsAPIController@showByCategories');


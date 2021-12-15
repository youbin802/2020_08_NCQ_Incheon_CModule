<?php
use Gondr\App\Route;

Route::get('/expert', "MainController@expert");
Route::post('/expert', "MainController@expertProcess");

Route::get('/expertCheck', "MainController@expertCheck");

Route::get('/modify', "MainController@modify");
Route::post('/modify', "MainController@modifyProcess");

Route::get('/delete', "MainController@delete");

Route::get('/admin', "MainController@admin");

Route::get('/recipesMod', "MainController@recipesMod");
Route::post('/recipesMod', "MainController@recipesModProcess");

Route::get('/recipesDelete', "MainController@recipesDelete");

Route::get('/addRecipes', "MainController@addRecipes");
Route::post('/addRecipes', "MainController@addRecipesProcess");

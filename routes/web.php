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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
    'as'=>'homepage',
    'uses'=>'PageController@getIndex'
]);

Route::get('product-type/{type}',[
    'as'=>'product-type',
    'uses'=>'PageController@getProductType'
]);

Route::get('product-type',[
    'as'=>'menu',
    'uses'=>'PageController@getMenu'
]);

Route::get('product-detail/{type}',[
    'as'=>'product-detail',
    'uses'=>'PageController@getProductDetail'
]);

Route::get('about-us',[
    'as'=>'about-us',
    'uses'=>'PageController@getAboutUs'
]);

Route::get('contact',[
    'as'=>'contact',
    'uses'=>'PageController@getContact'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'add-to-cart',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('reduce-by-one/{id}',[
    'as'=>'reduce-by-one',
    'uses'=>'PageController@reduceByOne'
]);

Route::get('del-cart/{id}',[
    'as'=>'delete-cart',
    'uses'=>'PageController@getDelItemCart'
]);

Route::get('cart',[
    'as'=>'cart-detail',
    'uses'=>'PageController@getCartDetail'
])->middleware('auth');

Route::post('cart',[
    'as'=>'cart-detail',
    'uses'=>'PageController@postCartDetail'
]);

Route::get('order',[
    'as'=>'order',
    'uses'=>'PageController@getCheckOut'
])->middleware('auth');

Route::post('order',[
    'as'=>'order',
    'uses'=>'PageController@postCheckOut'
]);

Route::get('login',[
    'as'=>'log-in',
    'uses'=>'PageController@getLogin'
]);

Route::get('signup',[
    'as'=>'sign-up',
    'uses'=>'PageController@getSignup'
]);

Route::post('signup',[
    'as'=>'sign-up',
    'uses'=>'PageController@postSignup'
]);

Route::post('login',[
    'as'=>'log-in',
    'uses'=>'PageController@postLogin'
]);

Route::get('logout',[
    'as'=>'log-out',
    'uses'=>'PageController@getLogout'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);


Route::get('user-list',[
    'as'=>'user-list',
    'uses'=>'PageController@getUserList'
])->middleware('admin');

Route::get('food-list',[
    'as'=>'food-list',
    'uses'=>'PageController@getFoodList'
])->middleware('admin');

Route::get('edit-food/{id}',[
    'as'=>'edit-food',
    'uses'=>'PageController@getEditFood'
])->middleware('admin');

Route::post('edit-food/{id}',[
    'as'=>'edit-food',
    'uses'=>'PageController@postEditFood'
]);

Route::get('del-food/{id}',[
    'as'=>'delete-food',
    'uses'=>'PageController@getDelFood'
])->middleware('admin');

Route::get('add-food',[
    'as'=>'add-food',
    'uses'=>'PageController@getAddFood'
])->middleware('admin');

Route::post('add-food',[
    'as'=>'add-food',
    'uses'=>'PageController@postAddFood'
]);

Route::get('list-order/{id}',[
    'as'=>'list-order',
    'uses'=>'PageController@getListOrder'
]);

Route::get('order-detail/{id}',[
    'as' => 'order-detail',
    'uses' => 'PageController@getOrderDetail'
])->middleware('auth');






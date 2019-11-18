<?php

namespace App\Providers;

use App\Cart;
use App\Product;
use App\ProductType;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['header','page.product_type','page.menu'], function($view){
            $type_product = ProductType::all();
            $view->with('type_product',$type_product);
        });

        view()->composer(['page.homepage','page.product_detail'], function($view){
        $new_product = Product::where('new',1)->get();
        $popular_product = Product::where('popular',1)->get();
        $view->with(compact('new_product','popular_product'));
        });

        view()->composer('header', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty]);
            };
        });


    }
}

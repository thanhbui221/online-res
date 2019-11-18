
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{route('homepage')}}"><i class="fa fa-home"></i> Россия, Москва, ул. 2-я Бауманская, 5</a></li>
                    <li><a href="{{route('homepage')}}"><i class="fa fa-phone"></i> +7966 077 33 27</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a href="{{route('list-order', \Illuminate\Support\Facades\Auth::id())}}"><i class="fa fa-user"></i></a></li>
                        <li><a href="{{route('homepage')}}">привет {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('log-out')}}">Выйти</a></li>
                    @else
                        <li><a href="{{route('sign-up')}}">Зарегистрироваться</a></li>
                        <li><a href="{{route('log-in')}}">Войти</a></li>
                    @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('homepage')}}" id="logo"><img src="source/assets/dest/images/logo-res2.png" width="150px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Введите ключевое слово..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                    @if(Session::has('cart'))
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Корзина ({{$totalQty}}) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            @foreach($product_cart as $product)
                            <div class="cart-item">
                                <div class="media">
                                    <a class="pull-left" href="{{route('product-detail',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$product['qty']}} x {{$product['item']['unit_price']}} ₽</span>
                                    </div>
                                    <a class="cart-item-delete" href="{{route('delete-cart',$product['item']['id'])}}">x</a>
                                </div>
                            </div>
                            @endforeach

                            <div class="cart-caption">
                                <div class="cart-total text-right">Итого: <span class="cart-total-value">{{$totalPrice}} ₽</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>

                                    <a href="{{route('cart-detail')}}" class="beta-btn primary text-center">Перейти в корзину <i class="fa fa-chevron-right"></i></a>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Корзина (пустая) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            <div class="cart-caption">
                                <div class="cart-total text-right">Итого: <span class="cart-total-value">0 ₽</span></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endif
                    </div> <!-- .cart -->

                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('homepage')}}">Домашняя страница</a></li>
                    <li><a href="{{route('menu')}}">Меню</a>
                        <ul class="sub-menu">
                            @foreach($type_product as $t_p)
                            <li><a href="{{route('product-type',$t_p->id)}}">{{$t_p->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('about-us')}}">О Нас</a></li>

                    @if(Auth::id() == 9)
                        <li><a href="{{route('user-list')}}">Список пользователей</a></li>
                        <li><a href="{{route('food-list')}}">Список блюд</a></li>
                        <li><a href="{{route('list-order', Auth::id())}}">Список заказа</a></li>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

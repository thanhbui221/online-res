@extends('master')
@section('content')
    <div class="container">
        @if(Session::has('cart'))


            <div id="content">

                <div class="table-responsive">
                    <!-- Shop Products Table -->
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-name">Блюдо</th>
                            <th class="product-price">Цена</th>
                            <th class="product-subtotal">Количество</th>
                            <th class="product-remove">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $key=>$value)
                            <tr class="cart_item">

                                <td class="product-name">
                                    <div class="media">
                                        <img class="pull-right" src="source/image/product/{{$value['item']['image']}}" alt="" height="100px">
                                        <div class="media-body ">
                                            <p class="font-large table-title">{{$value['item']['name']}}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-price">
                                    @if($value['item']['promotion_price'] == 0)
                                        <span class="amount">{{$value['item']['unit_price']}}</span>
                                    @else
                                        <span class="amount">{{$value['item']['promotion_price']}}</span>
                                    @endif

                                </td>


                                <td class="product-quantity">
                                    <a class="add-to-cart pull-left" href="{{route('reduce-by-one',$key)}}"><i class="fa fa-minus-circle"></i></a>
                                    <input class="wc-select" type="number" name="qty" min="1" value="{{$value['qty']}}">
                                    <a class="add-to-cart pull-right" href="{{route('add-to-cart',$key)}}"><i class="fa fa-plus-circle"></i></a>
                                </td>

                                <td class="product-remove">

                                    <a class="remove" title="Remove this item" href="{{route('delete-cart',$key)}}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="6" class="actions">

                                <div class="coupon">
                                    <label for="coupon_code">Купон</label>
                                    <input type="text" name="coupon_code" value="" placeholder="Код купона">
                                    <button type="submit" class="beta-btn primary" name="apply_coupon">Применить купон <i class="fa fa-chevron-right"></i></button>
                                </div>
                                <form method="post" action="{{route('cart-detail')}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="beta-btn primary" name="update_cart">Обновить корзину <i class="fa fa-chevron-right"></i></button>
                                </form>

                            </td>
                        </tr>

                        </tfoot>
                    </table>
                    <!-- End of Shop Table Products -->
                </div>


                <!-- Cart Collaterals -->
                <div class="cart-collaterals">



                    <div class="cart-totals pull-right">
                        <div class="cart-totals-row"><h5 class="cart-total-title">Итого</h5></div>
                        <div class="cart-totals-row"><span>Корзина:</span> <span>{{$cart->totalPrice}}</span></div>
                        <div class="cart-totals-row"><span>Доставка:</span> <span>бесплатно</span></div>
                        <div class="cart-totals-row"><span>Сумма:</span> <span>{{$cart->totalPrice}}</span></div>
                        <form method="get" action="{{route('order')}}">
                            <button type="submit" class="beta-btn primary" name="proceed">
                                Продолжить <i class="fa fa-chevron-right"></i>
                            </button>
                        </form>

                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- End of Cart Collaterals -->
                <div class="clearfix"></div>

            </div> <!-- #content -->
        @endif
    </div> <!-- .container -->
@endsection

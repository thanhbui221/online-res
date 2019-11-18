@extends('master')
@section('content')

    <div class="container">

        <div id="content">
            <form action="{{route('order')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">

                    <div class="col-sm-6">
                        <h4>Оформить заказ</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="name">Имя*</label>
                            <input type="text" id="name" placeholder="Имя" name="name" required>
                        </div>
                        <div class="form-block">
                            <label>Пол </label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="М" checked="checked" style="width: 10%"><span style="margin-right: 10%">Мужчина</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="Ж" style="width: 10%"><span>Женщина</span>

                        </div>

                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" id="email"  name="email" placeholder="expample@gmail.com"  required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Адрес*</label>
                            <input type="text" name="address" id="suggest" placeholder="Aдрес" required>
                            <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&load=SuggestView&onload=onLoad"></script>
                            <script>
                                function onLoad (ymaps) {
                                    var suggestView = new ymaps.SuggestView('suggest');
                                } </script>

                        </div>


                        <div class="form-block">
                            <label for="phone">Номер телефона*</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>

                        <div class="form-block">
                            <label for="notes">Нота</label>
                            <textarea id="notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Корзина</h5></div>
                            @if(Session::has('cart'))

                            <div class="your-order-body" style="padding: 0 10px">
                                @foreach($cart->items as $key=>$value)
                                <div class="your-order-item">
                                    <div>
                                        <!--  one item	 -->
                                        <div class="media">
                                            <img width="25%" src="source/image/product/{{$value['item']['image']}}" alt="" class="pull-left">
                                            <div class="media-body">
                                                <p class="font-large">{{$value['item']['name']}}</p>
                                                <span class="color-gray your-order-info">Количество: {{$value['qty']}}</span>
                                            </div>
                                        </div>
                                        <!-- end one item -->
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <div>
                                    <div class="pull-left"><p>Address:</p></div>
                                    <div class="pull-right"><p>Address:</p></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">Итого:</p></div>
                                    <div class="pull-right"><h5 class="color-black">{{$cart->totalPrice}}</h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="your-order-head"><h5>Способ оплаты</h5></div>

                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="Наличными" checked="checked" data-order_button_text="">
                                        <label for="payment_method_bacs">Наличными </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Ресторан отправит еду на ваш адрес, проверит еду и затем оплатит персонал доставки.
                                        </div>
                                    </li>

                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Онлайн оплата" data-order_button_text="">
                                        <label for="payment_method_cheque">Онлайн оплата </label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">

                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="text-center"><button class="beta-btn primary" type="submit">Оформить заказ <i class="fa fa-chevron-right"></i></button></div>
                            @else

                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                            <div class="form-block">
                                <label for="coupon_code">Watch history</label>
                                <a class="beta-btn primary" title="Watch history" href="{{route('list-order', Auth::id())}}"><i class="fa fa-chevron-right"></i></a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </form>

        </div> <!-- #content -->

    </div> <!-- .container -->

@endsection

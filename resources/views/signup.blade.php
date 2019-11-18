@extends('master')
@section('content')
    <div class="container">
        <div id="content">

            <form action="{{route('sign-up')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3">


                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <h4>Зарегистрироваться</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Имя*</label>
                            <input type="text" id="your_last_name" name="name" required>
                        </div>


                        <div class="form-block">
                            <label for="address">Адрес*</label>
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
                            <label for="password">Пароль*</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Повторный пароль*</label>
                            <input type="password" id="re_password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection

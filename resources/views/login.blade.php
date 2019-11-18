@extends('master')
@section('content')
    <div class="container">
        <div id="content">

            <form action="{{route('log-in')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3">
                        @if(Session::has('flag'))
                            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <h4>Войти</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Пароль*</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->

@endsection

@extends('master')
@section('content')
    <div class="container">
        <div id="content">

            <form action="{{route('add-food')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <h4>Добавить новое блюдо</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="your_last_name">Имя*</label>
                            <input type="text" id="your_last_name" name="name" required>
                        </div>

                        <div class="form-block">
                            <label for="picture">Изображение*</label>
                            <input type="text" id="picture" name="picture" required>
                        </div>

                        <div class="form-block">
                            <label for="id_type">Тип*</label>
                            <select id="id_type" name="id_type">
                                @foreach($food_type as $f_t)
                                    <option value="{{$f_t->id}}">{{$f_t->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-block">
                            <label for="description">Описание*</label>
                            <input type="text" id="description" name="description" required>
                        </div>


                        <div class="form-block">
                            <label for="price">Цена за единицу товара*</label>
                            <input type="number" id="unit_price" name="unit_price" required>
                        </div>

                        <div class="form-block">
                            <label for="price">Акционная цена*</label>
                            <input type="number" id="promotion_price" name="promotion_price" required>
                        </div>

                        <div class="form-block">
                            <label for="unit">Единица измерения*</label>
                            <input type="text" id="unit" name="unit" >
                        </div>

                        <div class="form-block">
                            <label>новый </label>
                            <input id="new" type="radio" class="input-radio" name="new" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Yes</span>
                            <input id="new" type="radio" class="input-radio" name="new" value="0" style="width: 10%"><span>No</span>

                        </div>

                        <div class="form-block">
                            <label>Популярный*</label>
                            <input id="popular" type="radio" class="input-radio" name="popular" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Yes</span>
                            <input id="popular" type="radio" class="input-radio" name="popular" value="0" style="width: 10%"><span>No</span>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection

@extends('master')
@section('content')
    <div class="container">
        <div id="content">

            <form action="{{route('edit-food',$product->id)}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <h4>Редактировать блюдо</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="your_last_name">Имя*</label>
                            <input type="text" id="your_last_name" name="name" value="{{$product->name}}" required>
                        </div>

                        <div class="form-block">
                            <label for="picture">Изображение*</label>
                            <input type="text" id="picture" name="picture" value="{{$product->image}}" required>
                        </div>

                        <div class="form-block">
                            <label for="id_type">Тип*</label>
                            <select id="id_type" name="id_type" >
                                <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                                @foreach($type as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-block">
                            <label for="description">Описание*</label>
                            <input type="text" id="description" name="description" value="{{$product->description}}" required>
                        </div>


                        <div class="form-block">
                            <label for="price">Цена за единицу товара*</label>
                            <input type="number" id="unit_price" name="unit_price" value="{{$product->unit_price}}" required>
                        </div>

                        <div class="form-block">
                            <label for="price">Акционная цена*</label>
                            <input type="number" id="promotion_price" name="promotion_price" value="{{$product->promotion_price}}" required>
                        </div>

                        <div class="form-block">
                            <label for="unit">Единица измерения*</label>
                            <input type="text" id="unit" name="unit" value="{{$product->unit}}"  >
                        </div>

                        <div class="form-block">
                            <label>новый </label>
                            @if($product->new == 1)
                                <input id="new" type="radio" class="input-radio" name="new" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Yes</span>
                                <input id="new" type="radio" class="input-radio" name="new" value="0" style="width: 10%"><span>No</span>
                            @else
                                <input id="new" type="radio" class="input-radio" name="new" value="1" style="width: 10%"><span style="margin-right: 10%">Yes</span>
                                <input id="new" type="radio" class="input-radio" name="new" value="0" checked="checked" style="width: 10%"><span>No</span>
                            @endif

                        </div>

                        <div class="form-block">
                            <label>Популярный*</label>
                            <input id="popular" type="radio" class="input-radio" name="popular" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Yes</span>
                            <input id="popular" type="radio" class="input-radio" name="popular" value="0" style="width: 10%"><span>No</span>
                        </div>

                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </div>


                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection

@extends('master')
@section('content')

    <div class="container">

            <div id="content">
                <div><button class="beta-btn primary pull-left" name="add-food"><a href="{{route('add-food')}}">Добавлять </a><i class="fa fa-chevron-right"></i></button></div>

                <div class="table-responsive">
                    <!-- Shop Products Table -->
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-name">Блюдо</th>
                            <th class="product-price">Цена</th>
                            <th class="product-subtotal">Описание</th>
                            <th class="product-remove">Новый?</th>
                            <th class="product-remove">Популярный?</th>
                            <th class="product-remove">Удалить</th>
                            <th class="product-remove">Редактировать</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($food as $f)
                            <tr class="cart_item">

                                <td class="product-name">
                                    <div class="media">
                                        <img class="pull-right" src="source/image/product/{{$f->image}}" alt="" height="20px">
                                        <div class="media-body ">
                                            <p class="font-large table-title">{{$f->name}}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-price">
                                    @if($f->promotion_price == 0)
                                        <span class="single-item-price">{{$f->unit_price}}</span>
                                    @else
                                        <span class="single-item-price">{{$f->promotion_price}}</span>
                                    @endif

                                </td>


                                <td class="product-quantity">
                                    <p >{{$f->description}}</p>
                                </td>

                                <td class="product-remove">
                                    @if($f->new == 1)
                                    <p>да</p>
                                    @else<p>нет</p>
                                    @endif

                                </td>
                                <td class="product-remove">
                                    @if($f->popular == 1)
                                    <p>да</p>
                                    @else
                                    <p>нет</p>
                                    @endif

                                </td>
                                <td class="product-remove">
                                    <a class="remove" title="Remove this item" href="{{route('delete-food',$f->id)}}"><i class="fa fa-trash-o"></i></a>

                                </td>

                                <td class="product-remove">
                                    <a class="remove" title="Edit this item" href="{{route('edit-food',$f->id)}}"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>

                        </tr>

                        </tfoot>
                    </table>
                    <!-- End of Shop Table Products -->
                </div>


                <!-- cart Collaterals -->
                <div class="cart-collaterals">



                    <div class="cart-totals pull-right">

                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- End of cart Collaterals -->
                <div class="clearfix"></div>

            </div> <!-- #content -->

    </div> <!-- .container -->

@endsection

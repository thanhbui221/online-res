@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($type_product as $t_p)
                        <li><a href="{{route('product-type',$t_p->id)}}">{{$t_p->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        @foreach($type_product as $t_p)
                            @if($t_p->id == $product_bytype[0]->id_type)
                                <h4>{{$t_p->name}}</h4>
                            @endif
                        @endforeach
                        <div class="beta-products-details">
                            <p class="pull-left">{{@count($product_bytype)}} блюд(о/а) </p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product_bytype as $p_b)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('product-detail',$p_b->id)}}"><img src="source/image/product/{{$p_b->image}}" alt="" height="200px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title"><b>{{$p_b->name}}</b></p>
                                        <p class="single-item-price">
                                            <span><b>{{$p_b->unit_price}} ₽</b></span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product-detail',$p_b->id)}}">Детали <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>


                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

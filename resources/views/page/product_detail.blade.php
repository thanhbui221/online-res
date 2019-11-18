@extends('master')
@section('content')
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{$product->image}}" alt="" height="200px">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title"><b>{{$product->name}}</b></p>
                                <p class="single-item-price">
                                    <span><b>{{$product->unit_price}} ₽</b></span>
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-options">
                                <a class="add-to-cart" href="{{route('add-to-cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description"></a></li>
                        </ul>

                        <div class="panel" id="tab-description">

                        </div>

                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Аналогичные блюда</h4>

                        <div class="row">
                            @foreach($other_products as $o_p)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('product-detail',$o_p->id)}}"><img src="source/image/product/{{$o_p->image}}" alt="" height="200px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$o_p->name}}</p>
                                        <p class="single-item-price">
                                            <span>{{$o_p->unit_price}}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('add-to-cart',$o_p->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product-detail',$o_p->id)}}">Детали <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                                @endforeach

                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Популярные блюда</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($popular_product as $p_p)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('product-detail',$p_p->id)}}"><img src="source/image/product/{{$p_p->image}}" alt=""></a>
                                    <div class="media-body">
                                        {{$p_p->name}}
                                        <span class="beta-sales-price">{{$p_p->unit_price}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">Новые блюда</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($new_product as $n_p)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('product-detail',$n_p->id)}}"><img src="source/image/product/{{$n_p->image}}" alt=""></a>
                                    <div class="media-body">
                                        {{$n_p->name}}
                                        <span class="beta-sales-price">{{$n_p->unit_price}}</span>
                                    </div>
                                </div>
                                    @endforeach

                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection


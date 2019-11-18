@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4><b>МЕНЮ</b></h4>
                            <div class="beta-products-details">
                                <p class="pull-left">ЧТО У НАС ЕСТЬ?</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($type_product as $t_p)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{route('product-type',$t_p->id)}}"><img src="source/image/product/{{$t_p->image}}" alt="" height="200px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title"><b>{{{$t_p->name}}}</b></p>

                                        </div>

                                        <div class="single-item-desc">
                                            <p><b>{{$t_p->description}}</b></p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

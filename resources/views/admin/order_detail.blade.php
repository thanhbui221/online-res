@extends('master')
@section('content')
    <div class="container">

        <div id="content">

            <div class="table-responsive">
                <!-- Shop Products Table -->
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-name">Quantity</th>
                        <th class="product-subtotal">Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($bill_detail as $b_d)
                        @foreach($product as $p)
                            @if($p->id == $b_d->id_product)
                        <tr class="cart_item">

                            <td class="product-name">
                                <div class="media">
                                    <img class="pull-right" src="source/image/product/{{$p->image}}" alt="" height="100px">
                                    <div class="media-body ">
                                        <p class="font-large table-title">{{$p->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-name">
                                <p>{{$b_d->quantity}}</p>
                            </td>

                            <td class="product-name">
                                <p>{{$b_d->quantity * $b_d->unit_price}}</p>
                            </td>

                        </tr>
                            @endif
                        @endforeach


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
                    <div class="cart-totals-row"><span>Сумма:</span> <span>{{$bill->total}}</span></div>

                </div>

                <div class="clearfix"></div>
            </div>
            <!-- End of cart Collaterals -->
            <div class="clearfix"></div>

        </div> <!-- #content -->

    </div> <!-- .container -->
@endsection

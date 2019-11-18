@extends('master')
@section('content')
    <div class="container">

        <div id="content">

            <div class="table-responsive">
                <!-- Shop Products Table -->
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="product-name">Но</th>
                        <th class="product-name">Customer / User</th>
                        <th class="product-name">Date order</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-name">Payment</th>
                        <th class="product-name">Note</th>
                        <th class="product-remove">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0 ?>
                    @foreach($user as $u)
                        @foreach($customer as $c)
                            @foreach($bill as $b)
                                @if($c->id_user == $u->id)
                                    @if($b->id_customer == $c->id)
                        <?php $stt++ ?>
                        <tr class="cart_item">

                            <td class="product-name">

                                <p>{{$stt}}</p>
                            </td>

                            <td class="product-name">
                                <p>{{$c->name . ' / ' . $u->full_name}} </p>

                            </td>


                            <td class="product-name">
                                <div class="media">
                                    <div class="media-body ">
                                        <p class="font-large table-title">{{$b->date_order}}</p>
                                    </div>
                                </div>

                            </td>

                            <td class="product-subtotal">
                                <div class="media">
                                    <div class="media-body ">
                                        <p class="font-large table-title">{{$b->total}}</p>
                                    </div>
                                </div>

                            </td>


                            <td class="product-name">
                                <div class="media">
                                    <div class="media-body ">
                                        <p class="font-large table-title">{{$b->payment}}</p>
                                    </div>
                                </div>

                            </td>

                            <td class="product-name">
                                <div class="media">
                                    <div class="media-body ">
                                        <p class="font-large table-title">{{$b->note}}</p>
                                    </div>
                                </div>

                            </td>


                            <td class="product-remove">
                                <a class="remove" title="Edit this item" href="{{route('order-detail', $b->id)}}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                                    @endif

                            @endif
                            @endforeach
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

                </div>

                <div class="clearfix"></div>
            </div>
            <!-- End of cart Collaterals -->
            <div class="clearfix"></div>

        </div> <!-- #content -->

    </div> <!-- .container -->
@endsection

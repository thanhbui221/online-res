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
                            <th class="product-name">Имя</th>
                            <th class="product-name">Email</th>
                            <th class="product-name">Адрес</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 0 ?>
                        @foreach($user as $u)
                            <?php $stt++ ?>
                            @if($u->id != 9)
                            <tr class="cart_item">

                                <td class="product-name">

                                    <p>{{$stt}}</p>
                                </td>

                                <td class="product-name">
                                    <div class="media">
                                        <div class="media-body ">
                                            <p class="font-large table-title">{{$u->full_name}}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="product-name">
                                    <div class="media">
                                        <div class="media-body ">
                                            <p class="font-large table-title">{{$u->email}}</p>
                                        </div>
                                    </div>

                                </td>


                                <td class="product-name">
                                    <div class="media">
                                        <div class="media-body ">
                                            <p class="font-large table-title">{{$u->address}}</p>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            @endif
                        @endforeach
                        </tbody>

                        <tfoot>


                        </tfoot>
                    </table>
                    <!-- End of Shop Table Products -->
                </div>


                <!-- Cart Collaterals -->

                <!-- End of Cart Collaterals -->
                <div class="clearfix"></div>

            </div> <!-- #content -->

    </div> <!-- .container -->
@endsection

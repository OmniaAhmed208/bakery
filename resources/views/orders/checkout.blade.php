<x-guest-layout>
    @php $total = 0; @endphp

    <div class="checkout mt-5 mb-5 min-h-screen" id="checkout">
        <div class="container">
            {{-- <h2>Welcome {{ Auth::user()->name }},</h2> --}}
            <div class="title d-flex mb-5">
                <h2>Final step to place your order</h2>
                <img src="{{Storage::url('img/icon3.png')}}" class="w-20" alt="">
            </div>

            <div class="row">
                <div class="col-sm-7">
                    <div class="content bg-white p-5 shadow-sm">
                        <h3 class="mb-4">Your order will send at</h3>
                        <p class="fw-bold"><i class="fa-solid fa-location-dot mr-3"></i> Address- <span class="fs-5">{{$user_information->address}}, {{$user_information->street}}</span></p>
                        <p class="fw-bold"><i class="fa-solid fa-phone mr-3"></i> Phone number- <span class="fs-5">{{$user_information->phone_number}}</span></p>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="content bg-white p-5 shadow-sm">
                        <h3 class="mb-4">Your order is <i class="fa-solid fa-bell-concierge"></i></h3>

                        <div class="max-w-7xl mx-auto sm:px-0 lg:px-0">
                            <table class="table table-striped border-top">
                                <thead>
                                    <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cart_items as $item)
                                        <tr>
                                            @php
                                                $menu_name = App\Models\Menu::where('id', $item->menu_id)->value('name');
                                                $menu_quantity_type = App\Models\Menu::where('id', $item->menu_id)->value('quantity_type');
                                            @endphp

                                            <td>{{$menu_name}}</td>
                                            <td>{{$item->quantity}} {{$menu_quantity_type}}</td>
                                            <td>{{$item->price}} $</td>

                                        </tr>

                                        @php $total = $total + $item->price; @endphp
                                    @endforeach

                                    <tr>
                                        <td></td>
                                        <td class="fw-bold">Total Price</td>
                                        <td class="fw-bold">{{$total}} $</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div> {{-- end content --}}
                </div> {{-- end col --}}
            </div> {{-- end row --}}

            @if($total > 0)
            <div class="d-flex mt-3">
                <form action="{{route('orders.pendingOrders')}}" method="">
                    {{-- @csrf --}}
                    <input type="submit" class="mx-2 btn btn-danger" value="Cancel order">
                </form>

                <form action="{{ route('orders.palceOrder') }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Place order">
                </form>
            </div>
            @endif
        </div>
    </div>

</x-guest-layout>

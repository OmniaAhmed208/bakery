<x-guest-layout>

    <div class="cart mt-5 mb-5 min-h-screen" id="cart">
        <div class="container">

            <h1 class="text-center mb-4">Your Cart <i class="fa-solid fa-cart-shopping"></i></h1>
            
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if(session()->has('warning'))
                <div class="alert alert-warning">
                    {{session()->get('warning')}}
                </div>
            @endif

            <h2 class="px-4">Welcome {{ Auth::user()->name }},</h2>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <table class="table table-striped border-top">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp

                            @foreach ($cart_items as $item)                                
                                <tr>
                                    @php
                                        $menu_name = App\Models\Menu::where('id', $item->menu_id)->value('name');   
                                        $menu_img = App\Models\Menu::where('id', $item->menu_id)->value('image');
                                        // $menu_quantity = App\Models\Menu::where('id', $item->menu_id)->value('quantity');   
                                    @endphp
                                    <td class="py-2 px-6 fs-5">{{$menu_name}}</td>
                                    <td class="py-2 px-6 w-20"><img src="{{Storage::url($menu_img)}}" class="rounded" alt="item"></td>
                                    <td class="py-2 px-6 fs-5">
                                        {{-- <input type="number" value="{{$item->quantity}}" min="1" max="{{$menu_quantity}}"> --}}
                                        {{$item->quantity}}
                                    </td>
                                    <td class="py-2 px-6 fs-5">{{$item->price}}</td>
                                    <td class="py-2 px-6">
                                        <div class="d-flex space-x-2">
                                            <form method="POST" action="{{route('reservations.deleteCartItem', $item->id)}}"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @php $total = $total + $item->price; @endphp
                            @endforeach
                            <tr>
                                @if($total > 0)
                                    <td></td>
                                    <td></td>
                                    <td class="py-2 px-6 fs-5 fw-bold">Total Price</td>
                                    <td class="py-2 px-6 fs-5 fw-bold">{{$total}} $</td>
                                    <td><a href="{{ route('reservations.Information') }}" class="btn btn-primary text-white  @if ($total <= 0) disabled @endif">Checkout</a></td>
                                @endif
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            
        </div>
    </div>

</x-guest-layout>

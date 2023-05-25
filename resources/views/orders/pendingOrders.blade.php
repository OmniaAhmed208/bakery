<x-guest-layout>

    <div class="category mt-5 mb-5 min-h-screen" id="menus">
        <div class="container">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 class="mb-4">Pending Orders</h1>

                    <table class="table table-striped border-top">
                        <thead>
                          <tr>
                            <th scope="col">Item Id</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">price</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($pending as $item)
                            <tr>
                                @php
                                $menu_name = App\Models\Menu::where('id', $item->menu_id)->value('name');
                                $menu_img = App\Models\Menu::where('id', $item->menu_id)->value('image');
                                @endphp
                                <td class="py-2 px-6 fs-5">{{$menu_name}}</td>
                                <td class="py-2 px-6 fs-5">{{$item->quantity}}</td>
                                <td class="py-2 px-6 fs-5">{{$item->total_price}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>

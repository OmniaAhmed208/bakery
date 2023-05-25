<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="d-flex justify-content-end">
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary m-4">Create Ctegory</a>
            </div> --}}
            <table class="table table-striped border-top">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Information</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Image</th>
                    <th scope="col">quantity</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @php
                            $menu_name = App\Models\Menu::where('id', $order->menu_id)->value('name');
                            $menu_img = App\Models\Menu::where('id', $order->menu_id)->value('image');
                        @endphp
                        <tr>
                            <td>{{$order->user_id}}</td>
                            <td>
                                <ul>
                                    <li>Phone number- {{$order->order_phoneNumber}}</li>
                                    <li>Address- {{$order->order_address}}</li>
                                </ul>
                            </td>
                            <td>{{$menu_name}}</td>
                            <td class="w-20"><img src="{{Storage::url($menu_img)}}" class="rounded" alt="menu"></td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->status}}</td>
                            {{-- <td class="py-2 px-6">
                                <div class="d-flex space-x-2">
                                    <a href="{{route('admin.categories.edit', $order->id)}}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{route('admin.categories.destroy', $order->id)}}"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-admin-layout>

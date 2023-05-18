<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.menus.create')}}" class="btn btn-primary m-4">Create Menu</a>
            </div>
            <table class="table table-striped border-top">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Time</th>
                    <th scope="col">Temprature</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($menus as $menu)
                    <tr>
                        <td class="py-2 px-6">{{$menu->name}}</td>
                        <td class="py-2 px-6 w-25"><img src="{{Storage::url($menu->image)}}" class="rounded" alt="menu"></td>
                        <td class="py-2 px-6">{{$menu->price}} $</td>
                        <td class="py-2 px-6">{{$menu->weight}} g</td>
                        <td class="py-2 px-6">{{$menu->time}} min</td>
                        <td class="py-2 px-6">{{$menu->temprature}} &#8451</td>
                        <td class="py-2 px-6">{{$menu->description}}</td>
                        <td class="py-2 px-6">
                            <div class="d-flex space-x-2">
                                <a href="{{route('admin.menus.edit', $menu->id)}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{route('admin.menus.destroy', $menu->id)}}"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-admin-layout>

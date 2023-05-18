<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-100 rounded">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex m-4 mt-2">
                <a href="{{route('admin.menus.index')}}" class="btn btn-primary">Menu Index</a>
            </div>
            <form method="POST" action="{{route('admin.menus.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input class="form-control" type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" placeholder="price">
                    </div>
                    <div class="d-flex space-x-2">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input class="form-control" type="number" id="weight" name="weight" placeholder="weight">
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input class="form-control" type="number" min="0" max="300" name="time" id="time" placeholder="time">
                        </div>
                        <div class="mb-3">
                            <label for="temprature" class="form-label">temprature</label>
                            <input class="form-control" type="number" id="temprature" name="temprature" placeholder="temprature">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select id="categories" name="categories[]" class="w-100 rounded" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex m-4">
                    <button type="submit" class="px-4 btn btn-primary">Store</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

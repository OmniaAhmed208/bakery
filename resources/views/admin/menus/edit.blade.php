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
            <form method="POST" action="{{ route('admin.menus.update', $menu->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$menu->name}}">
                    </div>
                    @error('name')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <div>
                            <img src="{{Storage::url($menu->image)}}" class="w-25 mb-3 rounded" alt="">
                        </div>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    @error('image')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input class="form-control" type="text" id="price" name="price" value="{{$menu->price}}">
                    </div>
                    @error('price')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (g)</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="text" id="weight" name="weight" value="{{$menu->weight}}">
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Time (min)</label>
                        <input class="form-control @error('time') is-invalid @enderror" type="text" id="time" name="time" value="{{$menu->time}}">
                    </div>
                    <div class="mb-3">
                        <label for="temprature" class="form-label">Temprature (&#8451)</label>
                        <input class="form-control @error('temprature') is-invalid @enderror" type="text" id="temprature" name="temprature" value="{{$menu->temprature}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                            {{$menu->description}}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select id="categories" name="categories[]" class="w-100 rounded" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @selected($menu->categories->contains($category))>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex m-4">
                    <button type="submit" class="px-4 btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

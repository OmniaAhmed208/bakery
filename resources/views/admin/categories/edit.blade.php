<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-100 rounded">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex m-4 mt-2">
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Ctegory Index</a>
            </div>
            <form method="POST" action="{{ route('admin.categories.update', $category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$category->name}}" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <div>
                            <img src="{{Storage::url($category->image)}}" class="w-25 mb-3 rounded" alt="">
                        </div>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                            {{$category->description}}
                        </textarea>
                    </div>
                </div>
                <div class="d-flex m-4">
                    <button type="submit" class="px-4 btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

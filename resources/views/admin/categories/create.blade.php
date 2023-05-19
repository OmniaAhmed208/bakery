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
            <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="name">
                    </div>
                    @error('name')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    </div>
                    @error('image')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                    </div>
                    @error('description')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex m-4">
                    <button type="submit" class="px-4 btn btn-primary">Store</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

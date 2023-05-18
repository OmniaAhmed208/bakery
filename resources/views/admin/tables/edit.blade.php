<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-100 rounded">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex m-4 mt-2">
                <a href="{{route('admin.tables.index')}}" class="btn btn-primary">Table Index</a>
            </div>
            <form method="POST" action="{{route('admin.tables.update', $table->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$table->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="guest_number" class="form-label">Geust number</label>
                        <input class="form-control" type="number" id="guest_number" name="guest_number" value="{{$table->guest_number}}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="w-100 rounded">
                            <option value="pending" @selected($table->status == 'pending')>pending</option>
                            <option value="Available" @selected($table->status == 'available')>available</option>
                            <option value="unavailable" @selected($table->status == 'unavailable')>unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" name="location" class="w-100 rounded">
                            {{-- @foreach(App\Enums\TableLocation::cases() as $location) --}}
                            <option value="front" @selected($table->location == 'front')>front</option>
                            <option value="inside" @selected($table->location == 'inside')>inside</option>
                            <option value="outside" @selected($table->location == 'outside')>outside</option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="d-flex m-4 mb-0">
                    <button type="submit" class="px-4 btn btn-primary">Store</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

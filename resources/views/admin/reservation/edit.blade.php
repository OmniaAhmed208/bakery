<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-100 rounded">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex m-4 mt-2">
                <a href="{{route('admin.reservations.index')}}" class="btn btn-primary">Reservation Index</a>
            </div>
            <form method="POST" action="{{route('admin.reservations.update', $reservation->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="m-4 p-2">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First name</label>
                        <input class="form-control" type="text" id="fname" name="fname" value="{{$reservation->fname}}">
                    </div>
                    @error('fname')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last name</label>
                        <input class="form-control" type="text" id="lname" name="lname" value="{{$reservation->lname}}">
                    </div>
                    @error('lname')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{$reservation->email}}">
                    </div>
                    @error('email')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="tel_number" class="form-label">Phone number</label>
                        <input class="form-control" type="text" id="tel_number" name="tel_number" value="{{$reservation->tel_number}}">
                    </div>
                    @error('tel_number')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="res_date" class="form-label">Reservation date</label>
                        <input class="form-control" type="datetime-local" id="res_date" name="res_date" value="{{$reservation->res_date}}">
                    </div>
                    @error('res_date')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="guest_number" class="form-label">Guest number</label>
                        <input class="form-control" type="number" id="guest_number" name="guest_number" value="{{$reservation->guest_number}}">
                    </div>
                    @error('guest_number')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="table_id" class="form-label">Table</label>
                        <select id="table_id" name="table_id" class="w-100 rounded">
                            @foreach ($tables as $table)
                                <option value="{{$table->id}}" @selected($table->id == $reservation->table_id)> {{$table->name}} ({{$table->guest_number}} Guests)</option>
                            @endforeach
                        </select>
                    </div>
                    @error('table_id')
                        <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                    @enderror
                    {{-- <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" name="location">
                    </div> --}}
                </div>
                <div class="d-flex m-4 mb-0">
                    <button type="submit" class="px-4 btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

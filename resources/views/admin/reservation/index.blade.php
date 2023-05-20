<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.reservations.create')}}" class="btn btn-primary m-4">Create Reservation</a>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Table</th>
                    <th scope="col">Guests</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reservations as $reservation)
                    <tr>
                        <td class="py-4 px-6">{{$reservation->fname}} {{$reservation->lname}}</td>
                        <td class="py-4 px-6">{{$reservation->email}}</td>
                        <td class="py-4 px-6">{{$reservation->res_date}}</td>
                        <td class="py-4 px-6">{{$reservation->table_id}}</td>
                        {{-- <td>{{$reservation->table->name}}</td> --}}
                        <td class="py-4 px-6">{{$reservation->guest_number}}</td>
                        <td class="py-4 px-6">
                            <div class="d-flex space-x-2">
                                <a href="{{route('admin.reservations.edit', $reservation->id)}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{route('admin.reservations.destroy', $reservation->id)}}"
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

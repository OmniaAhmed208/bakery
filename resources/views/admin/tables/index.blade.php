<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <a href="{{route('admin.tables.create')}}" class="btn btn-primary m-4">Create tables</a>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Guest number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Location</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{$table->name}}</td>
                            <td>{{$table->guest_number}}</td>
                            <td>{{$table->status}}</td>
                            <td>{{$table->location}}</td>
                            <td>
                                <div class="d-flex space-x-2">
                                    <a href="{{route('admin.tables.edit', $table->id)}}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{route('admin.tables.destroy', $table->id)}}"
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

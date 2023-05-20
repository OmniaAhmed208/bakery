<x-guest-layout>

    <div class="reservation mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center mb-2">
                    {{-- <h1>Manu</h1> --}}
                    {{-- <img src="{{Storage::url('img/icon7.png')}}" alt=""> --}}
                </div>

                <div class="col-lg-6">
                    <div class="imgBox h-60">
                        <img src="{{Storage::url('img/ground3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{route('reservations.store.step.two')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="m-4 p-2">
                           
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
                        </div>
                        <div class="d-flex m-4 mb-0 justify-between">
                            <a href="{{route('reservations.step.one')}}" class="px-4 mx-4 btn btn-primary">Previous</a>
                            <button type="submit" class="px-4 btn btn-primary">Make Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

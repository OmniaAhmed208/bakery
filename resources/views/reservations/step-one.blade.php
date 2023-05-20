<x-guest-layout>

    <div class="reservation mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center mb-2">
                    {{-- <h1>Manu</h1> --}}
                    {{-- <img src="{{Storage::url('img/icon7.png')}}" alt=""> --}}
                </div>

                <div class="col-lg-6">
                    <div class="imgBox">
                        <img src="{{Storage::url('img/ground3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{route('reservations.store.step.one')}}" enctype="multipart/form-data" class="rounded">
                        @csrf
                        <div class="p-4" style="bg-gray">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First name</label>
                                <input class="form-control" type="text" id="fname" name="fname" value="{{$reservation->fname ?? ''}}">
                            </div>
                            @error('fname')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last name</label>
                                <input class="form-control" type="text" id="lname" name="lname" value="{{$reservation->lname ?? ''}}">
                            </div>
                            @error('lname')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email" value="{{$reservation->email ?? ''}}">
                            </div>
                            @error('email')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="tel_number" class="form-label">Phone number</label>
                                <input class="form-control" type="text" id="tel_number" name="tel_number" value="{{$reservation->tel_number ?? ''}}">
                            </div>
                            @error('tel_number')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="res_date" class="form-label">Reservation date</label>
                                <input class="form-control" type="datetime-local" id="res_date" min="{{$min_date}}" max="{{$max_date}}" name="res_date" value="{{$reservation ? $reservation->res_date : ''}}">
                            </div>
                            @error('res_date')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                            <div class="">
                                <label for="guest_number" class="form-label">Guest number</label>
                                <input class="form-control" type="number" id="guest_number" name="guest_number" value="{{$reservation->guest_number ?? ''}}">
                            </div>
                            @error('guest_number')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex mx-4 justify-content-end">
                            <button type="submit" class="px-4 btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

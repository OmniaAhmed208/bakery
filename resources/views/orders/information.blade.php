<x-guest-layout>

    <div class="info mt-5 mb-5" id="info">
        <div class="container">

           <div class="title d-flex">
                <h1 class="mx-3 mb-4">Your Information</h1>
                <img src="{{Storage::url('img/icon3.png')}}" alt="">
           </div>

            <div class="py-12 bg-slate-100 rounded shadow">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <form method="POST" action="{{ route('orders.addUserInformation') }}">
                        @csrf
                        <div class="m-4 p-2">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label"><i class="fa-solid fa-phone mx-2"></i> Phone Number</label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" min="11" max="11" type="text" id="phone_number" name="phone_number">
                            </div>
                            @error('phone_number')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="address" class="form-label"><i class="fa-solid fa-location-dot mx-2"></i> Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" placeholder="Alexandeia, sidi gaber">
                            </div>
                            @error('address')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="street" class="form-label"><i class="fa-solid fa-location-dot mx-2"></i> Street</label>
                                <input class="form-control @error('street') is-invalid @enderror" type="text" id="street" name="street">
                            </div>
                            @error('street')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="d-flex mx-4 px-2">
                            <button type="submit" class="px-4 btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>

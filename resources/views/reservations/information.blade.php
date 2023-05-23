<x-guest-layout>

    <div class="info mt-5 mb-5" id="info">
        <div class="container">

            <h1 class="mx-3 mb-3">Your Information</h1>

            <div class="py-12 bg-slate-100 rounded">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="m-4 p-2">
                            <div class="mb-3">
                                <label for="name" class="form-label">Phone Number</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name">
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address">
                            </div>
                            @error('address')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="street" class="form-label">Street</label>
                                <input class="form-control @error('street') is-invalid @enderror" type="text" id="street" name="street">
                            </div>
                            @error('street')
                                <div class="text-sm text-red-400 mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="px-4 btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>

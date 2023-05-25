<x-guest-layout>

    <div class="category mt-5 mb-5 min-h-screen" id="menus">
        <div class="container w-50">

            <h1 class="text-center mt-5">Thank you {{ Auth::user()->name }}</h1>

            @if(session()->has('orderMsg'))
                <div class="alert alert-success">
                    {{session()->get('orderMsg')}}
                </div>
            @endif

        </div>
    </div>

</x-guest-layout>

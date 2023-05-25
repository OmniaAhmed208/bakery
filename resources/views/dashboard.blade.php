<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    {{--my content--}}
                    <div class="row">
                        <div class="col-6">
                            <div class="bg-warning bg-opacity-25 p-5 mb-5 rounded">
                                <a href="{{ route('admin.categories.index') }}" style="text-decoration: none;color:#000">
                                    <h3><i class="fa-solid fa-sitemap mr-5"></i> Categories <span class="fw-bold ml-3">{{$categories}}</span></h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-success bg-opacity-25 p-5 rounded">
                                <a href="{{ route('admin.menus.index') }}" style="text-decoration: none;color:#000">
                                    <h3><i class="fa-solid fa-book-open mr-5"></i> Menus <span class="fw-bold ml-3">{{$menus}}</span></h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-primary bg-opacity-25 p-5 rounded">
                                <a href="{{ route('admin.orders.index') }}" style="text-decoration: none;color:#000">
                                    <h3><i class="fa-solid fa-utensils mr-5"></i> Orders <span class="fw-bold ml-3">{{$orders}}</span></h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-danger bg-opacity-25 p-5 rounded">
                                <h3><i class="fa-solid fa-user mr-5"></i> Users <span class="fw-bold ml-3">{{$users}}</span></h3>
                            </div>
                        </div>
                    </div>
                    {{--end my content--}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

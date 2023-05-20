<x-guest-layout>

    <div class="category mt-5 mb-5" id="category">
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center">
                    <h1>Categories</h1>
                    <img src="img/icon7.png" alt="">
                </div>
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-4">

                        <div class="content mt-5">
                            <div class="imgBox">
                                <img src="{{Storage::url($category->image)}}" class="img-fluid" alt="">
                            </div>
                            <div class="title">
                                <a href="{{ route('categories.show', $category->id) }}"> <h3 class="mt-4"> {{$category->name}} </h3> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-guest-layout>

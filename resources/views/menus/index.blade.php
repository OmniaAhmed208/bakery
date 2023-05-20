<x-guest-layout>

    <div class="category mt-5 mb-5" id="menus">
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center mb-2">
                    <h1>Manu</h1>
                    <img src="{{Storage::url('img/icon7.png')}}" alt="">
                </div>

                @foreach($menus as $menu)
                    <div class="col-md-4">
                        <div class="content">
                            <div class="imgBox">
                            <img src="{{Storage::url($menu->image)}}" class="img-fluid" alt="">
                            </div>
                            <div class="title">
                                <h3 class="mt-4">{{$menu->name}}</h3>
                                <p class="smallTitle fw-bold">boutiqe bread</p>
                                <p class="fw-bold fs-5 price">$ {{$menu->price}}</p>
                            </div>
                            <hr class="text-black-50 m-4">
                            <div class="features d-flex">
                            <div>
                                <i class="fa-solid fa-weight-scale fa-fw"></i>
                                <span>{{$menu->weight}} g</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-clock fa-fw"></i>
                                <span>{{$menu->time}} min</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-temperature-three-quarters fa-fw"></i>
                                <span class="degree">{{$menu->temprature}} &#8451</span>
                            </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <div class="btn">
                                    <button class="btn text-black">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-guest-layout>

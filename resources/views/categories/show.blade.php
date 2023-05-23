<x-guest-layout>

    <div class="category mt-5 mb-5" id="menus">
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center mb-2">
                    <h1>Manu</h1>
                    <img src="{{Storage::url('img/icon7.png')}}" alt="">
                </div>

                @foreach($category->menus as $menu)
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
                            <form action="{{route('reservations.addMenuToCart')}}" method="POST" class="text-center">
                                @csrf
                                <input type="hidden" value="{{$menu->id}}" name="menu_id">
                                <input type="hidden" value="{{$menu->price}}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <br>
                                <div class="btn">
                                    <button type="submit" class="btn text-black">Buy Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</x-guest-layout>

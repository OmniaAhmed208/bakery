<x-guest-layout>

    <!-- ============================ intro =================== -->
      <section>
        <div class="container">
            <div class="intro rounded-3">
                <div class="row layout">
                    <div class="col-md-6" style="height: 100%;">
                        <div class="content position-relative text-white p-3 d-flex justify-content-center">
                            <div class="imgBox d-flex justify-content-center">
                                <img src="img/icon.png" class="icon" alt="">
                            </div>
                            <h1 class="text-center pt-4">Crustique</h1>
                            <p class="text-center">boutiqe bread</p>
                            <hr class="text-white-50 m-4">
                            <div class="row">
                                <div class="col-4 d-flex justify-content-center">
                                    <i class="fa-solid fa-weight-scale fa-fw"></i>
                                    <span>1250 g</span>
                                </div>
                                <div class="col-4 d-flex justify-content-center">
                                    <i class="fa-solid fa-clock fa-fw"></i>
                                    <span>35 min</span>
                                </div>
                                <div class="col-4 d-flex justify-content-center">
                                    <i class="fa-solid fa-temperature-three-quarters fa-fw"></i>
                                    <span class="degree">233</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-5">
                                <div class="btn">
                                    <a href="{{ route('menus.index') }}" class="btn">Buy Now</a>
                                    {{-- <a href="{{ route('reservations.step.one') }}" class="btn">Buy Now</a> --}}
                                </div>
                            </div>
                            <div class="imgBoxIcon position-absolute">
                              <img src="img/icon7.png" width="100px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
      </section>

      <!-- ======================== about us ================== -->
      <section class="about text-center">
        <h2 class="h1 fw-bold">Our Heritage</h2>
        <p class="smallTitle fw-bold">boutiqe bread</p>
        <p class="desc m-auto">
            "<span class="fw-bold">Crustique</span> is a name that can be understood as a blend of the words 'crust' and 'boutique'. 'Crust' refers to the outer layer of bread or any grilled food, while 'boutique' means a small and luxurious shop. Therefore, Crustique refers to a bakery that combines the quality of luxurious bread with the unique and stylish character of a small shop."
        </p>
      </section>

      <!-- ======================== bread menu ================== -->
        <div class="container specials">
            <h2 class="h1 text-center fw-bold">Today's Speciality</h2>
            <p class="smallTitle fw-bold text-center">from our menu</p>
            <div class="bread-menu d-flex justify-content-center">
                @foreach ($specials->menus as $menu)
                    <div class="content">
                        <div class="imgBox">
                            <img src="img/sweetDinnerRolls.jpg" class="img-fluid" alt="">
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
                            {{-- <label for="quantity" class="fw-bold fs-5">Quantity</label> --}}
                            {{-- <input type="number" min="1" name="quantity" class="quantity" placeholder="1"> --}}
                            <br>
                            <div class="btn">
                                <button type="submit" class="btn text-black">Buy Now</button>
                            </div>
                            {{-- <div class="d-flex align-items-center justify-content-center mt-4">
                                <div class="btn">
                                    <button class="btn text-black">Buy Now</button>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
      <!-- ===================== bread recipes ============= -->
      <section class="bread-recipes">
        <h2 class="h1 text-center">Bread Recipes</h2>
        <p class="smallTitle fw-bold text-center">Testy&Quick Snacks</p>
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-8 d-flex recipes">
              <div class="row">
                <div class="col-sm-7">
                  <div class="imgBoxLeft">
                    <img src="img/avacadoPestoSandwish.jpg" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="col-sm-5 m-0 p-0">
                  <div class="recet text-center pt-2 pb-2">
                    <div class="background p-2">
                      <div class="content d-flex align-items-center">
                        <div class="imgBox">
                          <img src="img/icon1.png" class="img-fluid" alt="">
                        </div>
                        <p class="smallTitle fs-3">Preparation</p>
                        <h2 class="h1">25</h2>
                        <p class="fs-5 mt-3 min">minutes</p>
                        <hr class="px-3">
                        <p class="smallTitle fs-5 m-0">Total Costs</p>
                        <h2 class="h1 mt-3 price"><sub>$</sub>7<sub>.50</sub></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="costs d-flex justify-content-center align-items-center">
                <h2 class="h1">Bagel Sandwish</h2>
                <p class="smallTitle fw-bold mt-4">What do you need?</p>
                <div class="d-flex">
                  <ul class="list-unstyled">
                    <li class="fw-bold">1x</li>
                    <li class="fw-bold">150g</li>
                    <li class="fw-bold">100g</li>
                    <li class="fw-bold">100g</li>
                  </ul>
                  <ul class="list-unstyled desc">
                    <li>bagel</li>
                    <li>bagel</li>
                    <li>bagel</li>
                    <li>bagel</li>
                  </ul>
                </div>
                <div class="btn mt-4 mb-2">
                    <button class="btn text-black">Read More</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
</x-guest-layout>

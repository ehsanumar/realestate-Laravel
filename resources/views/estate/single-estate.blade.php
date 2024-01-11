<x-header />
<x-navOfPages />

<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('images/hero_bg_3.jpg')"></div>
        <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
        <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
                <h1 class="heading" data-aos="fade-up">
                    Easiest way to find your dream home
                </h1>

            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        @foreach ($singleEstates as $estate)
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="img-property-slide-wrap">
                        <div class="img-property-slide">
                            @foreach ($estate->getMedia('estate_image') as $image)
                                <img src="{{ $image->getUrl() }}" alt="Image" class="img-fluid"/>
                            @endforeach
                            {{-- <img src="{{ asset('images/img_5.jpg') }}" alt="image" class="img-fluid">
                            <img src="{{ asset('images/img_4.jpg') }}" alt="image" class="img-fluid">
                            <img src="{{ asset('images/img_3.jpg') }}" alt="image" class="img-fluid"> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="heading text-primary">{{ $estate->City->city_name }}</h2>
                    <p class="text-black-50">
                        {{ $estate->description }}
                    </p>
                    <div class="">
                        <div class="d-flex gap-3">
                            <span class="d-block mb-2 text-black-50">area: {{ $estate->area }} m</span>
                            <span class="d-block mb-2 text-black-50">Type:
                                {{ $estate->Type->estate_type }}</span>
                            <span class="d-block mb-2 text-black-50">Status:
                                {{ $estate->Status->estate_status }}</span>
                        </div>
                        <div class="specs d-flex mb-4">
                            <span class="d-block me-1 border-end ">
                                <span class="icon-bed me-2"></span>
                                <span class="caption d-flex mr-2 ">{{ $estate->number_of_bedroom }} <span
                                        class="me-1">Bed</span></span>
                            </span>
                            <span class="d-block me-1 border-end">
                                <span class="icon-bath me-2"></span>
                                <span class="caption d-flex mr-2 ">{{ $estate->number_of_bathroom }}<span
                                        class="me-1">Bath</span></span>
                            </span>

                            <span class="d-block me-1 border-end">
                                <span class="icon-kitchen me-2"></span>
                                <span class="caption d-flex mr-2">{{ $estate->number_of_kitchen }} <span
                                        class="me-1">Kitchen</span></span>
                            </span>
                            <span class="d-block me-1 border-end">
                                <span class="icon-building me-2  "></span>
                                <span class="caption d-flex mr-2">{{ $estate->number_of_floor }} <span
                                        class="me-1">Floor</span></span>
                            </span>
                            <span class="d-block me-1 ">
                                <span class="icon-car me-2"></span>
                                <span class="caption d-flex mr-2">{{ $estate->number_of_garage }} <span
                                        class="me-1">Garage</span></span>
                            </span>

                        </div>
                    </div>

                    <div class="d-block agent-box p-5">
                        <div class="img mb-4">
                            <img src="{{ $estate->User->getFirstMediaUrl('users') }}" alt="Image" style="width: 100px; height: 100px; border-radius: 100%; border: 1.7px solid #005555 " class="img-fluid" />
                        </div>
                        <div class="text">
                            <h3 class="mb-0">{{ $estate->User->name }}</h3>
                            <div class="meta mb-3">{{ $estate->User->email }}</div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ratione laborum quo quos omnis sed magnam id ducimus saepe
                            </p>
                            <ul class="list-unstyled social dark-hover d-flex">
                                <li class="me-1">
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="me-1">
                                    <a href="#"><span class="icon-linkedin"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<x-fotter />

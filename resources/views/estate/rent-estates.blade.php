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
                <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                    data-aos-delay="200">
                    <input type="text" class="form-control px-4"
                        placeholder="Your ZIP code or City. e.g. New York" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="d-block" style="background: #005555 ;width :full;">
    <div class="ml-3">
        <h2 class="text-light h2">Filter <span class="icon-filter h3"></span> </h2>
    </div>

    <div class="d-flex gap-2 p-4  ">
        <form action="{{ route('all') }}" method="get">

            <x-form-filter name="city" display="City" era="city_name" route="{{ route('all') }}"
                :filter="$data['cities']" />
            <x-form-filter name="type" display="Type" era="estate_type" route="{{ route('all') }}"
                :filter="$data['types']" />
            <input type="number" name="min" style="height: 35px;" placeholder="min$">
            <input type="number" name="max" style="height: 35px;" placeholder="max$">
            <button class="btn btn-light" style="height: 35px; margin-bottom: 5px;" type="submit"><i
                    class="fa-solid fa-angles-right"></i></button>


        </form>
    </div>
</div>

@if ($rentEstates->count() <= 0)
    <h1 class=" text-center m-5 text-danger">hmmm.. sorry we don't have any item to Buy</h1>
@else
    <div class="section section-properties">
        <div class="container">
            <div class="row">
                @foreach ($rentEstates as $estate)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 " style="margin-bottom: 50px; ">
                        <div class="property-item "
                            style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
                            <a href="{{ route('single.estate', ['id' => $estate->id]) }}" class="img">
                                <img src="{{ $estate->media[0]->getUrl() }}" alt="Image" class="img-fluid"
                                    style="width: 400px; border-radius: 10px; height: 70vh;" />
                                {{-- <img src="{{ asset('images/img_5.jpg') }}" alt="image" class="img-fluid"
                                    style="width: 400px; border-radius: 10px; height: 70vh;"> --}}
                            </a>

                            <div class="property-content">
                                <div class="d-flex justify-content-between">
                                    <div class="price mb-2 "><span>${{ $estate->amount }}</span> </div>

                                    <span class="city d-block mb-3">
                                        <i class='fas fa-map-marker-alt text-warning'></i>
                                        {{ $estate->City->city_name }}</span>

                                </div>
                                <div>
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

                                    <div class="d-flex">
                                        <div class="d-flex gap-2">

                                            {{-- single Estate --}}
                                            <a href="{{ route('single.estate', ['id' => $estate->id]) }}"
                                                class="btn btn-primary py-2 px-4 mr-2">See details</a>

                                            {{-- add Estate to favurite --}}
                                            <form action="{{ route('favourite.store', ['favourite' => $estate->id]) }}"
                                                method="POST">
                                                <input type="number" name="estate_id" hidden
                                                    value="{{ $estate->id }}">
                                                @csrf
                                                <button class="btn btn-primary py-2 px-4">Favurite</button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- .item -->

                    </div>
                @endforeach
                <x-paginateEstate :variable="$rentEstates" />

@endif



</div>
</div>
</div>

<x-fotter />

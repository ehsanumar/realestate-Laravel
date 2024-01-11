<x-header />

<x-app-layout>


    <div class="section section-properties">
        <div class="container">
            <div class="row">
                @foreach ($estates as $estate)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 " style="margin-bottom: 50px; ">
                        <div class="property-item " style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;" >
                            <a href="property-single.html" class="img">
                                <img src="{{ $estate->media[0]->getUrl()  }}" alt="Image" class="img-fluid"
                                    style="width: 400px; border-radius: 10px; height: 70vh;" />
                            </a>

                            <div class="property-content">
                                <div class="d-flex justify-content-between">
                                    <div class="price mb-2 "><span>${{ $estate->amount }}</span> </div>

                                        <span class="city d-block mb-3">
                                            <i class='fas fa-map-marker-alt text-warning'></i>
                                            {{ $estate->City->city_name }}</>

                                </div>
                                <div>
                                    <div class="d-flex gap-3">
                                        <span class="d-block mb-2 text-black-50">area: {{ $estate->area }}m</span>
                                        <span class="d-block mb-2 text-black-50">Type:
                                            {{ $estate->Type->estate_type }}</span>
                                        <span class="d-block mb-2 text-black-50">Status:
                                            {{ $estate->Status->estate_status }}</span>
                                        </div>
                                    <div class="specs d-flex mb-4">
                                        <span class="d-block ml-1 border-end ">
                                            <span class="icon-bed me-2"></span>
                                            <span class="caption d-flex mr-2 ">{{ $estate->number_of_bedroom }} <span
                                                    class="ml-1">Bed</span></span>
                                        </span>
                                        <span class="d-block ml-1 border-end">
                                            <span class="icon-bath me-2"></span>
                                            <span class="caption d-flex mr-2 ">{{ $estate->number_of_bathroom }} <span
                                                    class="ml-1">Bath</span></span>
                                        </span>

                                        <span class="d-block ml-1 border-end">
                                            <span class="icon-kitchen me-2"></span>
                                            <span class="caption d-flex mr-2">{{ $estate->number_of_kitchen }} <span
                                                    class="ml-1">Kitchen</span></span>
                                        </span>
                                        <span class="d-block ml-1 border-end">
                                            <span class="icon-building me-2  "></span>
                                            <span class="caption d-flex mr-2">{{ $estate->number_of_floor }} <span
                                                    class="ml-1">Floor</span></span>
                                        </span>
                                        <span class="d-block ml-1 ">
                                            <span class="icon-car me-2"></span>
                                            <span class="caption d-flex mr-2">{{ $estate->number_of_garage }} <span
                                                    class="ml-1">Garage</span></span>
                                        </span>

                                    </div>

                                    <div class="d-flex">

                                        {{-- Edit Estate --}}
                                        <a href="{{ route('estate.edit', ['estate' => $estate->id]) }}"
                                            class="btn btn-primary py-2 px-4 mr-2">Edit</a>


                                        {{-- Delete Estate --}}
                                        <form action="{{ route('estate.destroy', ['estate' => $estate->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger py-2 px-4 "
                                                onclick="return confirm('Are you sure to delete this Estate?')">Delete</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- .item -->

                    </div>
                @endforeach
                {{ $estates->links() }}



            </div>
        </div>
    </div>
</x-app-layout>

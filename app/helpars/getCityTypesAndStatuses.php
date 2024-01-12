<?php

use App\Models\City;
use App\Models\EstatesType;
use Illuminate\Support\Facades\Cache;


// app/helpers.php

if (!function_exists('getCityTypesAndStatuses')) {
    function getCityTypesAndStatuses()
    {



        $cities = Cache::remember('cities', now()->addWeek(), function () {
            return City::get(['id', 'city_name']);
        });

        $types = Cache::remember('estate_types', now()->addWeek(), function () {
            return EstatesType::get(['id', 'estate_type']);
        });


        return compact('cities', 'types');
    }
}

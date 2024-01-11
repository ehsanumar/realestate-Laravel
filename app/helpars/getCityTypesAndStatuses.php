<?php

use App\Models\City;
use App\Models\EstatesType;
use App\Models\EstatesStatus;

// app/helpers.php

if (!function_exists('getCityTypesAndStatuses')) {
    function getCityTypesAndStatuses()
    {
        $cities = City::get(['id', 'city_name']);
        $types = EstatesType::get(['id', 'estate_type']);

        return compact('cities', 'types');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Estates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FilterEstateController extends Controller
{
    private function FilterCheck($request){
        $Estates = Estates::with(['City:id,city_name', 'Status:id,estate_status','Type:id,estate_type','media' => function ($query) {
            $query->where('collection_name', 'estate_image');
        }]);

        if ($request['city']) {
            $Estates->CityFilter($request['city']);
        }
        if ($request['type']) {
            $Estates->TypeFilter($request['type']);
        }
        if ($request['min'] || $request['max']) {
            $Estates->AmountFilter($request['min'], $request['max']);
        }
        return $Estates;
    }
    public function allEstate(Request $request)
    {
        $data = getCityTypesAndStatuses();
        $allEstates = $this->FilterCheck($request)->paginate(12);
        return view('estate.all-estates', compact(['allEstates','data']));
    }

    public function buyEstate(Request $request)
    {
        $buyEstates = $this->FilterCheck($request)->where('status_id', 3)->latest()->paginate(12);
        $data = getCityTypesAndStatuses();
        return view('estate.buy-estates', compact(['buyEstates','data']));
    }

    public function rentEstate(Request $request)
    {
        $rentEstates = $this->FilterCheck($request)->where('status_id', 1)->latest()->paginate(12);
        $data = getCityTypesAndStatuses();
        return view('estate.rent-estates', compact(['rentEstates','data']));
    }
}

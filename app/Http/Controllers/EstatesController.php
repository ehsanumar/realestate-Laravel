<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstateRequest;
use App\Models\Estates;
use App\Models\{City, EstatesStatus, EstatesType};

class EstatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates = Estates::with(['City:id,city_name', 'Type:id,estate_type', 'Status:id,estate_status', 'media' => function ($query) {
            $query->where('collection_name', 'estate_image');
        }])->where('user_id', auth()->id())->paginate(9);
        return view('estate.display-Estates', compact(['estates']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citis = City::get(['id', 'city_name']);
        $types = EstatesType::get(['id', 'estate_type']);
        $statuses = EstatesStatus::get(['id', 'estate_status']);

        return view('estate.estate-create', compact(['citis', 'types', 'statuses']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstateRequest $request)
    {
        $request = $request->validated();
        $estate = Estates::create([
            'city_id' => $request['city'],
            'estate_type' => $request['type'],
            'user_id' => auth()->user()->id,
            'status_id' => $request['status'],
            'description' => $request['description'],
            'location' => $request['location'],
            'number_of_bathroom' => $request['bathroom'],
            'number_of_bedroom' => $request['bedroom'],
            'number_of_kitchen' => $request['kitchen'],
            'number_of_garage' => $request['garage'],
            'number_of_floor' => $request['floor'],
            'area' => $request['area'],
            'amount' => $request['amount'],
            'images' => $request['images'],
        ]);

        foreach ($request['images'] as $image) {
            // dd($image);
            $estate->addMedia($image)->toMediaCollection('estate_image');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estates  $estates
     * @return \Illuminate\Http\Response
     */
    public function show(Estates $estates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estates  $estates
     * @return \Illuminate\Http\Response
     */
    public function edit($estate)
    {
        $estateEdit = Estates::with(
            'City:id,city_name',
            'Type:id,estate_type',
            'Status:id,estate_status'
        )->findOrFail($estate);
        // dd($estateEdit->City->city_name);
        $citis = City::get(['id', 'city_name']);
        $types = EstatesType::get(['id', 'estate_type']);
        $statuses = EstatesStatus::get(['id', 'estate_status']);

        return view('estate.estate-edit', compact(['estateEdit', 'statuses', 'citis', 'types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estates  $estates
     * @return \Illuminate\Http\Response
     */
    public function update(EstateRequest $request, Estates $estates, $estate)
    {
       $estate= $estates->findOrFail($estate);
        $request = $request->validated();
       $estate->update([
            'city_id' => $request['city'],
            'estate_type' => $request['type'],
            'user_id' => auth()->user()->id,
            'status_id' => $request['status'],
            'description' => $request['description'],
            'location' => $request['location'],
            'number_of_bathroom' => $request['bathroom'],
            'number_of_bedroom' => $request['bedroom'],
            'number_of_kitchen' => $request['kitchen'],
            'number_of_garage' => $request['garage'],
            'number_of_floor' => $request['floor'],
            'area' => $request['area'],
            'amount' => $request['amount'],
            'images' => $request['images'],
        ]);

        if ($request['images'] > 0) {
            $estate->clearMediaCollection('estate_image');
            foreach ($request['images'] as $image) {
                $estate->addMedia($image)->toMediaCollection('estate_image');
            }
        }
        return to_route('estate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estates  $estates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estates $estates, $estate)
    {
        $estate = $estates->findOrFail($estate);

        // Get all media items associated with the 'estate_image' collection and the specific estate
        $mediaItems = $estate->getMedia('estate_image')
            ->where('model_id', $estate->id);

        // Delete each media item
        foreach ($mediaItems as $media) {
            $media->delete(); // This will delete the actual media files and their records
        }

        // Now delete the estate itself
        $estate->delete();

        return back();
    }
}

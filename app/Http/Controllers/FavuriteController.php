<?php

namespace App\Http\Controllers;

use App\Models\Favurite;
use Illuminate\Http\Request;

class FavuriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favurites = Favurite::with(['estate', 'estate.media' => function ($query) {
            $query->where('collection_name', 'estate_image');
        }])
            ->where('user_id', auth()->user()->id)
            ->paginate(12);

        return view('estate.estate-favurite', compact(['favurites']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkToHave = Favurite::where('user_id', auth()->user()->id)
            ->where('estate_id', $request['estate_id'])
            ->first();
        if (!$checkToHave) {
            Favurite::create([
                'user_id' => auth()->user()->id,
                'estate_id' => $request['estate_id'],
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Favurite $favurite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favurite $favurite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favurite $favurite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $favourite)
    {
        $favourite = Favurite::findOrFail($favourite);
        $favourite->delete();
        return back();
    }
}

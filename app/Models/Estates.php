<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estates extends Model
{
    use HasFactory;

    protected $fillable = [
            'estate_name',
            'city_id',
            'image_id',
            'estate_type',
            'user_id',
            'status_id',
            'description',
            'location',
            'number_of_bathroom',
            'number_of_bedroom',
            'number_of_kitchen',
            'number_of_garage',
            'number_of_floor',
            'area',
            'amount',
    ];

    public function City() : BelongsTo
    {
        return $this->belongsTo(City::class());
    }

    public function image() : BelongsTo
    {
        return $this->belongsTo(Images::class());
    }

    public function Status() : BelongsTo
    {
        return $this->belongsTo(EstatesStatus::class());

    }

    public function Type() : BelongsTo
    {
        return $this->belongsTo(EstatesType::class());

    }

    public function User() : BelongsTo
    {
        return $this->belongsTo(User::class());

    }
}

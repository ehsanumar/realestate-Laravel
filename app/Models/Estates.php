<?php

namespace App\Models;

use App\Models\{City, User, EstatesType, EstatesStatus};
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estates extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'estate_name',
        'city_id',
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

    public function City(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }



    public function Status(): BelongsTo
    {
        return $this->belongsTo(EstatesStatus::class);
    }

    public function Type(): BelongsTo
    {
        return $this->belongsTo(EstatesType::class, 'estate_type');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class());
    }
}

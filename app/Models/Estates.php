<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\{City, User, EstatesType, EstatesStatus};

class Estates extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'city_id',
        'estate_type',
        'user_id',
        'status_id',
        'description',
        'number_of_bathroom',
        'number_of_bedroom',
        'number_of_kitchen',
        'number_of_garage',
        'number_of_floor',
        'area',
        'amount',
    ];
    //My Scops List
    public function scopeCityFilter($query,$cityId){
        return $query->where('city_id', $cityId);
    }
    public function scopeTypeFilter($query,$typeId){
        return $query->where('estate_type', $typeId);
    }
    public function scopeAmountFilter($query,$min,$max){
        if ($min !== null && $max !== null) {
            return $query->whereBetween('amount', [$min, $max]);
        } elseif ($min !== null) {
            return $query->where('amount', '>=', $min);
        } elseif ($max !== null) {
            return $query->where('amount', '<=', $max);
        }
    }


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
        return $this->belongsTo(User::class);
    }
    public function favurites()
    {
        return $this->hasMany(Favurite::class, 'estate_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Estates;

class City extends Model
{
    use HasFactory;
    protected $fillable=['city_name'];

    public function estateCity() : HasMany
    {
        return $this->hasMany(Estates::class());
    }
}

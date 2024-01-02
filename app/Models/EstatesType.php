<?php

namespace App\Models;

use App\Models\Estates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstatesType extends Model
{
    use HasFactory;
    protected $fillable = ['estate_type'];

    public function estateType() :HasMany
    {
        return $this->hasMany(Estates::class());
    }
}

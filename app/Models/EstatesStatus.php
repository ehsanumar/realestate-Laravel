<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Estates;

class EstatesStatus extends Model
{
    use HasFactory;
    protected $fillable = ['estate_status'];

    public function estateStatus() : HasMany
    {
        return $this->hasMany(Estates::class);
    }
}

<?php

namespace App\Models;

use App\Models\{User, Estates};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Favurite extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;

    protected $fillable=['user_id' , 'estate_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function estate() : BelongsTo
    {
        return $this->belongsTo(Estates::class);
    }
}

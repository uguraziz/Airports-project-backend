<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    use HasFactory, Searchable;
    protected $table = 'airports';
    protected $fillable = [
        'countries_id',
        'name',
        'code',
        'latitude',
        'longitude',
    ];

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    public function toSearchableArray(): array
    {
        $array = $this->toArray();
        $array['_geo'] = [
            'lat' => $this->latitude,
            'lng' => $this->longitude
        ];
        $array['countries_name'] = $this->countries->name;

        return $array;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = ['name'];

    function airport(): HasMany
    {
        return $this->hasMany(Airports::class);
    }
}

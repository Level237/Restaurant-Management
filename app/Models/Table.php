<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\TableStatus;
use App\Enums\TableLocation;
use App\Models\Reservations;

class Table extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'guest_number',
        'status',
        'location'
    ];

    protected $casts=[
        'status'=>TableStatus::class,
        'location'=>TableLocation::class
    ];

    /**
     * Get all of the Reservations for the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Reservations(): HasMany
    {
        return $this->hasMany(Reservations::class);
    }
}

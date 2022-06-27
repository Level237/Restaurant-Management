<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'guest_number',
        'table_id',
        'phone_number',
        'res_date'
    ];



    protected $casts=[
        'res_date'=>'datetime',
    ];


    /**
     * Get the Table that owns the Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}

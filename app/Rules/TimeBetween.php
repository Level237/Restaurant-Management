<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate=Carbon::parse($value);
        $pickupTime= Carbon::CreateFromTime($pickupDate->hour,$pickupDate->minute,$pickupDate->second);

        $earliestTime= Carbon::createFromTimeString('17:00:00');
        $LastTime= Carbon::createFromTimeString('23:00:00');

        return $pickupDate->between($earliestTime,$LastTime) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please Choose the time between 17:00-23:00';
    }
}

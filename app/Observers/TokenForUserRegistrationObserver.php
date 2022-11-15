<?php

namespace App\Observers;

use App\Models\TokenForUserRegistration;
use Illuminate\Support\Str;

class TokenForUserRegistrationObserver
{
    /**
     * Handle the TokenForUserRegistration "created" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function creating(TokenForUserRegistration $tokenForUserRegistration)
    {
        $tokenForUserRegistration->token = Str::random(274);
        $tokenForUserRegistration->alive_until = now()->addMinutes(TokenForUserRegistration::$tokenAliveMinutes);
    }

    /**
     * Handle the TokenForUserRegistration "created" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function created(TokenForUserRegistration $tokenForUserRegistration)
    {
        //
    }

    /**
     * Handle the TokenForUserRegistration "updated" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function updated(TokenForUserRegistration $tokenForUserRegistration)
    {
        //
    }

    /**
     * Handle the TokenForUserRegistration "deleted" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function deleted(TokenForUserRegistration $tokenForUserRegistration)
    {
        //
    }

    /**
     * Handle the TokenForUserRegistration "restored" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function restored(TokenForUserRegistration $tokenForUserRegistration)
    {
        //
    }

    /**
     * Handle the TokenForUserRegistration "force deleted" event.
     *
     * @param  \App\Models\TokenForUserRegistration  $tokenForUserRegistration
     * @return void
     */
    public function forceDeleted(TokenForUserRegistration $tokenForUserRegistration)
    {
        //
    }
}

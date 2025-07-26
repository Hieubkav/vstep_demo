<?php

namespace App\Observers;

use App\Models\WebDesign;

class WebDesignObserver
{
    /**
     * Handle the WebDesign "created" event.
     */
    public function created(WebDesign $webDesign): void
    {
        \App\Helpers\WebDesignHelper::clearCache();
    }

    /**
     * Handle the WebDesign "updated" event.
     */
    public function updated(WebDesign $webDesign): void
    {
        \App\Helpers\WebDesignHelper::clearCache();
    }

    /**
     * Handle the WebDesign "deleted" event.
     */
    public function deleted(WebDesign $webDesign): void
    {
        \App\Helpers\WebDesignHelper::clearCache();
    }

    /**
     * Handle the WebDesign "restored" event.
     */
    public function restored(WebDesign $webDesign): void
    {
        //
    }

    /**
     * Handle the WebDesign "force deleted" event.
     */
    public function forceDeleted(WebDesign $webDesign): void
    {
        //
    }
}

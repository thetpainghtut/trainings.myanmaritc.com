<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Batch;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Feedback;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $now = Carbon::now();
        $batches = Batch::all();
        $feedbacks = Feedback::all();
        view()->share('feedbacks',$feedbacks);
        View::share('batches',$batches);
        Schema::defaultStringLength(191);
    }
}

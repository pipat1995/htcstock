<?php

namespace App\Providers;

use DateTime;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        Blade::directive('moneyTH', function ($amount) {
            // setlocale(LC_MONETARY, 'th_TH');
            return "<?php echo '฿' . number_format($amount, 2); ?>";
        });
    }
}

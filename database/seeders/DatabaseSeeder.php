<?php

namespace Database\Seeders;

use App\Models\Utility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NotificationSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AiTemplateSeeder::class);
        Artisan::call('module:migrate LandingPage');
        Artisan::call('module:seed LandingPage');

        // Check if there's an active route
        if (Route::current()) {
            $currentRouteName = Route::current()->getName();
            Log::info('Current route name: ' . $currentRouteName);
            
            // If the current route is not 'LaravelUpdater::database', run the seeders
            if ($currentRouteName !== 'LaravelUpdater::database') {
                $this->call(PlansTableSeeder::class);
                $this->call(UsersTableSeeder::class);
                $this->call(AiTemplateSeeder::class);
            } else {
                Utility::languagecreate();
            }
        } else {
            Log::info('No active route found.');
        }
    }
}

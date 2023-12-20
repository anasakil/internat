<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Etudiant;
use App\Models\AcceptStudent;


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
    $etudiantCount = Etudiant::count();
    $acceptStudentCount = AcceptStudent::count();

    view()->share('etudiantCount', $etudiantCount);
    view()->share('acceptStudentCount', $acceptStudentCount);
}
}

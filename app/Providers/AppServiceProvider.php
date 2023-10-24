<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        $this->autoloadRepository();
        Paginator::useBootstrap();
    }

    private function autoloadRepository()
    {
        $repoPath = app_path('Repositories');
        $repoDir = scandir($repoPath);

        foreach ($repoDir as $dir) {
            if (!in_array($dir, ['.', '..']) && is_dir($repoPath . "/$dir")) {
                \App::singleton(
                    "App\\Repositories\\" . $dir . "\\" . $dir . "Repository",
                    "App\\Repositories\\" . $dir . "\\" . $dir . "RepositoryEloquent"
                );
            }
        }
    }
}

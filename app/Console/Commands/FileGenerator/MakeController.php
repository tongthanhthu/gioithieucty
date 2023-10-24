<?php

namespace App\Console\Commands\FileGenerator;

use App\Console\Commands\FileGenerator\FileHelper\File;
use Exception;
use Illuminate\Console\Command;

class MakeController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:bota-controller {controller} {--module=} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $controller = trim($this->argument('controller'), '"\'');
        $module = $this->option('module');


        try {
            if (empty($controller)) {
                throw new Exception('Controller name cannot be empty!');
            }

            $this->info('Creating controller ...');

            $fileHelper = new File();
            $result = $fileHelper->createController($controller, $module);

            $this->info($result);
        } catch (Exception $exception) {
            $this->error($exception->getMessage());
        }
    }
}

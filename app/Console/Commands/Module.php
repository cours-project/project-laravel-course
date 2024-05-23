<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module CLI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name =  $this->argument('name');
        if(File::exists(base_path('modules/'.$name))){
            $this->error('Module already exits');
        }else{
            File::makeDirectory(base_path('modules/'.$name),0755,true,true);

            //Configs
            $configFoder = base_path('modules/'.$name.'/configs');
            if(!File::exists($configFoder)){
                File::makeDirectory($configFoder,0755,true,true);
            }

            //Helper
            $helperFoder = base_path('modules/'.$name.'/helper');
            if(!File::exists($helperFoder)){
                File::makeDirectory($helperFoder,0755,true,true);
            }
            
            //migrations

            $migrationFoder = base_path('modules/'.$name.'/migrations');
            if(!File::exists($migrationFoder)){
                File::makeDirectory($migrationFoder,0755,true,true);
            }

            //resource
            $resourceFoder = base_path('modules/'.$name.'/resources');
            if(!File::exists($resourceFoder)){
                File::makeDirectory($resourceFoder,0755,true,true);

                $languageFoder = base_path('modules/'.$name.'/resources/lang');
            if(!File::exists($languageFoder)){
                File::makeDirectory($languageFoder,0755,true,true);
            }
            $viewFoder = base_path('modules/'.$name.'/resources/views');
            if(!File::exists($viewFoder)){
                File::makeDirectory($viewFoder,0755,true,true);
            }

            }

            //route

            $routeFoder = base_path('modules/'.$name.'/routes');
            if(!File::exists($routeFoder)){
                File::makeDirectory($routeFoder,0755,true,true);

                //tao routes file
            $routeFile = base_path('modules/'.$name.'/routes/routes.php');
            if(!File::exists($routeFile)){
                File::put($routeFile,'<?php 
use Illuminate\Support\Facades\Route;');
            }
            }

            //src
            $srcFoder = base_path('modules/'.$name.'/src');
            if(!File::exists($srcFoder)){
                File::makeDirectory($srcFoder,0755,true,true);

                $commandFoder = base_path('modules/'.$name.'/src/Commands');
            if(!File::exists($commandFoder)){
                File::makeDirectory($commandFoder,0755,true,true);
            }

            $HttpFoder = base_path('modules/'.$name.'/src/Http');
            if(!File::exists($HttpFoder)){
                File::makeDirectory($HttpFoder,0755,true,true);

                $ControllerFoder = base_path('modules/'.$name.'/src/Http/Controllers');
            if(!File::exists($ControllerFoder)){
                File::makeDirectory($ControllerFoder,0755,true,true);
            }
            $MiddlewaresFoder = base_path('modules/'.$name.'/src/Http/Middlewares');
            if(!File::exists($MiddlewaresFoder)){
                File::makeDirectory($MiddlewaresFoder,0755,true,true);
            }

            }
            $modelFoder = base_path('modules/'.$name.'/src/Models');
            if(!File::exists($modelFoder)){
                File::makeDirectory($modelFoder,0755,true,true);
            }


            //models
            $modelFoder = base_path('modules/'.$name.'/src/Models');
            if(!File::exists($modelFoder)){
                File::makeDirectory($modelFoder,0755,true,true);
            }

            



            $this->info('Module create succesfully');
        }
    }
}
}
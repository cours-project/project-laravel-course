<?php
namespace Modules;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Http\Middlewares\DemoMiddleware;
use File;
use Modules\User\src\Commands\TestComands;
use Modules\User\src\Repositories\UserRepository;

class ModuleServiceProvider extends ServiceProvider{

    private $middlewares =[
        'demo' => DemoMiddleware::class,
    ];

    private $commands = [
        TestComands::class,
    ];

    public function boot(){
    $modules = $this->getModules();
       if(!empty(  $modules)){
        foreach ($modules as $module) {
            $this->registerModule($module);
            }
       }
    }
    
    public function getModules(){
        $directories = array_map('basename',File::directories(__DIR__));
            return $directories;
        }

    private function registerModule($moduleName){
        $modulePath = __DIR__ . "/$moduleName";
    
        if(File::exists($modulePath."/routes/routes.php")){
            $this->loadRoutesFrom($modulePath."/routes/routes.php");
        }
            // Toàn bộ file migration của modules sẽ tự động được load
        if (File::exists($modulePath . "/migrations")) {
        $this->loadMigrationsFrom($modulePath . "/migrations");
        }
        
        // Khai báo languages
        if (File::exists($modulePath . "/resources/lang")) {
            $this->loadTranslationsFrom($modulePath."/resources/lang",strtolower($moduleName));
            $this->loadJSONTranslationsFrom($modulePath . '/resources/lang');
        }
        //Khai báo Views
        if (File::exists($modulePath . "/resources/views")) {
            $this->loadViewsFrom($modulePath."/resources/views", strtolower($moduleName));
        }
        //Khai bao Helper
        if (File::exists($modulePath . "/helper")) {
        $helper_dir =  File::allFiles($modulePath . "/helper");
        foreach ($helper_dir as $key => $value) {
            $file = $value->getPathName();
            require $file;
            }
        }

    }


     public function register(){
        
         //config
        $modules = $this->getModules();
        if(!empty($modules)){
            foreach($modules as $module){
               $this->registerConfig($module);
            
            }
        }

        // middereware
        $this->registerMiddlewares();
        

        
        //Commands
        $this->commands($this->commands);

        //repository
        $this->app->singleton(
            UserRepository::class
        );
     }


    private function registerConfig($module){
        $configPath = __DIR__ . "/" . $module . '/configs';
               
        if(File::exists($configPath)){
            $configFiles = array_map('basename',File::allFiles($configPath));
            foreach($configFiles as $config){
                $alias= basename($config, '.php');
                $this->mergeConfigFrom($configPath.'/'.$config,$alias);

            }
        }
    }

    private function registerMiddlewares(){
        if(!empty( $this->middlewares)){
            foreach($this->middlewares as $key=>$middleware){
                $this->app['router']->pushMiddlewareToGroup($key,$middleware);
            }
        }
    }
      

}
?>
<?php
namespace Modules;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;
use Modules\Categories\src\Repositories\CategoriesRepository;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;
use Modules\Courses\src\Models\CourseCategory;
use Modules\Courses\src\Repositories\CoursesRepository;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;
use Modules\Dashboard\src\Repositories\DashboardRepository;
use Modules\Dashboard\src\Repositories\DashboardRepositoryInterface;
use Modules\Lessons\src\Repositories\LessonsRepository;
use Modules\Lessons\src\Repositories\LessonsRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepository;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;
use Modules\User\src\Repositories\MongoUserRepository;
use Modules\User\src\Repositories\UserRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;
use Modules\Videos\src\Repositories\VideosRepository;
use Modules\Videos\src\Repositories\VideosRepositoryInterface;

class ModuleServiceProvider extends ServiceProvider{

    private $middlewares =[

    ];

    private $commands = [
      
    ];
    

    public function bindingsRepository(){
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
         );
         $this->app->singleton(
             CategoriesRepositoryInterface::class,
             CategoriesRepository::class
          );
         $this->app->singleton(
             CoursesRepositoryInterface::class,
             CoursesRepository::class
          );
          $this->app->singleton(
             DashboardRepositoryInterface::class,
             DashboardRepository::class
          );
          $this->app->singleton(
             TeacherRepositoryInterface::class,
             TeacherRepository::class
          );
          $this->app->singleton(
            LessonsRepositoryInterface::class,
            LessonsRepository::class
         );
         $this->app->singleton(
            VideosRepositoryInterface::class,
            VideosRepository::class 
         );
    }

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

      
        Route::middleware('web')->prefix('admin')->name('admin.')->group(function () use ($modulePath) {
       
            if(File::exists($modulePath."/routes/web.php")){
            $this->loadRoutesFrom($modulePath."/routes/web.php");
        }
    });

    Route::middleware('api')->prefix('api')->name('api.')->group(function () use ($modulePath) {
       
        if(File::exists($modulePath."/routes/api.php")){
        $this->loadRoutesFrom($modulePath."/routes/api.php");
    }
});
        
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
       $this->bindingsRepository();
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
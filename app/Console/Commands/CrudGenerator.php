<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator {name}';

    protected $description = 'Crud Generator';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument(
            'name'
        );
        $this->model($name);
        $this->request($name);
        $this->controller($name);

        // if(file model ada  File append gak di eksekusi){}
        File::append(
            base_path('routes/api.php'),'Route::resource(\'' . Str::plural(strtolower($name)) . "','API/" . $name . 'Controller\');'
        );
        // Artisan::call(
        //     'make:migration create_' . strtolower(Str::plural($name)) . '_table --create=' . strtolower(Str::plural($name))
        // );
    }

    protected function getStub($type)
    {
        return file_get_contents(
            resource_path("stubs/$type.stub")
        );
    }
    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );
        file_put_contents(
            app_path("/{$name}.php"),
            $modelTemplate
        );
    }

    protected function request($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub("Request")
        );
        if (!file_exists($path = app_path(
            'Http/Requests'
        ))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(
            app_path("/Http/Requests/{$name}Request.php"),
            $modelTemplate
        );
    }
    protected function controller($name)
    {
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name),
            ],
            $this->getStub('Controller')
        );

        file_put_contents(
            app_path("/Http/Controllers/API/{$name}Controller.php"),
            $modelTemplate
        );
    }
}

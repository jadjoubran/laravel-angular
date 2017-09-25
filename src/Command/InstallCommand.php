<?php

namespace Jadjoubran\LaravelAngular\Command;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravelangular:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Laravel & Angular package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->installValidationErrorFormat();

        $this->info('Laravel & Angular package installed successfully.');
    }

    public function fire()
    {
        return $this->handle();
    }

    public function installValidationErrorFormat()
    {
        $controllerPath = app_path('/Http/Controllers/Controller.php');
        $controller = file_get_contents($controllerPath);

        //do not install method more than once
        if (strpos($controller, 'formatValidationErrors')) {
            $this->info('[Skipped] formatValidationErrors already installed in Controller.');
            return true;
        }

        $validationErrorFormat = '
    protected function formatValidationErrors(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $status = 422;
        return [
            "message" => $status . " error",
            "errors" => [
                "message" => $validator->getMessageBag()->first(),
                "info" => [$validator->getMessageBag()->keys()[0]],
            ],
            "status_code" => $status
        ];
    }
}';

        $controller = str_replace('}', $validationErrorFormat, $controller);
        file_put_contents($controllerPath, $controller);
    }
}

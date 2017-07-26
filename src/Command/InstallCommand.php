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
    public function fire()
    {
        $this->installValidationErrorFormat();
    }

    public function installValidationErrorFormat()
    {
        $controller = file_get_contents(app_path('/Http/Controllers/Controller.php'));

        $validationErrorFormat = "protected function formatValidationErrors(Illuminate\Contracts\Validation\Validator $validator)
    {
         return $validator->errors()->getMessages();
    }
}";

        $controller = str_replace('}', $validationErrorFormat, $controller);
    }
}

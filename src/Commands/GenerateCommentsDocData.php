<?php

namespace App\Console\Commands\Cache;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use ReflectionClass;

class GenerateCommentsDocData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'l-api-response:generate-doc {class="\HttpStatusCodes\RFCStatusCodes"}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Comments Doc Data';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function handle()
    {
        $rc = new ReflectionClass($this->argument('class'));
        foreach ($rc->getConstants() as $constantName => $code) {
            if (is_int($code) && substr($constantName, 0, 5) === 'HTTP_') {
                $funcName = substr($constantName, 5);
                $funcName = Str::camel(Str::lower($funcName));
                $this->info("@method JsonResponse $funcName(array \$data = [], string \$message = null)");
            }
        }
    }
}

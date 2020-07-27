<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class FlushSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:flush {--driver=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all user session.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $driver = $this->option('driver') ? :config('session.driver');

        switch ($driver) {
            case 'database': $this->flushDB();
            break;
            case 'file': $this->flushFile();
            break;
            case 'all': $this->flushFile();
                        $this->flushDB();
            break;
        }
    }

    private function flushDB(){
        $table = config('session.table');
        if (Schema::hasTable($table)) {
            DB::table($table)->truncate();
            error_log($table.' was truncated');
        } else {
            error_log($table.' table does not exist');
        }
        return;
    }
    private function flushFile()
    {
        $path = config('session.files');
        
        if (File::exists($path)) {
            $files =   File::allFiles($path);
            File::delete($files);
            error_log( count($files).' sessions flushed');
        } else {
            error_log('check your session path exists');
        }
    }
}

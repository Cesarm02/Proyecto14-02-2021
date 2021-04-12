<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Restaurar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:restore {param}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restaurar la base de datos de la aplicación con el nombre seleccionado';

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
     * @return int
     */
    public function handle()
    {
        $param = $this->argument('param');
        $command = "";
        if (env('DB_CONNECTION') == 'mysql') {
            echo ("no hay");
            //$command = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > ".storage_path()."/app/backup/".$filename;
        } elseif (env('DB_CONNECTION') == 'pgsql') {
            //postgresql://usuario:clave@host:puerto/bdd
            $command = "psql -d postgresql://" . env('DB_USERNAME') . ":" . env('DB_PASSWORD') . "@" . env('DB_HOST') . ":" . env('DB_PORT') . "/" . env('DB_DATABASE') . " < " . storage_path() . "/app/backup/" . $param;
        }
        $returnVar = NULL;
        $output  = NULL;

        exec($command, $output, $returnVar);
        $this->info("Restaurado archivo " . $param);
    }
}

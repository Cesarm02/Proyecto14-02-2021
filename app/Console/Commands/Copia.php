<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class Copia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creación de la copia de la base datos, usando datos estblecidos en el archivo de configuración';

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
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";

        // En heroku las env vars aparecen vacias, toca crearlas
        $CONNECTION = "pgsql";
        $USERNAME = "qxlwuzwfebmsgx";
        $PASSWORD = "63cc43623103c56eaaa637131ef7fe608fa1da9c62cc4ac07c71a80d7023db1d";
        $DATABASE = "d53evd51u55q9h";
        $HOST = "ec2-54-196-33-23.compute-1.amazonaws.com";
        $PORT = "5432";

        $command = "";
        /*if(env('DB_CONNECTION') == 'mysql'){
            $command = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > ".storage_path()."/app/backup/".$filename;
        }elseif(env('DB_CONNECTION') == 'pgsql'){
            //postgresql://usuario:clave@host:puerto/bdd
            $command = "pg_dump --clean -d postgresql://".env('DB_USERNAME').":".env('DB_PASSWORD')."@".env('DB_HOST').":".env('DB_PORT')."/".env('DB_DATABASE')." -F p --inserts --no-privileges > ".storage_path()."/app/backup/".$filename;
        }*/
        if ($CONNECTION == 'pgsql') {
            $command = "pg_dump --clean -d postgresql://" . $USERNAME . ":" . $PASSWORD . "@" . $HOST . ":" . $PORT . "/" . $DATABASE . " -F p --inserts --no-privileges > " . storage_path() . "/app/backup/" . $filename;
        }

        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
        $this->info("Copia de seguridad " . $filename . " creada");
    }
}

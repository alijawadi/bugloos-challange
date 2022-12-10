<?php

namespace App\Console\Commands;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportLogToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import logs from text file to logs table.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->import();
        $this->info("Logs imported successfully.");
        return Command::SUCCESS;
    }

    /**
     * Open the log file line by line, then split every line to array elements.
     *
     * @return void
     */
    private function import(): void
    {
        $file_handle = fopen(base_path() . config('app.logs-path-to-import'), "r");
        while (!feof($file_handle)) {
            $line = fgets($file_handle);

            // Use regex to split the line to an array.
            $array = preg_split('/[-\[\]"\r\n]| /', $line, -1, PREG_SPLIT_NO_EMPTY);

            $this->insertToDB($array);
        }
        fclose($file_handle);
    }

    /**
     * Insert the array (log line) to db.
     *
     * @param array $array
     * @return void
     */
    private function insertToDB(array $array): void
    {
        $log = new Log();
        $log->name = $array[0];
        $log->time = Carbon::createFromFormat('d/M/Y:H:i:s', $array[2]);
        $log->method = $array[3];
        $log->path = $array[4];
        $log->http_version = $array[5];
        $log->status_code = $array[6];
        $log->save();
    }
}

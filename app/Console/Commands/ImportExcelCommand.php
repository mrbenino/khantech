<?php

namespace App\Console\Commands;

use App\Imports\ReviewsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from excel';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ini_set('memory_limit', '-1');

        Excel::import(new ReviewsImport , public_path('excel/reviews-small.csv'));

        dd('Done Excel Import!');
    }
}

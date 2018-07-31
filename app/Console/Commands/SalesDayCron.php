<?php

namespace App\Console\Commands;

use App\Models\Sale;
use Illuminate\Console\Command;

class SalesDayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salesday:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vendas do Dia.';

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
        // Inserir a Logica
        // pegar todas as vendas do dia
        //$date = Carbon::now();
        $date = Carbon::today();
        //$date->toDateString();

        $sale = Sale::whereBetween('created_at', [$date->isMidnight(), $date->isEndOfDay()])
            ->get();
    }
}

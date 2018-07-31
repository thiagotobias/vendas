<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailRelatorioDiario;
use Illuminate\Support\Carbon;
use App\Models\Sale;

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
    protected $description = 'Command description';

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
        $dateIni = Carbon::today();
        $date = Carbon::today();
        $dateFim = $date->addMinutes(1439);

        $sales = Sale::whereBetween('created_at', [$dateIni, $dateFim ])->sum('sale_value');
        $dados['date_ini'] = $dateIni;
        $dados['date_fim'] = $dateFim;
        $dados['total'] = $sales;

        Mail::send(new EmailRelatorioDiario($dados));

        $this->info('E-mail enviado com sucesso ...');
    }
}

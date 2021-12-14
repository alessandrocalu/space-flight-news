<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use App\Routines\SyncArticleRoutine;

class SyncArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine:sync-article';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ferramenta para a atualização de artigos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SyncArticleRoutine $syncArticleRoutine)
    {
        parent::__construct();

        $this->syncArticleRoutine = $syncArticleRoutine;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Começou '.date('d/m/Y H:i:s').'!');
        $this->syncArticleRoutine->run($this);
        $this->info('Terminou '.date('d/m/Y H:i:s').'!');
    }
}
<?php

namespace App\Console\Commands;

use App\Data\Wallet\WalletOperationData;
use App\Jobs\WalletOperationCreateJob;
use Exception;
use Illuminate\Console\Command;

class CreateOperation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:operation {userId} {dir} {value} {description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create operation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->argument('dir') !== 'asc' && $this->argument('dir') !== 'desc') {
            throw new Exception('Incorrect dir value');
        }

        $operationData = WalletOperationData::fromArray([
            'userId' => $this->argument('userId'),
            'value' => ($this->argument('dir') == 'asc' ? 1 : -1) * $this->argument('value'),
            'description' => $this->argument('description'),
        ]);
        WalletOperationCreateJob::dispatch($operationData);
    }
}

<?php

namespace App\Jobs;

use App\Data\Wallet\WalletOperationData;
use App\Services\WalletService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WalletOperationCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected WalletOperationData $walletOperationData)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(WalletService $walletService): void
    {
        $walletService->createOperation($this->walletOperationData);
    }
}

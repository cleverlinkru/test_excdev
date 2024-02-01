<?php

namespace App\Services;

use App\Data\Wallet\WalletOperationData;
use App\Data\Wallet\WalletOperationsFilterData;
use App\Models\User;
use App\Models\Wallet\WalletBalance;
use App\Models\Wallet\WalletOperation;
use Exception;

class WalletService
{
    public function getOperations(WalletOperationsFilterData $filter)
    {
        if (!request()->user()) {
            return collect();
        }

        return WalletOperation::query()
            ->where('balance_id', request()->user()->walletBalance->id)
            ->when($filter->limit !== null, function ($q) use ($filter) {
                $q->limit($filter->limit);
            })
            ->when($filter->search !== null, function ($q) use ($filter) {
                $search = strtolower($filter->search);
                $q->whereRaw("LOWER(description) like '%$search%'");
            })
            ->orderByDesc('created_at')
            ->get();
    }

    public function createOperation(WalletOperationData $operationData)
    {
        $user = User::with('walletBalance')->findOrFail($operationData->userId);
        $count = WalletBalance::query()
            ->where('id', $user->walletBalance->id)
            ->when($operationData->value < 0, function ($q) use ($operationData) {
                $q->whereRaw("value $operationData->value >= 0");
            })
            ->increment('value', $operationData->value);

        if (!$count) {
            throw new Exception('Insufficient funds');
        }

        WalletOperation::create([
            'balance_id' => $user->walletBalance->id,
            'value' => $operationData->value,
            'description' => $operationData->description,
        ]);
    }
}

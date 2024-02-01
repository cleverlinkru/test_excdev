<?php

namespace App\Http\Controllers;

use App\Data\Wallet\WalletOperationsFilterData;
use App\Http\Requests\HistoryRequest;
use App\Http\Resources\WalletOperationResource;
use App\Services\WalletService;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(WalletService $walletService)
    {
        $filter = WalletOperationsFilterData::fromArray(['limit' => self::OPERATIONS_COUNT]);
        $operations = $walletService->getOperations($filter);

        return Inertia::render('Home', [
            'operations' => WalletOperationResource::collection($operations),
            'refresh_interval' => self::REFRESH_INTERVAL,
        ]);
    }

    public function history(HistoryRequest $request, WalletService $walletService)
    {
        $filter = WalletOperationsFilterData::fromArray(['search' => $request->search]);
        $operations = $walletService->getOperations($filter);

        return Inertia::render('History', [
            'operations' => WalletOperationResource::collection($operations),
        ]);
    }

    protected const REFRESH_INTERVAL = 1;

    protected const OPERATIONS_COUNT = 5;
}

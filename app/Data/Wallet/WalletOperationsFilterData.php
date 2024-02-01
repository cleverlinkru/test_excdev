<?php

namespace App\Data\Wallet;

class WalletOperationsFilterData
{
    public ?int $limit = null;

    public ?string $search = null;

    public static function fromArray(array $data)
    {
        return new self($data);
    }

    protected function __construct(array $data)
    {
        $this->limit = $data['limit'] ?? null;
        $this->search = $data['search'] ?? null;
    }
}

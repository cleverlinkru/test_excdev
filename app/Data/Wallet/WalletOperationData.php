<?php

namespace App\Data\Wallet;

class WalletOperationData
{
    public int $userId;

    public int $value;

    public string $description;

    public static function fromArray(array $data)
    {
        return new self($data);
    }

    protected function __construct(array $data)
    {
        $this->userId = $data['userId'];
        $this->value = $data['value'];
        $this->description = $data['description'];
    }
}

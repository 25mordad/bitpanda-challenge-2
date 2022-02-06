<?php

namespace App\Services\Api;

use App\Contracts\Services\Api\TransactionApi;
use App\Models\Transaction;

final class DBSourceApi implements TransactionApi
{

    public function index(): array
    {
        return Transaction::all()->toArray();
    }
}

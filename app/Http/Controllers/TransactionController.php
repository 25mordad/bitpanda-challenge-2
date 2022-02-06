<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Contracts\Services\Api\TransactionApi;

final class TransactionController
{
    protected $transactionApi;

    public function __construct(TransactionApi $transactionApi)
    {
        $this->transactionApi = $transactionApi;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->transactionApi->index());
    }
}

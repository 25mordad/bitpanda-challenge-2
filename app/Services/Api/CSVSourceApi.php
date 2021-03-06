<?php

namespace App\Services\Api;

use App\Contracts\Services\Api\TransactionApi;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\CSVNotFoundException;

final class CSVSourceApi implements TransactionApi
{
    public function index(): array
    {
        $csvPath = storage_path('app/transactions.csv');
        $delimiter = ',';

		if (!file_exists($csvPath) || !is_readable($csvPath))
            throw new CSVNotFoundException();
		$header = NULL;
		$data = array();
		if (($handle = fopen($csvPath, 'r')) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
				if (!$header)
					$header = $row;
				else
					$data[] = array_combine($header, $row);
			}
			fclose($handle);
		}
		return $data;
	}
}

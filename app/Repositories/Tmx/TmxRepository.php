<?php

namespace App\Repositories\Tmx;

use App\Models\tmx_logs;
use App\Repositories\Tmx\ITmxRepository as ITmxRepository;
use Illuminate\Support\Facades\DB;

class TmxRepository implements ITmxRepository
{
    public function storeRequest(array $requestDetails)
    {
        return tmx_logs::create($requestDetails);
    }

    public function storeResponse($logId, array $responseDetails)
    {
        return tmx_logs::whereId($logId)->update($responseDetails);
    }

    public function getData(array $data)
    {
        //
    }

}
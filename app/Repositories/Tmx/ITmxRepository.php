<?php

namespace App\Repositories\Tmx;

interface ITmxRepository
{
    public function storeRequest(array $requestDetails);
    public function storeResponse($logId, array $requestDetails);
    public function getData(array $data);
}
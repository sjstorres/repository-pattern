<?php

namespace App\Http\Controllers;

use App\Repositories\Tmx\ITmxRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Traits\CanFormatResponse;
use App\Http\Requests\StoreTmxRequest;
use App\Http\Requests\UpdateTmxResponse;

class TmxController extends Controller
{
    private ITmxRepository $tmxRepository;
    use CanFormatResponse;

    public function __construct(ITmxRepository $tmxRepository)
    {
        $this->tmxRepository = $tmxRepository;

    }

    public function storeRequest(StoreTmxRequest $request):JsonResponse 
    {
        $requestDetails = $request->validated();
        //return $this->success($this->tmxRepository->storeRequest($requestDetails));
        return $this->created([$this->tmxRepository->storeRequest($requestDetails)]);
    }

    public function storeResponse(UpdateTmxResponse $response):JsonResponse 
    {
        $responseDetails = $response->validated();
        $logId = $response->route('id');
        return $this->success([$this->tmxRepository->storeResponse($logId, $responseDetails)]);
    }
}

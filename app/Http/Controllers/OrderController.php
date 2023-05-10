<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\Orders\IOrdersRepository;
use App\Traits\CanFormatResponse;
use App\Traits\SecretKeys;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
//for google secret manager
use Google\Cloud\SecretManager\V1\SecretManagerServiceClient;



class OrderController extends Controller
{
    use CanFormatResponse;
    use SecretKeys;
    private IOrdersRepository $orderRepository;


    public function __construct(IOrdersRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        

    }

    /**
     * Display a listing of the resource.
     */
    public function displaySecret(): JsonResponse
    {
            $username = $this->secrets("username");
            return $this->success([$username]);
        
    }

    public function index(OrderRequest $request): JsonResponse
    {
        // return response()->json([
        //     'data' => $this->orderRepository->getAllOrders()
        // ]);
            // $orderDetails = $request->validated();
            // $projectId = 'petnet-usp-dev-1';
            // $secretId = 'keyJson';
            // $versionId = '1';
            // $client = new SecretManagerServiceClient();
            // $name = $client->secretVersionName($projectId, $secretId, $versionId);
            // $secret = $client->getSecretVersion($name);
            // $response = $client->accessSecretVersion($secret->getName());
            // $payload = $response->getPayload()->getData();
            // //sample logging in storage/logs/laravel.log
            // //needs "use Illuminate\Support\Facades\Log";
            // $convert = json_decode($payload, true);
            $username = $this->secrets("username");
            //  Log::debug($username);


            return $this->success([$username]);
        //return $this->success([$convert["username"]]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        // $orderDetails = $request->only([
        //     'client',
        //     'details'
        // ]);
        $orderDetails = $request->validated();
        return response()->json([
            'data' => $this->orderRepository->createOrder($orderDetails)
        ], 
        Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->orderRepository->getOrderById($orderId)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request): JsonResponse
    {
        $orderId = $request->route('id');
        $orderDetails = $request->validated();

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $this->orderRepository->deleteOrder($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

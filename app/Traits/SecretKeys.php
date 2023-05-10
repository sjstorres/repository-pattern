<?php

namespace App\Traits;

use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Google\Cloud\SecretManager\V1\SecretManagerServiceClient;

trait SecretKeys
{
    private function secrets($field)
    {
        $projectId = 'petnet-usp-dev-1';
        $secretId = 'keyJson';
        $versionId = '1';
        $client = new SecretManagerServiceClient();
        $name = $client->secretVersionName($projectId, $secretId, $versionId);
        $secret = $client->getSecretVersion($name);
        $response = $client->accessSecretVersion($secret->getName());
        $payload = $response->getPayload()->getData();
        $convert = json_decode($payload, true);
        return $convert[$field];
    }

}

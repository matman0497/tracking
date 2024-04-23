<?php

namespace App\Services;

use App\Exceptions\ExternalRequestException;
use Illuminate\Support\Facades\Http;

class IpLookupService
{

    private const ENDPOINT = 'http://ip-api.com/json/';

    public function __construct()
    {

    }

    /**
     * @throws ExternalRequestException
     */
    public function getLocationFromIp(string $ipAddress): ?string
    {

        $response = Http::get(self::ENDPOINT . $ipAddress);

        $body = $response->json();

        if ($response->status() === 200) {
            return $body['city'] ?? null;
        }

        throw new ExternalRequestException($body['message'] ?? 'Unknown error');

    }
}

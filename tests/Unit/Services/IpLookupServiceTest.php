<?php

namespace Unit\Services;

use App\Exceptions\ExternalRequestException;
use App\Services\IpLookupService;
use Faker\Factory;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class IpLookupServiceTest extends TestCase
{

    public function testGetLocationFromIp()
    {
        $faker = Factory::create();
        $service = new IpLookupService();

        $ip = $faker->ipv4();
        $country = $faker->word();

        Http::fake(
            fn($request) => Http::response(json_encode(['city' => $country]))
        );

        $result = $service->getLocationFromIp($ip);

        $this->assertSame($country, $result);

    }

    public function testGetLocationFromIpThrowsExceptionIfNot200()
    {
        $this->expectException(ExternalRequestException::class);
        $this->expectExceptionMessage('Unknown error');
        $faker = Factory::create();
        $service = new IpLookupService();

        $ip = $faker->ipv4();

        Http::fake(
            fn($request) => Http::response(status: 500)
        );

        $service->getLocationFromIp($ip);

    }

    public function testGetLocationFromIpThrowsExceptionIfNotSuccessful()
    {
        $this->expectException(ExternalRequestException::class);
        $this->expectExceptionMessage('invalid ip address');
        $faker = Factory::create();
        $service = new IpLookupService();

        $ip = $faker->ipv4();

        Http::fake(
            fn($request) => Http::response(json_encode(['message' => 'invalid ip address']), 500)
        );

        $service->getLocationFromIp($ip);

    }
}

<?php

namespace Unit\Services;

use App\Models\Tracking;
use App\Repositories\TrackingRepositoryInterface;
use App\Services\IpLookupService;
use App\Services\TrackingService;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackingServiceTest extends TestCase
{
    use RefreshDatabase;

    /**  */
    public function testCreateFromRequest()
    {
        $this->expectNotToPerformAssertions();
        $faker = Factory::create();

        $trackingService = new TrackingService(
            $lookup = \Mockery::mock(IpLookupService::class),
            $repo = \Mockery::mock(TrackingRepositoryInterface::class),
        );

        $lookup->shouldReceive('getLocationFromIp')->andReturn($location = $faker->word());
        $repo->shouldReceive('create')
            ->with(
                [
                    'ip_address' => '127.0.0.1',
                    'location' => $location,
                ])
            ->andReturn(new Tracking());

        $trackingService->createFromRequest([
            'ip_address' => '127.0.0.1',
            'location' => $location,
        ]);

    }
}

<?php

namespace App\Services;

use App\Exceptions\ExternalRequestException;
use App\Models\Tracking;
use App\Repositories\TrackingRepositoryInterface;

class TrackingService
{

    public function __construct(
        private readonly IpLookupService $ipLookupService,
        private readonly TrackingRepositoryInterface $repository
    )
    {
    }

    /**
     * @throws ExternalRequestException
     */
    public function createFromRequest(array $request): Tracking
    {
        $request['location'] = $this->ipLookupService->getLocationFromIp($request['ip_address']);

        return $this->repository->create($request);

    }

}

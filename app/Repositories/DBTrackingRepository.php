<?php

namespace App\Repositories;

use App\Models\Tracking;

class DBTrackingRepository implements TrackingRepositoryInterface
{

    public function create(array $tracking): Tracking
    {
        return Tracking::create($tracking);
    }
}

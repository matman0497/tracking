<?php

namespace App\Repositories;

use App\Models\Tracking;

interface TrackingRepositoryInterface
{

    public function create(array $tracking): Tracking;

}

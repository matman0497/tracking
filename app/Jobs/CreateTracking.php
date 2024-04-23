<?php

namespace App\Jobs;

use App\Exceptions\ExternalRequestException;
use App\Services\TrackingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTracking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private array $request)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param TrackingService $trackingService
     * @return void
     * @throws ExternalRequestException
     */
    public function handle(TrackingService $trackingService): void
    {
        $trackingService->createFromRequest($this->request);
    }
}

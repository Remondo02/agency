<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DemoJob implements ShouldQueue
{
    use Queueable;

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(private Property $property)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo $this->property->title;
    }
}

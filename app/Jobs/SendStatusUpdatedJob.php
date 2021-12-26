<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendUpdateStatusEmail;
use Illuminate\Support\Facades\Mail;

class SendStatusUpdatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $complaint;
    public $complaintUser;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($complaint, $complaintUser)
    {
        $this->complaint = $complaint;
        $this->complaintUser = $complaintUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendUpdateStatusEmail($this->complaint);
        Mail::to($this->complaintUser)->send($email);
    }
}

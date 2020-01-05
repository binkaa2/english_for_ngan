<?php

namespace App\Jobs;

use App\Traits\Notify;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNotifyMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filter;

    protected $content;

    protected $url;

    /**
     * SendNotifyCreateOrder constructor.
     * @param $userId
     * @param $orderId
     */
    public function __construct($filter, $content, $url = false)
    {
        $this->filter = $filter;
        $this->content = $content;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notify = new Notify();
        $notify->sendNotifyToUser($this->filter,$this->content, $this->url);
    }
}

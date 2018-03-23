<?php

namespace App\Console\Commands\Banner;

use App\Entity\Banner\Banner;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Predis\Client;

class ExpireCommand extends Command
{
    protected $signature = 'banner:expire';

    private $client;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    public function handle(): bool
    {
        $success = true;

        foreach (Banner::active()->whereRaw('`limit` - views < 100')->with('user')->cursor() as $banner) {
            $key = 'banner_notify_' . $banner->id;
            if ($this->client->get($key)) {
                continue;
            }
            Mail::to($banner->user->email)->queue(new BannerExpiresSoonMail($banner));
            $this->client->set($key, true);
        }

        return $success;
    }
}

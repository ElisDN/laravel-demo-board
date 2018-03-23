<?php

namespace App\Http\Controllers;

use App\Entity\Banner\Banner;
use App\UseCases\Banners\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    public function get(Request $request)
    {
        $format = $request['format'];
        $category = $request['category'];
        $region = $request['region'];

        if (!$banner = $this->service->getRandomForView($category, $region, $format)) {
            return '';
        }

        return view('banner.get', compact('banner'));
    }

    public function click(Banner $banner)
    {
        $this->service->click($banner);
        return redirect($banner->url);
    }
}

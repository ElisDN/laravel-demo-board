<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\RegisterService;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    /**
     * @SWG\Post(
     *     path="/register",
     *     tags={"Profile"},
     *     @SWG\Parameter(name="body", in="body", required=true, @SWG\Schema(ref="#/definitions/RegisterRequest")),
     *     @SWG\Response(
     *         response=201,
     *         description="Success response",
     *     )
     * )
     */
    public function register(RegisterRequest $request)
    {
        $this->service->register($request);

        return response()->json([
            'success' => 'Check your email and click on the link to verify.'
        ], Response::HTTP_CREATED);
    }
}

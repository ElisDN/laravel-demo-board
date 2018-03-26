<?php

namespace App\Http\Controllers\Api\User;

use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileEditRequest;
use App\Http\Serializers\UserSerializer;
use App\UseCases\Profile\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $service;
    /**
     * @var UserSerializer
     */
    private $serializer;

    public function __construct(ProfileService $service, UserSerializer $serializer)
    {
        $this->service = $service;
        $this->serializer = $serializer;
    }

    public function show(Request $request): array
    {
        $user = $request->user();
        return $this->serializer->profile($user);
    }

    public function update(ProfileEditRequest $request): array
    {
        $this->service->edit($request->user()->id, $request);

        $user = User::findOrFail($request->user()->id);
        return $this->serializer->profile($user);
    }
}

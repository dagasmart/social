<?php

namespace DagaSmart\Social\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class SocialController extends AdminController
{
    public function index(): JsonResponse|JsonResource
    {
        $page = $this->basePage()->body('Social Extension.');

        return $this->response()->success($page);
    }
}

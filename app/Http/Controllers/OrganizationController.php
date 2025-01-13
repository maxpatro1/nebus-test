<?php

namespace App\Http\Controllers;

use App\Filters\OrganizationFilter;
use App\Http\Requests\OrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    /**
     * Получение списка продуктов с фильтрацией
     *
     * @param OrganizationRequest $request
     * @param OrganizationFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(OrganizationRequest $request, OrganizationFilter $filter): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $products = Organization::filter($filter)->get();

        return  OrganizationResource::collection($products);
    }
}

<?php

namespace App\Http\Controllers;

use App\Filters\OrganizationFilter;
use App\Http\Requests\OrganizationRequest;
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
     * @return JsonResponse
     */
    public function index(OrganizationRequest $request, OrganizationFilter $filter): JsonResponse
    {
        $products = Organization::filter($filter)->get();

        return response()->json($products);
    }
}

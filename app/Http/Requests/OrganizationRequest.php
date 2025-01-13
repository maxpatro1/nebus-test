<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'building_id' => 'nullable|numeric',
            'id' => 'nullable|numeric',
            'activity_id' => 'nullable|int',
//            'area' => 'nullable|array',
            'area.latitude_max' => 'nullable|numeric|min:0',
            'area.longitude_min' => 'nullable|numeric|min:0',
            'area.latitude_min' => 'nullable|numeric|min:0',
            'area.longitude_max' => 'nullable|numeric|min:0',
        ];
    }

}

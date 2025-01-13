<?php

namespace App\Filters;

use App\Models\OrganizationActivity;
use Illuminate\Database\Eloquent\Builder;

class OrganizationFilter extends Filter
{
    /**
     * @param string $value
     * @return Builder
     */
    protected function name(string $value): Builder
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }

    /**
     * @param string $value
     * @return Builder
     */
    protected function id(string $value): Builder
    {
        return $this->builder->where('id', $value);
    }

    /**
     * Фильтрация по цене
     *
     * @param int $value
     * @return Builder
     */
    protected function activityId(int $value): Builder
    {
        $activityIds = OrganizationActivity::getSubActivities($value);
        return $this->builder->whereIn('activity_id', $activityIds);
    }

    /**
     * @param integer $value
     * @return Builder
     */
    protected function buildingId(int $value): Builder
    {
        return $this->builder->where('building_id', $value);
    }

    protected function area( $value): Builder
    {
        return $this->builder->whereHas('building', function (Builder $query) use ($value) {
            $query->whereBetween('latitude', [$value['latitude_min'], $value['latitude_max']])
                ->whereBetween('longitude', [$value['longitude_min'], $value['longitude_max']]);
        });
    }
}

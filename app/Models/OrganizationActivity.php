<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public static function getSubActivities($activityId): array
    {
        $result = [$activityId];

        $activities = OrganizationActivity::query()
            ->whereIn('parent_id', [$activityId])
            ->pluck('id');

        if ($activities->isEmpty()) {
            return $result;
        }

        foreach ($activities as $subActivityId) {
            $result = array_merge($result, self::getSubActivities($subActivityId));
        }

        return $result;
    }
}

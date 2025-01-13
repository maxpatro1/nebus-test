<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Organization extends Model
{
    use HasFilter;
    use HasFactory;

    protected $fillable = [
        'name',
        'activity_id',
        'building_id',
    ];

    public function phones(): HasMany
    {
        return $this->hasMany(OrganizationPhone::class);
    }

    public function building(): HasOne
    {
        return $this->hasOne(Building::class, 'id', 'building_id');
    }

    public function activity(): HasOne
    {
        return $this->hasOne(OrganizationActivity::class, 'id', 'activity_id');
    }
}

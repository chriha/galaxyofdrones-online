<?php

namespace Koodilab\Models\Queries;

use Koodilab\Models\Unit;

trait FindAvailableUnits
{
    /**
     * Find available units.
     *
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|Unit[]
     */
    public function findAvailableUnits($columns = ['*'])
    {
        $except = $this->units()->pluck('id');

        return Unit::whereNotIn('id', $except)
            ->orderBy('sort_order')
            ->get($columns);
    }
}

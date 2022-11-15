<?php

namespace App\Http\Controllers\Api\V1\Positions;

use App\Exceptions\Api\V1\PositionsNotFound;
use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;

class PositionsIndex extends Controller
{
    public function __invoke()
    {
        $positions = Position::all();

        if(!$positions->count()) {
            throw new PositionsNotFound();
        }

        return [
            'success' => true,
            'positions' => PositionResource::collection($positions)
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $items = Region::orderBy('name')->get();

        return $this->response(RegionResource::collection($items));
    }
}

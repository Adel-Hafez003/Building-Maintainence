<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnicianDetailRequest;
use App\Http\Requests\UpdateAdminTechnicianRequest;
use App\Http\Resources\AdminTechnicianDetailResource;
use App\Models\TechnicianDetail;
use Illuminate\Http\Request;

class AdminTechnicianDetailController extends Controller
{
    public function index()
    {
        $items=TechnicianDetail::latest()->get();
        return $this->response(AdminTechnicianDetailResource::collection($items));
    }
    public function store(StoreTechnicianDetailRequest $request)
    {
        $item = TechnicianDetail::create($request->validated());
       return $this->response(new AdminTechnicianDetailResource($item,'success', 201));
    }
    public function show($id)
    {
      $item=TechnicianDetail::findOrFail($id);
      return $this->response(new AdminTechnicianDetailResource($item));
    }

    public function update(UpdateAdminTechnicianRequest $request, $id)
    {
        $item = TechnicianDetail::findOrFail($id);
        $item->update($request->validated());
        return $this->response(new AdminTechnicianDetailResource($item));
    }

    public function destroy($id)
    {
       $item=TechnicianDetail::findOrFail($id);
       $item->delete();
      return $this->response(
      null,                                  // data (بعد الحذف عادة ما نرجّع data)
      'The technician has been deleted',     // message
       200);   
    }                                 // code (اختياري)
}

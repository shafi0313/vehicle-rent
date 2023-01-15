<?php

namespace App\Http\Controllers\Admin;

use App\Models\VehicleBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVehicleBrandRequest;

class VehicleBrandController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('vehicle-brand-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            $vehicleCategories = VehicleBrand::orderBy('name');
            return DataTables::of($vehicleCategories)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('vehicle-brand-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.vehicle-brand.edit', $row->uuid) , 'row' => $row]);
                    }
                    if (userCan('vehicle-brand-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.vehicle-brand.destroy', $row->uuid), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'image', 'created_at'])
                ->make(true);
        }
        return view('dashboard.vehicle_brand.index');
    }


    public function store(StoreVehicleBrandRequest $request)
    {
        if ($error = $this->authorize('vehicle-brand-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            VehicleBrand::create($data);
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, VehicleBrand $vehicle_brand)
    {
        if ($error = $this->authorize('vehicle-brand-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('dashboard.vehicle_brand.edit')->with(['vehicle_brand' => $vehicle_brand])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }

    public function update(StoreVehicleBrandRequest $request, VehicleBrand $vehicle_brand)
    {
        if ($error = $this->authorize('vehicle-brand-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            $vehicle_brand->update($data);
            return response()->json(['message'=> 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function destroy(VehicleBrand $vehicle_brand)
    {
        if ($error = $this->authorize('vehicle-brand-delete')) {
            return $error;
        }
        try {
            $vehicle_brand->delete();
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=> __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}

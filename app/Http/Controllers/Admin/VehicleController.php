<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVehicleRequest;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('vehicle-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            $vehicles = Vehicle::orderBy('name');
            return DataTables::of($vehicles)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('vehicle-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.vehicle.edit', $row->uuid) , 'row' => $row]);
                    }
                    if (userCan('vehicle-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.vehicle.destroy', $row->uuid), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['check', 'age', 'action', 'image', 'created_at'])
                ->make(true);
        }
        return view('dashboard.vehicle.index');
    }


    public function store(StoreVehicleRequest $request)
    {
        if ($error = $this->authorize('vehicle-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            Vehicle::create($data);
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, Vehicle $vehicle)
    {
        if ($error = $this->authorize('vehicle-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('dashboard.vehicle.edit')->with(['vehicle' => $vehicle])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }

    public function update(StoreVehicleRequest $request, Vehicle $vehicle)
    {
        if ($error = $this->authorize('vehicle-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            $vehicle->update($data);
            return response()->json(['message'=> 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($error = $this->authorize('vehicle-delete')) {
            return $error;
        }
        try {
            $vehicle->delete();
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=> __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}

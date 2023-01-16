<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use Illuminate\Http\Request;
use App\Models\VehicleCategory;
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
                ->addColumn('rider_name', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('brand_name', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('image', function ($row) {
                    $src = asset('uploads/images/vehicle/'.$row->image);
                    return '<img src="'.$src.'" width="100px">';
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('vehicle-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.vehicle.edit', $row->id) , 'row' => $row]);
                    }
                    if (userCan('vehicle-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.vehicle.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['rider_name','brand_name','action', 'image', 'created_at'])
                ->make(true);
        }
        $users = User::whereRole(2)->orderBy('name')->get(['id', 'name']);
        $vehicleCategories = VehicleCategory::orderBy('name')->get(['id', 'name']);
        $vehicleBrands = VehicleBrand::orderBy('name')->get(['id', 'name']);
        return view('dashboard.vehicle.index', compact('users', 'vehicleCategories', 'vehicleBrands'));
    }

    public function store(StoreVehicleRequest $request)
    {
        if ($error = $this->authorize('vehicle-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['user_id'] = user()->id;
        if($request->hasFile('image')){
            $data['image'] = imageStore($request, 'image','vehicle', 'uploads/images/vehicle/');
        }

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

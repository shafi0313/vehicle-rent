<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\VehicleCategory;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreVehicleCategoryRequest;

class VehicleCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('vehicle-category-manage')) {
            return $error;
        }
        if ($request->ajax()) {
            $vehicleCategories = VehicleCategory::orderBy('name');
            return DataTables::of($vehicleCategories)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (userCan('vehicle-category-edit')) {
                        $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.vehicle-category.edit', $row->id) , 'row' => $row]);
                    }
                    if (userCan('vehicle-category-delete')) {
                        $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.vehicle-category.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'image', 'created_at'])
                ->make(true);
        }
        return view('dashboard.vehicle_category.index');
    }


    public function store(StoreVehicleCategoryRequest $request)
    {
        if ($error = $this->authorize('vehicle-category-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            VehicleCategory::create($data);
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function edit(Request $request, VehicleCategory $Vehicle_category)
    {
        if ($error = $this->authorize('vehicle-category-edit')) {
            return $error;
        }
        if ($request->ajax()) {
            $modal = view('dashboard.vehicle_category.edit')->with(['Vehicle_category' => $Vehicle_category])->render();
            return response()->json(['modal' => $modal], 200);
        }
        return abort(500);
    }

    public function update(StoreVehicleCategoryRequest $request, VehicleCategory $Vehicle_category)
    {
        if ($error = $this->authorize('vehicle-category-add')) {
            return $error;
        }
        $data = $request->validated();

        try {
            $Vehicle_category->update($data);
            return response()->json(['message'=> 'Data Successfully Inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=>__('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }

    public function destroy(VehicleCategory $Vehicle_category)
    {
        if ($error = $this->authorize('vehicle-category-delete')) {
            return $error;
        }
        try {
            $Vehicle_category->delete();
            return response()->json(['message'=> __('app.success-message')], 200);
        } catch (\Exception $e) {
            return response()->json(['message'=> __('app.oops')], 500);
            // return response()->json(['message'=>$e->getMessage()], 500);
        }
    }
}

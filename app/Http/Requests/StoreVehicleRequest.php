<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'vehicle_category_uuid' => 'required|uuid',
            'vehicle_brand_uuid'    => 'required|uuid',
            'name'                  => 'required|string',
            'num_of_seat'           => 'required|integer',
            'num_of_passenger'      => 'required|integer',
            'model'                 => 'required|string',
            'specification'         => 'nullable|text',
            'image'                 => 'nullable|image||mimes:jpeg,png,jpg',
        ];
    }
}

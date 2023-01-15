<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="ajaxStore(event, this, 'createModal')" action="{{ route('admin.vehicle.store') }}"
                method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="user_uuid" class="form-label required">Rider </label>
                                <select name="user_uuid" class="form-select mb-3" required>
                                    <option value="">Choose...</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->uuid }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @if ($errors->has('user_uuid'))
                                <div class="alert alert-danger">{{ $errors->first('user_uuid') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="vehicle_category_uuid" class="form-label required">Vehicle Category </label>
                                <select name="vehicle_category_uuid" class="form-select mb-3" required>
                                    <option value="">Choose...</option>
                                    @foreach ($vehicleCategories as $vehicleCategory)
                                    <option value="{{ $vehicleCategory->uuid }}">{{ $vehicleCategory->name }}</option>
                                    @endforeach
                                </select>
                            @if ($errors->has('vehicle_category_uuid'))
                                <div class="alert alert-danger">{{ $errors->first('vehicle_category_uuid') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="vehicle_brand_uuid" class="form-label required">Vehicle Brand </label>
                                <select name="vehicle_brand_uuid" class="form-select mb-3" required>
                                    <option value="">Choose...</option>
                                    @foreach ($vehicleBrands as $vehicleBrand)
                                    <option value="{{ $vehicleBrand->uuid }}">{{ $vehicleBrand->name }}</option>
                                    @endforeach
                                </select>
                            @if ($errors->has('vehicle_brand_uuid'))
                                <div class="alert alert-danger">{{ $errors->first('vehicle_brand_uuid') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label required">Name </label>
                            <input type="search" name="name" class="form-control" value="{{ old('name') }}"
                                required />
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        {{-- <div class="col-md-6">
                            <label for="num_of_seat" class="form-label required">Number of Seat </label>
                            <input type="number" name="num_of_seat" class="form-control" value="{{ old('num_of_seat') }}"
                                required />
                            @if ($errors->has('num_of_seat'))
                                <div class="alert alert-danger">{{ $errors->first('num_of_seat') }}</div>
                            @endif
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <label for="num_of_passenger" class="form-label required">Number of Passenger </label>
                            <input type="number" name="num_of_passenger" class="form-control" value="{{ old('num_of_passenger') }}"
                                required />
                            @if ($errors->has('num_of_passenger'))
                                <div class="alert alert-danger">{{ $errors->first('num_of_passenger') }}</div>
                            @endif
                        </div> --}}
                        <div class="col-md-6">
                            <label for="num_of_seat" class="form-label required">Number of Seat </label>
                                <select name="num_of_seat" class="form-select mb-3" required>
                                    <option value="">Choose...</option>
                                    @for ($seat = 1; $seat <= 80; $seat++)
                                    <option value="{{ $seat }}">{{ $seat }}</option>
                                    @endfor
                                </select>
                            @if ($errors->has('num_of_seat'))
                                <div class="alert alert-danger">{{ $errors->first('num_of_seat') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="num_of_passenger" class="form-label required">Number of Passenger </label>
                                <select name="num_of_passenger" class="form-select mb-3" required>
                                    <option value="">Choose...</option>
                                    @for ($passenger = 1; $passenger <= 80; $passenger++)
                                    <option value="{{ $passenger }}">{{ $passenger }}</option>
                                    @endfor
                                </select>
                            @if ($errors->has('num_of_passenger'))
                                <div class="alert alert-danger">{{ $errors->first('num_of_passenger') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="model" class="form-label required">Model </label>
                            <input type="text" name="model" class="form-control" value="{{ old('model') }}"
                                required />
                            @if ($errors->has('model'))
                                <div class="alert alert-danger">{{ $errors->first('model') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label required">Image </label>
                            <input type="file" name="image" class="form-control" required />
                            @if ($errors->has('image'))
                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="specification" class="form-label">Specification </label>
                            <input type="text" name="specification" class="form-control" value="{{ old('specification') }}" />
                            @if ($errors->has('specification'))
                                <div class="alert alert-danger">{{ $errors->first('specification') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

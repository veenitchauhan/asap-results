<div class="card">
    <div class="card-body">
        <form action="{{ route('collection.search') }}" method="post">@csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <select name="location_id" class="custom-select">
                        <option value="">-- Select Collection Site --</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-warning">Search</button>
        </form>
    </div>
</div>
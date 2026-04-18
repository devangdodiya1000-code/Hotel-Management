@if ($rooms->count() > 0)
    @foreach ($rooms as $room)
        <div class="col-md-4 mb-4 card-item room" data-aos="fade-up">
            <div class="card">
                <img src="{{ asset('uploads/'.$room->image)}}" class="card-img-top">
                <div class="card-body">
                    <h5>{{ $room->name }}</h5>
                    <p>{{ $room->type->name }}</p>
                    <span class="text-warning">₹5000/night</span>
                    <br><br>
                    <button class="btn btn-dark">View</button>
                </div>
            </div>
        </div>
    @endforeach
@else
<div class="col-md-4 mb-4 card-item room" data-aos="fade-up">
    <div class="card">
        <h2>No Data Found</h2>
    </div>
</div>
@endif


@if ($rooms->count() > 0)
    @foreach ($rooms as $room)
        <div class="col-md-4 mb-4 card-item room" data-aos="fade-up">
            <div class="card">
                <img src="{{ asset('uploads/'.$room->image)}}" class="card-img-top">
                <div class="card-body">
                    <h5>{{ $room->name }}</h5>
                    <p>{{ $room->type->name }}</p>
                    <span class="text-gray">₹{{ $room->price }}</span>
                    <br><br>
                    {{-- <button class="btn btn-dark">View</button> --}}
                    <a href="{{ route('room.book', $room->id) }}" class="btn btn-dark">View</a>
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


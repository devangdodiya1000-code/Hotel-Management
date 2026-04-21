@include('frontend.header');
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar */
        .navbar {
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #f8b400 !important;
        }

        /* Hero */
        .hero {
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1566073771259-6a8506099945') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            animation: fadeInDown 1s;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Cards */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .card img {
            transition: 0.4s;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        /* Footer */
        footer {
            background: #111;
            color: #ccc;
            padding: 40px 0;
        }

        footer a {
            color: #ccc;
            text-decoration: none;
        }

        footer a:hover {
            color: #f8b400;
        }

        /* Scroll Top */
        #topBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">LuxuryStay</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Hero -->
<div class="container py-5 mt-5 d-flex justify-content-center align-items-center">

    <div class="row">
        <!-- Room Image -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('uploads/' . $room->image) }}"
                    alt="Room Image"
                    class="img-fluid rounded"
                    style="height: 350px; object-fit: cover;">
            </div>
        </div>

        <!-- Room Details -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4 h-100">

                <h3 class="mb-3">{{ $room->name }}</h3>

                <hr>

                <div class="mb-3">
                    <strong class="text-muted">Type:</strong>
                    <span>{{ $room->type->name ?? '-' }}</span>
                </div>

                <div class="mb-3">
                    <strong class="text-muted">Sub Type:</strong>
                    <span>{{ $room->subtype->name ?? '-' }}</span>
                </div>

                <div class="mb-3">
                    <strong class="text-muted">Status:</strong>
                    @if($room->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </div>

                <div class="mb-4">
                    <strong class="text-muted">Price:</strong>
                    <h4 class="text-primary mt-1">₹ {{ $room->price }}</h4>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2 mt-auto">

                    <!-- Back Button -->
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary w-50">
                        ← Back
                    </a>

                    <!-- Book Now Button -->
                    <a href="{{ route('room.book', $room->id) }}" class="btn btn-dark w-50">
                        Book Now
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>


@include('frontend.footer');

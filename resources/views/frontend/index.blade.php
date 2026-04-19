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

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero" id="home">
    <div>
        <h1>Welcome to Luxury Stay</h1>
        <p>Experience comfort & elegance</p>
        <a href="#rooms" class="btn btn-warning m-2">Explore Rooms</a>
        {{-- <a href="#" class="btn btn-outline-light m-2">Book Now</a> --}}
    </div>
</section>

<!-- Filter -->
<div class="container text-center my-5">
    <button class="btn btn-outline-dark search-type" data-id="">All</button> <?php /*on active "btn-dark text-white" <- add this classes */ ?>
    @foreach ($types as $type)
        <button class="btn btn-outline-dark search-type" data-id="{{ $type->id }}">{{ $type->name }}</button>
    @endforeach
</div>

<!-- Cards -->
<div class="container" id="rooms">
    <div class="row" id="cardContainer"></div>
</div>

<!-- Testimonials -->
<div class="container my-5" id="about">
    <h2 class="text-center mb-4">What Our Guests Say</h2>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active text-center">
                <p>"Amazing experience!"</p>
            </div>
            <div class="carousel-item text-center">
                <p>"Best hotel ever!"</p>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div class="container my-5" id="contact">
    <h2 class="text-center mb-4">Contact Us</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="contactForm">
                @csrf
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        <span class="text-danger error-text name_error"></span>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Subject / Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter subject" >
                    <span class="text-danger error-text description_error"></span>
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message..." ></textarea>
                    <span class="text-danger error-text message_error"></span>
                </div>

                <!-- Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Send Message</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer id="contact1">
    <div class="container text-center">
        <p>© 2026 LuxuryStay | All Rights Reserved</p>
    </div>
</footer>

<button id="topBtn" class="btn btn-warning">↑</button>

@include('frontend.footer');

<script>
    $(document).ready(function() {
        getRoomCards();

        $('.search-type').on('click', function() {
            var type_id = $(this).data('id');
            getRoomCards(type_id);
        })
    });

    function getRoomCards(type_id = '') {

        $.ajax({
            url: "{{ route('home.rooms.get') }}",
            type: 'GET',
            data: {
                type: type_id,
            },
            success: function(response) {
                $('#cardContainer').html(response.html);
            }
        });
    }

    $(document).on('submit', '#contactForm', function(e) {
        e.preventDefault();

        // let form = new FormData($('#contactForm')[0]);
        let form = $(this).serialize();

        $.ajax({
            url: "{{ route('home.contact.store') }}",
            type: "POST",
            data: form,
            // processData: false,
            // contentType: false,
            success: function(response) {
                alert(response.message);
                // $('#contactForm').trigger('reset');
                $('#contactForm')[0].reset();
            },
            error: function(error) {
                if(error.status == 422) {
                    let errors = error.responseJSON.errors;

                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            }
        })
    });

    $(document).on('input change', '#contactForm input, #contactForm textarea', function() {
        let fields = $(this).attr('name');

        $('.' + fields + '_error').text('');
        $(this).removeClass('is_invalid');
    });
</script>


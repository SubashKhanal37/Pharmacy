<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    {{-- newtheme --}}

    {{-- cropper js --}}



    {{-- datatables --}}

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('frontend/css/card.css') }}">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" /> --}}

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->






        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="input-group responsive ml-5">
                    <input class="form-control border-end-0 animate__animated animate__pulse border rounded-pill d-none"
                        type="search" id="search" name="search" placeholder="Search for products">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary bg-light border-start-0 border rounded-pill ms-n3"
                            type="button" id="searchbtn" onclick="clicked()">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
                <script type="text/javascript">
                    function clicked() {
                        search = document.getElementById('search');

                        // search.classList.toggle('animate__bounceOut');
                        search.classList.toggle('d-none');

                    };
                    var route = "{{ url('autocomplete-search') }}";
                    $('#search').typeahead({
                        source: function(query, process) {
                            return $.get(route, {
                                query: query
                            }, function(data) {
                                return process(data);
                            });
                        }
                    });
                </script>
                <div class="navbar-nav align-items-center ms-auto">

                    {{-- <div class="input-group">
                        <input type="text" class="form-control search-box-text" name="search" id="search"
                            aria-describedby="helpId" placeholder="Search for products">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-search"
                                aria-hidden="true"></i></span>
                    </div> --}}


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-cart-arrow-down rounded-circle" aria-hidden="true"></i>
                            <span class='badge badge-warning' id='lblCartCount'>@php
                                $cartItems = \Cart::getContent();
                                $i = count($cartItems);
                                echo $i;
                            @endphp </span>
                            <span class="d-none d-lg-inline-flex">Cart</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 shadow rounded-bottom m-0">
                            @foreach ($cartItems as $cart)
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="storage/product/{{ $cart->attributes->image }}"
                                            alt="" style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0"><b>{{ $cart->name }}</b></h6>
                                            <small>{{ 'Quantity:     ' . $cart->quantity }}</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach


                            <a href="{{ Route('cart.list') }}" class="dropdown-item text-center">See Cart</a>
                        </div>
                    </div>



                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end shadow bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end shadow bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->


                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            <img class="rounded-circle me-lg-2"
                                                src="{{ url('storage/avatar/' . Auth::user()->avatar) }}" alt=""
                                                style="width: 40px; height: 40px;">
                                            {{ Auth::user()->name }}
                                        </a>


                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a href="#" class="dropdown-item" onclick="hello()">My Profile</a>




                                            <a href="#" class="dropdown-item">Settings</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="modal fade" id='toggleMyModal'>
                <div class="modal-dialog modal-dialog-centered rounded">
                    <div class=" bg-light modal-content rounded p-4 container-fluid emp-profile">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="{{ url('storage/avatar/' . Auth::user()->avatar) }}" class="border"
                                            alt="" />
                                        <label for="avatar">
                                            <div class="file btn btn-lg btn-primary">
                                                Change Avatar
                                                <input type="file" id="avatar" class="avatar" name="avatar">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                        <h5>
                                            {{ Auth::user()->name }}
                                        </h5>
                                        <h6>
                                            {{ Auth::user()->role }}
                                        </h6>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                    href="#home" role="tab" aria-controls="home"
                                                    aria-selected="true">About</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="profile-edit-btn" name="btnAddMore"
                                        value="Edit" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>User Id</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ Auth::user()->id }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ Auth::user()->name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ Auth::user()->phone }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Role</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ Auth::user()->roles[0]->name }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <p class="text-center mb-0"><button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button></p>
                        </form>
                    </div>
                </div>

            </div>



            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop Image before upload
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" id="x">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img id="image" style="display:block;max-width:100%"
                                            src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cancel"
                                data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </div>
                </div>
                <p><img id="output" width="200" class="" /></p>
            </div>





            <script>
                var viewImage = function(event) {
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
            <script>
                function hello() {
                    var myModal = new bootstrap.Modal(document.getElementById('toggleMyModal'), {
                        keyboard: false
                    })
                    var modalToggle = document.getElementById('toggleMyModal') // relatedTarget
                    myModal.show(modalToggle);
                }
            </script>
            <script>
                var $modal = $('#modal');
                var image = document.getElementById('image');
                var cropper;
                $("body").on("change", ".avatar", function(e) {
                    var files = e.target.files;
                    var done = function(url) {
                        image.src = url;
                        $modal.modal('show');


                    };
                    var reader;
                    var file;
                    var url;
                    if (files && files.length > 0) {
                        file = files[0];
                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function(e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
                $('#cancel').click(function() {
                    $modal.modal('hide');
                });
                $('#x').click(function() {
                    $modal.modal('hide');
                });
                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview: '.preview'
                    });
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
                $("#crop").click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 160,
                        height: 160,

                    });
                    canvas.toBlob(function(blob) {
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;

                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "crop-image-upload",
                                data: {
                                    '_token': $('meta[name="_token"]').attr('content'),
                                    'image': base64data

                                },
                                success: function(data) {
                                    console.log(data);
                                    $modal.modal('hide');
                                }
                            });
                        }
                    });


                })
            </script>

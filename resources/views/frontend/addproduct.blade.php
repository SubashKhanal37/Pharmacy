@extends('frontend.layout.main')
@section('main-container')
    <div class="col md-12">
        <div class="bg-light rounded h-100 mt-2 p-4">
            <h6 class="mb-4">Add product</h6>
            <form class="row g-3 needs-validation" enctype="multipart/form-data" action="{{ route('products.store') }}"
                method="POST" novalidate>
                @csrf
                <div class="col-md-4">
                    <label for="name" class="form-label">Product name</label>
                    <input type="text" name="name" class="form-control" id="validationCustom01" required>
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="code" class="form-label">Product Code:</label>
                    <input type="text" name="code" class="form-control" id="validationCustom02" required>
                    @error('code')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="excerpt" class="form-label">Short Description:</label>
                    <div class="input-group">
                        <input type="text" name="excerpt" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend">
                    </div>
                    @error('excerpt')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="description">Product Description:</label>
                    <textarea class="form-control" name="description" id="" rows="1"></textarea>
                    @error('description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="image">Upload image</label>
                    <input type="file" name="image" class="image form-control">


                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Laravel Cropper Js - Crop Image Before Upload -
                                        Tutsmake.com
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
                    </div>


                    <p><img id="output" width="200" class="" /></p>

                    <script>
                        var viewImage = function(event) {
                            var image = document.getElementById('output');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                    @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="supplier_id">Select supplier:</label>
                        <select class="form-control" name="supplier_id" id="">
                            @php

                                $users = app\Models\User::whereHas('roles', function ($q) {
                                    $q->whereIn('name', ['Admin']);
                                })->get();
                            @endphp
                            @foreach ($users as $dat)
                                <option value="{{ $dat->id }}">{{ $dat->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" name="quantity" id="" aria-describedby="helpId"
                            placeholder="">
                    </div>
                    @error('quantity')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="m_date">Manufactured date:</label>
                        <input type="date" class="form-control" name="m_date" id="">
                    </div>
                    @error('m_date')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="e_date">Expiry date:</label>
                        <input type="date" class="form-control" name="e_date" id="">
                    </div>
                    @error('e_date')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="p_price">Purchased Price:</label>
                        <input type="number" class="form-control" name="p_price" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>
                    @error('p_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="s_price">Selling Price:</label>
                        <input type="number" class="form-control" name="s_price" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>
                    @error('s_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="dis_percent">Discount percentage:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="dis_percent" id=""
                            aria-describedby="helpId" placeholder="">
                        <span class="input-group-text" id="inputGroupPrepend">%</span>
                    </div>
                    @error('dis_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Add product</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e) {
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
                width: 1000,
                height: 1000,

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
@endsection

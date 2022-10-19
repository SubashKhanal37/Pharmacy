@extends('frontend.layout.main')
@section('main-container')
    <br>
    <div class="col md-12">
        <div class="bg-light rounded h-100 p-4 m-3">
            <div class="full-width">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <style>
                    .images-preview-div img {
                        padding: 10px;
                        max-width: 100px;
                    }
                </style>
                <div class="card">
                    <div class="text-center bg-light font-weight-bold">
                        <h2>Upload more images</h2>
                    </div>
                    <div class="card-body bg-light">
                        <form name="images-upload-form" method="POST" action="{{ url('upload-multiple-image-preview') }}"
                            accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $code }}" name="product_code" hidden>
                            <div class="form-group">
                                <input type="file" class="image form-control" name="images[]" id="images"
                                    placeholder="Choose images" multiple>
                            </div>
                            @error('images')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror


                            <div class="mt-1 text-center">
                                <div class="images-preview-div"> </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit">Add images</button>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                    $(function() {
                        // Multiple images preview with JavaScript
                        var previewImages = function(input, imgPreviewPlaceholder) {
                            if (input.files) {
                                var filesAmount = input.files.length;
                                for (i = 0; i < filesAmount; i++) {
                                    var reader = new FileReader();
                                    reader.onload = function(event) {
                                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                            imgPreviewPlaceholder);
                                    }
                                    reader.readAsDataURL(input.files[i]);
                                }
                            }
                        };
                        $('#images').on('change', function() {
                            previewImages(this, 'div.images-preview-div');
                        });
                    });
                </script>

            </div>
        </div>
    </div>
@endsection

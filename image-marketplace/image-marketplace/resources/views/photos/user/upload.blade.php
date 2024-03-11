@extends('layouts.app')

@section('title')
    Upload
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Upload
                </div>                        
                <div class="card-body">
                    @include('layouts.alerts')

                    <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div data-mdb-input-init class=" mb-4">
                            <label class="form-label" for="image">Photo <span style="color: red">*</span> </label>
                            <input type="file" name="image" id="image" class="form-control" onchange="readUrl(this,'imagePreview')" />
                        </div>
                        <div class="mt-2">
                            <img src="#" alt=""
                            id="imagePreview"
                            class="d-none img-fluid  rounded mb-2"
                            width="100"
                            height="100"
                            />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <textarea rows="4" cols="4" id="body" name="body" class="form-control"></textarea>
                            <label class="form-label" for="body">Description <span style="color: red">*</span> </label>
                        </div>

                        <div class="row mb-4">
                            <div class="col d-flex justify-content-around">
                                <div class="form-check">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        name="is_free" 
                                        id="free" 
                                        value="1" 
                                        onchange="checkIsFree(1)" 
                                        checked />
                                    <label class="form-check-label" for="free">Free</label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        name="is_free" 
                                        id="paid" 
                                        onchange="checkIsFree(0)" 
                                        value="0" />
                                    <label class="form-check-label" for="paid">Paid</label>
                                </div>
                            </div>
                        </div>

                        <div data-mdb-input-init class="mb-4 d-none form-outline" id="priceField">
                            <input type="number" name="price" id="price" class="form-control" />
                            <label class="form-label" for="price">Prix <span style="color: red">*</span> </label>
                        </div>

                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
@endsection

<script>
        
    function checkIsFree(v) {
         if (v) {
             document.getElementById('priceField').classList.add('d-none');
         } else {
             document.getElementById('priceField').classList.remove('d-none');
         }
        //  console.log(v);
     }

     function readUrl(input, image) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(image).classList.remove('d-none');
            document.getElementById(image).setAttribute('src', e.target.result); // Fix the typo here
        }
        reader.readAsDataURL(input.files[0]);
    }
}

     
    </script>

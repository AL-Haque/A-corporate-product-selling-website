@extends('layouts.master')
@section('title', 'Product Page')
@push('admin-css')
<style>
    .gallery-img {
        /* position: absolute; */
        display: inline-block;
    }
    /* .thumb{
        width: 50px;
        height: 50px;
    } */
    .gallery-img img { 
        height: 80px; 
        width:80px; 
        margin:2px; 
        float:left; 
    }
    .gallery-img span {
        position: relative;
        right: 28px;
        top: 3px;
        background: red;
        padding: 3px 5px;
        color: #fff;
    }
    .gallery-img iframe { height: 80px; width:120px; margin:2px; float:left; }
</style>
@endpush
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Product</span>
        </div>
        <div class="row">
            
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        @if(@isset($productData))
                            <div class="table-head"><i class="fas fa-edit"></i> Product Update</div>
                        @else
                            <div class="table-head"><i class="fab fa-bandcamp"></i> Product Entry</div>
                        @endif
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form action="{{ (@$productData) ? route('product.update', $productData->id) : route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ (@$productData) ? @$productData->name : old('name') }}" class="form-control form-control-sm shadow-none">
                                            @error('name') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label">Product Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="price" value="{{ (@$productData) ? @$productData->price : old('price') }}" class="form-control form-control-sm shadow-none">
                                            @error('price') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSelect" class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="category_id" class="form-control form-control-sm shadow-none select2" id="category_id">
                                                <option value="">--- select category ---</option>
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id == @$productData->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSelect" class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">
                                            <select name="brand_id" class="form-control form-control-sm shadow-none select2">
                                                <option value="">--- select brand ---</option>
                                                @foreach ($brand as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id == @$productData->brand_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputCpassword" class="col-sm-3 col-form-label">New Product</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="is_new" value="1" {{ @$productData->is_new == 1 ? 'checked' : '' }}> <span>Check New Product</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCpassword" class="col-sm-3 col-form-label">Feature Product</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="feature" value="1" {{ @$productData->feature == 1 ? 'checked' : '' }}> <span>Check Feature Product</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Product Image <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control form-control-sm shadow-none" id="image" onchange="mainThambUrl(this)">
                                            @error('image') <span style="color: red">{{$message}}</span> @enderror
                                            <div>
                                                <img src="{{ (!empty(@$productData)) ? asset(@$productData->image) : asset('images/no.png') }}" id="mainThmb" style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                            </div>
                                        </div>
                                        
                                    </div>
    
                
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row mb-2">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Description <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ (@$productData) ? @$productData->description : old('description') }}</textarea>
                                            @error('description') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputCpassword" class="col-sm-3 col-form-label">Other Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="other_img[]" class="form-control form-control-sm shadow-none" id="multiimage" multiple>
                                            @error('other_img') <span style="color: red">{{$message}}</span> @enderror
                                            
                                            <div id="showimage" class="gallery-img">
                                                @if (@$productData)
                                                    @foreach (@$productData->images as $item)
                                                        <div class="gallery-img">
                                                            <img src="{{asset($item->other_img)}}" alt="">
                                                            <span class="close-btn" data-img-id="{{ $item->id }}">
                                                                <i class="fa fa-window-close"></i>
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$productData)? 'Update Product' : 'Save Product' }}</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
           
            <div class="card my-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="table-head"><i class="fas fa-table me-1"></i>Product List</div>
                </div>
                <div class="card-body table-card-body">
                    <table id="datatablesSimple" class="text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr class="{{ $item->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>৳ {{ $item->price }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('product.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader    = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>

<script>
    CKEDITOR.replace( 'editor' );
</script>


<!-- Show multiple image -->  
<script>

    $(document).ready(function(){
     $('#multiimage').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
  
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#showimage').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
  
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
  
</script>

<script>
    // remove image
    $(document).on('click', '.close-btn', function () {
        if (!confirm('Are you sure?')) return
        var imageId = $(this).data('img-id');
        // console.log(imageId);
        // return;
        if (imageId) {
            $.ajax({
                url: '{{url("/")}}/remove-image/' + imageId,
                method: 'GET',
                success: function (res) {
                    if (res) {
                        $(this).parent().remove();
                    } else {
                        alert('Something went wrong :(');
                    }
                }.bind(this)
            })
        }
    });
</script>

@endpush

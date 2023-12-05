@extends('layouts.master')
@section('title', 'Slider Page')
@section('main-content')


<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Slider</span>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($sliderData))
                                <i class="fas fa-edit"></i> Slider Update
                            @else
                                <i class="fab fa-bandcamp"></i> Slider Entry
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$sliderData) ? route('slider.update', $sliderData->id) : route('slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Slider Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" value="{{ @$sliderData->title }}" class="form-control form-control-sm shadow-none" id="title">
                                    @error('title') <span style="color: red">{{$message}}</span> @enderror
                                </div>
    
                                <label for="inputPassword" class="col-sm-3 col-form-label">Image (<small class="text-danger">1300 X 400</small>)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control shadow-none" id="image" onchange="mainThambUrl(this)">
                                    @error('image') <span style="color: red">{{$message}}</span> @enderror
                                    <div>
                                        <img src="{{ (!empty(@$sliderData)) ? asset(@$sliderData->image) : asset('images/no.png') }}" id="mainThmb" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$sliderData)? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>

            <div class="col-lg-6">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Slider List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>
                                            <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                            
                                            <a href="{{ route('slider.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(100)
                  .height(100);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
@endpush

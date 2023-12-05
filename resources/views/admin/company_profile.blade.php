@extends('layouts.master')
@section('title', 'Update Company Profile')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Company Profile</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Update Company Profile
                        </div>
                    </div>
                    
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('company.profile.update', $com_profile->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="com_name" value="{{ $com_profile->com_name }}" class="form-control form-control-sm shadow-none" id="com_name">
                                                @error('com_name') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="title" class="col-sm-3 col-form-label">Phone One</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" value="{{ $com_profile->phone }}" class="form-control form-control-sm shadow-none" id="phone_one">
                                                @error('phone') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="title" class="col-sm-3 col-form-label">Phone Two</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone_two" value="{{ $com_profile->phone_two }}" class="form-control form-control-sm shadow-none" id="phone_two">
                                                @error('phone_two') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="title" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" value="{{ $com_profile->email }}" class="form-control form-control-sm shadow-none" id="email">
                                                @error('email') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Map</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="map" value="{{ $com_profile->map }}" class="form-control form-control-sm shadow-none">
                                                @error('map') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea name="address" rows="2" class="form-control form-control-sm shadow-none">{{ $com_profile->address }}</textarea>
                                                @error('address') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title" class="col-sm-3 col-form-label">Address Two</label>
                                            <div class="col-sm-9">
                                                <textarea name="address_two" rows="2" class="form-control form-control-sm shadow-none">{{ $com_profile->address_two }}</textarea>
                                                @error('address_two') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group row">

                                            <label for="title" class="col-sm-3 col-form-label">Facebook</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="facebook" value="{{ $com_profile->facebook }}" class="form-control form-control-sm shadow-none" id="facebook">
                                                @error('facebook') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
        
                                            <label for="title" class="col-sm-3 col-form-label">Twitter</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="twitter" value="{{ $com_profile->twitter }}" class="form-control form-control-sm shadow-none" id="twitter">
                                                @error('twitter') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="title" class="col-sm-3 col-form-label">Youtube</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="youtube" value="{{ $com_profile->youtube }}" class="form-control form-control-sm shadow-none">
                                                @error('youtube') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            
            
                                            <label for="title" class="col-sm-3 col-form-label">LinkedIn</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="linkedin" value="{{ $com_profile->linkedin }}" class="form-control form-control-sm shadow-none">
                                                @error('linkedin') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            

                                            <label for="inputPassword" class="col-sm-3 col-form-label">Logo</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="logo" class="form-control shadow-none" id="logo" onchange="mainThambUrl(this)">
                                                @error('image') <span style="color: red">{{$message}}</span> @enderror
                                                
                                                <div class="">
                                                    <img src="{{ (!empty($com_profile)) ? asset($com_profile->logo) : asset('images/no.png') }}" id="mainThmb" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix">
                                    <div class="text-end m-auto">
                                        <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                        <button type="submit" class="btn btn-success shadow-none">Save</button>
                                    </div>
                                </div>
                            </form> 
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





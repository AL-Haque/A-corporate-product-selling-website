@extends('layouts.master')
@section('title', 'Category Page')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Category</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($categoryData))
                                <i class="fas fa-edit"></i> Category Update
                            @else
                                <i class="fab fa-bandcamp"></i> Category Entry
                            @endif
                        </div>
                    </div>

                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$categoryData) ? route('category.update', $categoryData->id) : route('category.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="parentId" class="col-sm-3 col-form-label">Parent Category</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" id="parentId" class="form-control shadow-none form-control-sm">
                                        <option value="">-- select one --</option>
                                        @foreach ($category as $categ)
                                            <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ (@$categoryData->name) ? @$categoryData->name : old('name') }}" class="form-control form-control-sm shadow-none">
                                    @error('name') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <label for="" class="col-sm-3 col-form-label">Image <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" value="{{ (@$categoryData->image) ? @$categoryData->image : old('image') }}" class="form-control form-control-sm shadow-none" onclick="mainThambUrl(this)">
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
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$categoryData)? 'Update change' : 'Save change' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Category List</div>
                        <div class="float-right">

                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key => $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>

                                        <td>{{ $item->parent_id != 0 ? $item->parent->name : '' }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>
                                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-edit shadow-none"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('category.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
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



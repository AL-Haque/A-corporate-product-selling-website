@extends('layouts.web_master')
@section('title', 'Contact Us')
@section('main_content')

<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="animated slideInDown text-white">Contact Us</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-4">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Contact Us</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-success text-white d-flex flex-column justify-content-center h-100 p-4">
                    <h5 class="text-white">Call Us</h5>
                    <p class="mb-4"><i class="fa fa-phone-alt me-3"></i>{{ $content->phone }}</p>
                    <h5 class="text-white">Email Us</h5>
                    <p class="mb-4"><i class="fa fa-envelope me-3"></i>{{ $content->email }}</p>
                    <h5 class="text-white">Office Address</h5>
                    <p class="mb-4"><i class="fa fa-map-marker-alt me-3"></i>{{ $content->address }}</p>
                    <h5 class="text-white">Follow Us</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="{{ $content->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href="{{ $content->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                {{-- <form> --}}
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                                <span class="text-danger" id="nameErr"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control shadow-none" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                                <span class="text-danger" id="emailErr"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" id="phone" placeholder="Phone Number">
                                <label for="email">Phone Number</label>
                                <span class="text-danger" id="phoneErr"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-none" id="subject" placeholder="Subject">
                                <label for="email">Subject</label>
                                {{-- <span class="text-danger" id="subjectErr"></span> --}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control shadow-none" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                <label for="message">Message</label>
                                <span class="text-danger" id="msgErr"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success rounded-pill py-2 px-3 shadow-none" type="submit" onclick="sendMesssage()">Send Message</button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Google Map Start -->
<div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
    <iframe class="w-100" style="height: 450px;"
        src="{{ $content->map }}"
        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Google Map End -->

@endsection

@push('web_script')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ----- Clear Data -----
    function clearData(){
        $("#name").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#subject").val('');
        $("#message").val('');
        $("#nameErr").text('');
        $("#emailErr").text('');
        $("#phoneErr").text('');
        // $("#subjectErr").text('');
        $("#msgErr").text('');
    }

    function sendMesssage(){
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var url = "{{ route('send.message') }}";

        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: {name:name, email:email, phone:phone, subject:subject, message:message},
            success: function(data){
                clearData();
                const Msg = Swal.mixin({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })

                Msg.fire({
                    type: 'success',
                    title: 'Message Send Successfully',
                })
                // console.log('successfully Added');
            },
            error: function(error){
                $("#nameErr").text(error.responseJSON.errors.name);
                $("#emailErr").text(error.responseJSON.errors.email);
                $("#phoneErr").text(error.responseJSON.errors.phone);
                // $("#subjectErr").text(error.responseJSON.errors.subject);
                $("#msgErr").text(error.responseJSON.errors.message);
                // console.log(error.responseJSON.errors.name);
            }
        });
    }
</script>
@endpush
@extends('layouts.mainLayout')
@section('content')

    @include('includes.header')

    @if($banners->count() > 0)
    <section class="home-slider owl-carousel">
        @foreach($banners as $banner)
        <div class="slider-item" style="background-image:url({{asset('/public/'.$banner->path)}});">
            {{--            <div class="overlay"></div>--}}
            {{--            <div class="container">--}}
            {{--                <div class="row no-gutters slider-text align-items-center justify-content-center"--}}
            {{--                     data-scrollax-parent="true">--}}
            {{--                    <div class="col-md-8 text-center ftco-animate">--}}
            {{--                        <h1 class="mb-4">Kids Are The Best <span>Explorers In The World</span></h1>--}}
            {{--                        <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        @endforeach
    </section>
    @endif
    <section class="ftco-services ftco-no-pb">
        <div class="container-wrap">
            <div class="row no-gutters">
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-teacher"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Certified Teachers</h3>
                            <p>Student teaching experience, and have passed additional state-mandated teaching
                                examinations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-reading"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Special Education</h3>
                            <p>Education of children who differ socially, mentally they require modifications of usual
                                school practices</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-books"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Book &amp; Library</h3>
                            <p>A vast collection of publications about Pakistan, its culture, people and books authored
                                by Pakistanis</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-diploma"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Certification</h3>
                            <p>Certification is the formal attestation or confirmation of organization.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center mb-2 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Founder </span>& Members</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                 style="background-image: url({{asset('web_assets/images/riaz.jpg')}});"></div>
                        </div>
                        <div class="text pt-3 text-center">
                            <h3>Muhammad Haji Riaz</h3>
                            <span class="position mb-2">Director</span>
                            <div class="faded">
                                <p>The aspirations of students and parents have undergone critical transformations with
                                    time.</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                 style="background-image: url({{asset('web_assets/images/bilal.png')}});"></div>
                        </div>
                        <div class="text pt-3 text-center">
                            <h3>Muhammad Bilal</h3>
                            <span class="position mb-2">Principal</span>
                            <div class="faded">
                                <p>At AGHS Excellencia Academy we aspire to provide top quality education to all.</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                 style="background-image: url({{asset('web_assets/images/kaleem.png')}});"></div>
                        </div>
                        <div class="text pt-3 text-center">
                            <h3>Muhammad Kaleem</h3>
                            <span class="position mb-2">Vice Principal</span>
                            <div class="faded">
                                <p>We are always looking for new ways to involve parents in the life of the school.</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                    <div class="text px-4 ftco-animate">
                        <h2 class="mb-4">Welcome to AGHS Learning School</h2>
                        <p>Our School Self-Evaluation service is designed to help you review your school’s performance
                            and identify areas of strengths as well as those that could be more effective. It encourages
                            you to use evidence and data to make informed decisions about areas of school practice that
                            need improvement.</p>
                        <p>We have developed a range of surveys that you can use to collect feedback from your school’s
                            key stakeholder groups: parents, students and teachers.</p>
                        <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                    </div>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h2 class="mb-4">What We Offer</h2>
                    <p>Planning for school facilities maintenance helps to ensure that school buildings are Clean,
                        Orderly, Safe, Cost-effective and Instructionally supportive. Thus, a facilities maintenance
                        plan contributes to the instructional of an education organization.</p>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-security"></span></div>
                                <div class="text">
                                    <h3>SOP First</h3>
                                    <p>Frequently clean your hands with soap and water, or an alcohol-based hand
                                        rub.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-reading"></span></div>
                                <div class="text">
                                    <h3>Regular Classes</h3>
                                    <p>Specific instructional grouping within the regular education environment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-jigsaw"></span></div>
                                <div class="text">
                                    <h3>Creative Lessons</h3>
                                    <p> It's building knowledge and developing skills using creative techniques.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-kids"></span></div>
                                <div class="text">
                                    <h3>Sports Facilities</h3>
                                    <p>Places where members of the general public assemble to engage in physical
                                        exercise</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"--}}
    {{--             style="background-image: url({{asset('web_assets/images/bg_5.jpg')}});"--}}
    {{--             data-stellar-background-ratio="0.5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-end">--}}
    {{--                <div class="col-md-6 py-5 px-md-5 bg-primary">--}}
    {{--                    <div class="heading-section heading-section-white ftco-animate mb-5">--}}
    {{--                        <h2 class="mb-4">Request A Quote</h2>--}}
    {{--                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,--}}
    {{--                            there live the blind texts.</p>--}}
    {{--                    </div>--}}
    {{--                    <form action="#" class="appointment-form ftco-animate">--}}
    {{--                        <div class="d-md-flex">--}}
    {{--                            <div class="form-group">--}}
    {{--                                <input type="text" class="form-control" placeholder="First Name">--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group ml-md-4">--}}
    {{--                                <input type="text" class="form-control" placeholder="Last Name">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="d-md-flex">--}}
    {{--                            <div class="form-group">--}}
    {{--                                <div class="form-field">--}}
    {{--                                    <div class="select-wrap">--}}
    {{--                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>--}}
    {{--                                        <select name="" id="" class="form-control">--}}
    {{--                                            <option value="">Select Your Course</option>--}}
    {{--                                            <option value="">Art Lesson</option>--}}
    {{--                                            <option value="">Language Lesson</option>--}}
    {{--                                            <option value="">Music Lesson</option>--}}
    {{--                                            <option value="">Sports</option>--}}
    {{--                                            <option value="">Other Services</option>--}}
    {{--                                        </select>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group ml-md-4">--}}
    {{--                                <input type="text" class="form-control" placeholder="Phone">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="d-md-flex">--}}
    {{--                            <div class="form-group">--}}
    {{--                                <textarea name="" id="" cols="30" rows="2" class="form-control"--}}
    {{--                                          placeholder="Message"></textarea>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group ml-md-4">--}}
    {{--                                <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--<section class="ftco-section">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center mb-5 pb-2">--}}
    {{--            <div class="col-md-8 text-center heading-section ftco-animate">--}}
    {{--                <h2 class="mb-4"><span>Our</span> Pricing</h2>--}}
    {{--                <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6 col-lg-3 ftco-animate">--}}
    {{--                <div class="pricing-entry bg-light pb-4 text-center">--}}
    {{--                    <div>--}}
    {{--                        <h3 class="mb-3">Basic</h3>--}}
    {{--                        <p><span class="price">$24.50</span> <span class="per">/ 5mos</span></p>--}}
    {{--                    </div>--}}
    {{--                    <div class="img" style="background-image: url({{asset('web_assets/images/bg_1.jpg')}});"></div>--}}
    {{--                    <div class="px-4">--}}
    {{--                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
    {{--                    </div>--}}
    {{--                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Take A Course</a></p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6 col-lg-3 ftco-animate">--}}
    {{--                <div class="pricing-entry bg-light pb-4 text-center">--}}
    {{--                    <div>--}}
    {{--                        <h3 class="mb-3">Standard</h3>--}}
    {{--                        <p><span class="price">$34.50</span> <span class="per">/ 5mos</span></p>--}}
    {{--                    </div>--}}
    {{--                    <div class="img" style="background-image: url({{asset('web_assets/images/bg_2.jpg')}});"></div>--}}
    {{--                    <div class="px-4">--}}
    {{--                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
    {{--                    </div>--}}
    {{--                    <p class="button text-center"><a href="#" class="btn btn-secondary px-4 py-3">Take A Course</a></p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6 col-lg-3 ftco-animate">--}}
    {{--                <div class="pricing-entry bg-light active pb-4 text-center">--}}
    {{--                    <div>--}}
    {{--                        <h3 class="mb-3">Premium</h3>--}}
    {{--                        <p><span class="price">$54.50</span> <span class="per">/ 5mos</span></p>--}}
    {{--                    </div>--}}
    {{--                    <div class="img" style="background-image: url({{asset('web_assets/images/bg_3.jpg')}});"></div>--}}
    {{--                    <div class="px-4">--}}
    {{--                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
    {{--                    </div>--}}
    {{--                    <p class="button text-center"><a href="#" class="btn btn-tertiary px-4 py-3">Take A Course</a></p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6 col-lg-3 ftco-animate">--}}
    {{--                <div class="pricing-entry bg-light pb-4 text-center">--}}
    {{--                    <div>--}}
    {{--                        <h3 class="mb-3">Platinum</h3>--}}
    {{--                        <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p>--}}
    {{--                    </div>--}}
    {{--                    <div class="img" style="background-image: url({{asset('web_assets/images/bg_5.jpg')}});"></div>--}}
    {{--                    <div class="px-4">--}}
    {{--                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
    {{--                    </div>--}}
    {{--                    <p class="button text-center"><a href="#" class="btn btn-quarternary px-4 py-3">Take A Course</a></p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Recent</span> Classes </h2>
                    <p>learning programme that gives you combined content or specific skills in a short period of
                        time.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="#" class="block-20 d-flex align-items-end"
                           style="background-image: url('{{asset('web_assets/images/computer.jpg')}}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">01</span>
                                <span class="mos">January</span>
                                <span class="yr">2022</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">Computer Classes (3-months)</a></h3>
                            <p>Short term courses have their way of offering skills to students; the courses are very
                                efficient and effective as well</p>
                            {{--                        <div class="d-flex align-items-center mt-4">--}}
                            {{--                            <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>--}}
                            {{--                            <p class="ml-auto mb-0">--}}
                            {{--                                <a href="#" class="mr-2">Admin</a>--}}
                            {{--                                <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>--}}
                            {{--                            </p>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="#" class="block-20 d-flex align-items-end"
                           style="background-image: url('{{asset('web_assets/images/computer-2.jpg')}}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">01</span>
                                <span class="mos">January</span>
                                <span class="yr">2022</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">Computer Classes (6-months)</a></h3>
                            <p>Short term courses have their way of offering skills to students; the courses are very
                                efficient and effective as well</p>
                            {{--                        <div class="d-flex align-items-center mt-4">--}}
                            {{--                            <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>--}}
                            {{--                            <p class="ml-auto mb-0">--}}
                            {{--                                <a href="#" class="mr-2">Admin</a>--}}
                            {{--                                <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>--}}
                            {{--                            </p>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="#" class="block-20 d-flex align-items-end"
                           style="background-image: url('{{asset('web_assets/images/Electrical.jpg')}}');">
                            <div class="meta-date text-center p-2">
                                <span class="day">1</span>
                                <span class="mos">January</span>
                                <span class="yr">2022</span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="#">DAE Diplomas (3-years)</a></h3>
                            <p>Electrical Technology Our aim is to provide the state-of-the-art training facilities that
                                will enable our students to acquire hands-on experience, an acute requirement in the
                                professional world.</p>
                            {{--                        <div class="d-flex align-items-center mt-4">--}}
                            {{--                            <p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>--}}
                            {{--                            <p class="ml-auto mb-0">--}}
                            {{--                                <a href="#" class="mr-2">Admin</a>--}}
                            {{--                                <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>--}}
                            {{--                            </p>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="{{asset('web_assets/images/boys_1.jpg')}}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{asset('web_assets/images/course-1.jpg')}});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="{{asset('web_assets/images/girls.jpg')}}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{asset('web_assets/images/image_2.jpg')}});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="{{asset('web_assets/images/pic_3.jpg')}}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{asset('web_assets/images/image_3.jpg')}});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="{{asset('web_assets/images/pic_4.jpg')}}"
                       class="gallery image-popup img d-flex align-items-center"
                       style="background-image: url({{asset('web_assets/images/image_4.jpg')}});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

{{--    <section>--}}
{{--        <div class="container">--}}
{{--            <!-- Modal -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 col-md-8 col-lg-12">--}}
{{--                    <div class="modal fade" id="myModal" role="dialog">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <!-- Modal content-->--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-body">--}}
{{--                                    <img src="{{asset('web_assets/images/banner.png')}}" alt="" width="100%"--}}
{{--                                         height="100%">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection

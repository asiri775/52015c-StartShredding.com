@extends('home.includes.master_new')

@section('header')
    @include('home.includes.header_new')
@stop

@section('content')

    <section class="demo-hero-5" data-pages="parallax" data-pages-bg-image="{{ URL::asset('assets_new/assets/images/sub-banner.jpg') }}">
        <div class="container-xs-height full-height">
            <div class="col-xs-height col-middle text-center">
                <h1 class="inner m-t-100 p-b-50 m-b-50 main-title">Contact Us</h1>
            </div>
        </div>
    </section>
    <div class="m-t-15">
        <!-- START CONTACT SECTION -->
        <section class="container container-fixed-lg p-t-65 p-b-100  sm-p-b-30 sm-m-b-30">
            <div class="row">
                <div class="col-md-6">
                    <h2>How can we assist you?</h2>
                    <div class="p-r-40 sm-p-r-0">
                        <p>Despite the UI, We thought of the User experience, With attached From Layouts you can simply
                            categories Important fields and prioritize them.</p>
                        <br>
                        <br>
                        <div class="panel" id="contact-panel">
                            <p class="semi-bold no-margin">Fill up this form to contact us if you have any futher
                                questions</p>
                            <form role="form" autocomplete="off" class="m-t-15" id="contact-form" action="_lib/mail.php"
                                  method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label class="control-label">First name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label class="control-label">Last name</label>
                                            <input type="text" name="last-name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-default">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" placeholder="This can be changed later"
                                           class="form-control" required>
                                </div>
                                <div class="form-group form-group-default">
                                    <label class="control-label">Message</label>
                                    <textarea name="message" placeholder="Type the message you wish to send"
                                              style="height:100px" class="form-control" required></textarea>
                                </div>
                                <div class="sm-p-t-10 clearfix">
                                    <p class="pull-left small hint-text m-t-5 font-arial">I hereby certify that the
                                        information above is true and accurate. </p>
                                    <button class="btn btn-primary font-montserrat all-caps fs-12 pull-right xs-pull-left">
                                        Submit
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="visible-xs visible-sm b-b b-grey-light m-t-35 m-b-30"></div>
                    <div class="p-l-40 sm-p-l-0 sm-p-t-10">
                        <h3>Showcase and guide users with a <br>
                            better User Interface &amp; Experience.</h3>
                        <p>Our motivation "Perfection simplified" helps to craft meaningful experiences for the people
                            around us,This mission inspires us to jump out of bed each day and guides every aspect of
                            what we do.</p>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="block-title hint-text m-b-0">Toronto </h5>
                                <address class="m-t-10">StartShredding Inc.
                                    <br> 208 Evans Avenue
                                    <br> Toronto, ON M8Z 1J7
                                </address>
                                <br>
                            </div>
                        </div>
                        <br>
                        <h5 class="block-title hint-text m-b-0">pages Public Inquiries &amp; Communications </h5>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="fs-12 font-montserrat bold all-caps no-margin hint-text">Phone </p>
                                <p class="hint-text no-margin fs-14"> (416) 255 1500</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="fs-12 font-montserrat bold all-caps no-margin hint-text">Toll Free </p>
                                <p class="hint-text no-margin fs-14"> (866) 931 8615</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="fs-12 font-montserrat bold all-caps no-margin hint-text">Fax </p>
                                <p class="hint-text no-margin fs-14"> (866) 931 8615</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="fs-12 font-montserrat bold all-caps no-margin hint-text">Email </p>
                                <p class="hint-text no-margin fs-14">info@shredex.ca</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@stop

@section('footer')
    @include('home.includes.footer_new')
@stop
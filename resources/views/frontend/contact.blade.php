@extends('template')
@section('content')
    <!-- Header -->
  <header class="py-5 mb-5 header_img">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h1 class="display-4 text-white mt-5 mb-2"> Contact </h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
    <!-- COURSE -->
      <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card bg-light mb-3" style="height: 200px">
                  <div class="card-body">
                      <h5 class="card-title"> Address One </h5>
                      <p class="card-text mmfont mt-4"> တိုက်အမှတ် (၁၆၉)၊ အခန်းနံပါတ် 2/B၊ MTP ကွန်ဒို၊ လှည်းတန်း - အင်းစိန်လမ်းမကြီး၊ ၉ ရပ်ကွက်၊ လှိုင်မြို့နယ်၊ ရန်ကုန်မြို့ </p>
                  </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card bg-light mb-3" style="height: 200px">
                  <div class="card-body">
                      <h5 class="card-title"> Address Two </h5>
                      <p class="card-text mmfont mt-4"> တိုက်အမှတ် (29 A/ 5A) ၊ No.1 Beauty Saloon အပေါ်ထပ် ၅ လွှာ ၊ ခိုင်ရွှေဝါလမ်း လှည်းတန်း။ </p>
                  </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card bg-light mb-3" style="height: 200px">
                  <div class="card-body">
                      <h5 class="card-title"> Address Three </h5>
                      <p class="card-text mmfont mt-4"> လမ်း ၄၀ ၊ ၇၀x ၇၁ ကြား ၊ ဝါမြဲ Learning Center။ </p>
                  </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card bg-light mb-3" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title"> Phone </h5>
                        <p class="card-text"> +95 979 832 319 9 </p>
                        <p class="card-text"> +95 977 275 050 2 </p>
                        <p class="card-text"> +95 977 275 050 3 </p>


                    </div>
                </div>
            </div>

        </div>
        
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-2 order-sm-last">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control"placeholder="Your Name">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control"placeholder="Your Email">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control"placeholder="Subject">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Message"> </textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary"> Send Message </button>
                    </div>

                </form> 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 order-lg-2 order-md-1 order-sm-last">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.9488320900773!2d96.17328341489424!3d16.77922112447562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecf3663e935d%3A0x193089d4a75fd327!2sMyanmar%20IT%20Consulting!5e0!3m2!1sen!2smm!4v1572489506949!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
      </div>
    <!-- COURSE -->
@endsection
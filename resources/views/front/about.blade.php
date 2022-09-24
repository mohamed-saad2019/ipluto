@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
<div class="about">
      <div class="overLayGlobal">
        <div class="overLayGlobalChild"></div>
        <div class="container">
          <div class="overLayGlobaleText">
            <h3>Title Page</h3>
            <div>
              <a href="">Home</a>
              <span></span>
              <a>Title Page</a>
            </div>
          </div>
        </div>
      </div>
        <div class="aboutUs">
          <div class='container'>
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="aboutImg">
                  <img src="{{url('images/vision.png')}}" alt="" />
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="aboutText">
                  <h3>Vision</h3>
                  <p>
                    To change The learning natural science terminology in digital education and develop our future scientists to be the first choice in egypt and MENA region.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aboutUs">
          <div class='container'>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="aboutText">
                    <h3>Mission</h3>
                    <p>
                      We simplify natural science to keep our customer, and success partners delighted by a digital education platform 
                      specialized in natural science for teachers and students grade 10-12 with national, and international delighted 
                      quality that fits to our customer, and success partners. We aim to ensure understanding and delivering science for our students easily by using interactive 
                      innovation technology, inspire, and entertain students and keep company values to help society at large.
                    </p>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="aboutImg aboutImg2">
                    <img src="{{url('images/mission.png')}}" alt="" />
                  </div>
                </div>
              </div>
        </div>
       </div>
       <div class="aboutUs">
          <div class='container'>
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="aboutImg">
                <img src="{{url('images/value.jpg')}}" alt="" />
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="aboutText">
                <h3>Values</h3>
                <p>
                  At every step we believe that the world changes and learning natural science is very important to our students 
                  and society at large. The way of change is by using digital lessons to make science better. 
                  By chance we create awesome animated digital visualization lessons in Physics, Chemistry, and Biology, Do You Want To Join…?
                </p>
              </div>
            </div>
          </div>
      </div>
          </div>
       </div>
@endsection
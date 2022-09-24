@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
<div class="contact">
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
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="contactLeft">
              <h3>Let’s Connect</h3>
              <p>Integer At Lorem Eget Diam Facilisis Lacinia Ac Id Massa.</p>
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif
              <form method="POST" action="{{ route('contact.user') }}">
                @csrf
                <div class="row">
                  <div class="col-12 col-md-6">
                    <input
                      type="text"
                      class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" value="{{ old('fname') }}"
                      name = "fname"
                      placeholder="First name"
                      required
                    />
                    @if ($errors->has('fname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="col-12 col-md-6">
                    <input
                      type="text"
                      class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" value="{{ old('lname') }}"
                      name = "lname"
                      placeholder="Last name"
                      required
                    />
                    @if ($errors->has('lname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6">
                    <input
                      type="email"
                      class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                      name = "email"
                      placeholder="Email"
                      required
                    />
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="col-12 col-md-6">
                    <input
                      type="number"
                      class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}"
                      name = "mobile"
                      placeholder="Phone Number"
                      required
                    />
                    @if ($errors->has('mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input
                      type="text"
                      class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{ old('subject') }}"
                      name = "subject"
                      placeholder="Your Subject"
                      required
                    />
                    @if ($errors->has('subject'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                  </div>
                  <p></p>
                </div>
                <div class="row">
                  <div class="col">
                    <textarea
                      name="message"
                      class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"
                      name = "message"
                      rows="10"
                      placeholder="How Can We Help"
                      required
                    >{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                  </div>
                  <p></p>
                </div>
                <div class="row align-items-center">
                  <div class="col-12 col-sm-6">
                    <div class="form-check text-center text-sm-left">
                      <input
                        class="form-check-input is-invalid"
                        type="checkbox"
                        value=""
                        id="invalidCheck3"
                        aria-describedby="invalidCheck3Feedback"
                        required=""
                      />I Agree To The Terms &amp; Conditions
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 text-center text-sm-right">
                    <button class="btn btn-primary" type="submit">
                      Submit form
                    </button>
                  </div>
                  <p></p>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="contactRight">
              <div class="contactRightText">
                <h3>Get In Touch</h3>
                <p>
                  Looking For Help? Fill The Form And Start A New Adventure.
                </p>
                <p></p>
              </div>
              <div class="contactRightText1">
                <div>
                  <h5>Headquarters</h5>
                  <p><i class="fas fa-home"></i> 25 Elnady Street, Tanta</p>
                  <p></p>
                </div>
                <div>
                  <h5>Phone</h5>
                  <p><i class="fas fa-phone"></i> (+20) 114 492 4404</p>
                  <p></p>
                </div>
                <div>
                  <h5>Support</h5>
                  <p><i class="fas fa-envelope"></i> Info@Ipluto.Net</p>
                  <p></p>
                </div>
                <div>
                  <h5>Follow Us</h5>
                  <div class="contactSoial">
                    <a href="#" class="facebook"
                      ><i class="fab fa-facebook-f"></i></a
                    ><br />
                    <a href="#" class="twitter"
                      ><i class="fab fa-twitter"></i></a
                    ><br />
                    <a href="#" class="youtube"
                      ><i class="fab fa-youtube"></i></a
                    ><br />
                    <a href="#" class="linkedin"
                      ><i class="fab fa-linkedin-in"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="googleMap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3427.2416027939685!2d30.988460384866936!3d30.795858281615175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ddf73a38d70ff86!2zMzDCsDQ3JzQ1LjEiTiAzMMKwNTknMTAuNiJF!5e0!3m2!1sar!2seg!4v1659179812756!5m2!1sar!2seg"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
    @endsection
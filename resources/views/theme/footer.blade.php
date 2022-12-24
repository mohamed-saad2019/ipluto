<div class="footerBut">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 social">
                            <h6>Find Us</h6>
                            <ul class="list-unstyled d-flex social">
                                <li><a><i class="fab fa-facebook-f"></i></a></li>
                                <li><a><i class="fab fa-twitter"></i></a></li>
                                <li><a><i class="fab fa-youtube"></i></a></li>
                                <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 social1">
                        <div>
                            <p>Available for the following platforms</p>
                        </div>
                        <div class='d-none'>
                            <ul class="list-unstyled d-flex social2">
                                <li class="list--item plataforms"><a href="https://itunes.apple.com/us/app/nearpod/id523540409?mt=8&amp;uo=4&amp;at=10lvvY" target="_blank"><img class="item--link" src="https://cdn.nearpod.com/1656969462594/img/new/footer/white/apple.svg" alt="apple logo" title="social media"></a></li>
                                <li class="list--item plataforms"><a href="https://play.google.com/store/apps/details?id=com.panareadigital.Nearpod&amp;hl=en" target="_blank"><img class="item--link" src="https://cdn.nearpod.com/1656969462594/img/new/footer/white/google.svg" alt="google logo" title="social media"></a></li>
                                <li class="list--item plataforms"><a href="https://www.microsoft.com/en-us/p/nearpodapp/9n6w2fk05cf7?rtc=1&amp;activetab=pivot:overviewtab" target="_blank"><img class="item--link" src="https://cdn.nearpod.com/1656969462594/img/new/footer/white/micro.svg" alt="micro logo" title="social media"></a></li>
                                <li class="list--item plataforms"><a href="https://chrome.google.com/webstore/detail/nearpod-for-classroom/gcoekeoenehjmndhkdnoomdjeaclkhbe" target="_blank"><img class="item--link" src="https://cdn.nearpod.com/1656969462594/img/new/footer/white/chrome.svg" alt="chrome logo" title="social media"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footerBut1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 footerBut11">
                    <img src="{{url('images/logo.png')}}" alt="">
                </div>
                <div class="col-12 col-md-6">
                    <ul class="list-unstyled d-flex footerBut12">
                        <li>
                            <a href="#">
                                Terms and Conditions
                            </a>
                        </li>
                        <span></span>
                        <li>
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <link href="{{ url('admin_assets/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin_assets/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('admin_assets/assets/plugins/select2/select2.min.js') }}"></script>    
    <script src="{{ url('admin_assets/assets/js/custom/custom-form-select.js') }}"></script>   
    <script src="{{ url('admin_assets/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>


        $('select').select2({
            placeholder: 'This is my placeholder',
        });


         $('.select2').select2();

       $("#govern").change(function(){
              jQuery.ajax({
                    type: "GET",
                    url: "/admin/select2/city",
                    data: {
                      _token: "{{ csrf_token() }}",
                       govern:$("#govern").val()
                    },
                    success: function (data) {
                      $("#city").html(data);
                       // alert('error');
                    },
                    error: function()
                    {
                        // alert('error');
                    }
                }); 
         });  
    </script>
    <script src="{{url('js/custom-js.js')}}" ></script>
    
</body>
</html>
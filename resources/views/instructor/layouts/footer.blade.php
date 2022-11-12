 <footer class="footer mt-auto py-3 bg-dark" style="display:none">
    <div class="container" id="footer_from_library_js">
      <button class="btn btn-danger" style="float:right !important;padding:3px 25px" 
      id="ensure_multi_del">Delete selected lessons</button><br>
    </div>
      <div class="container" id="footer_from_add_lesson_js" style="display:none">
        @if(isset($folder_id))
          <a class='btn btn-success' 
             href="{{url('instructor/saved_lesson?id='.request('id').'&folder_id='.$folder_id.'&parent_id='.$parent_id)}}"
          style="float:right !important;padding:3px 25px;margin:0px 5px;">Save & Exit
          </a>   
        @else
          <a class='btn btn-success' href="{{url('instructor/saved_lesson?id='.request('id'))}}"
          style="float:right !important;padding:3px 25px;margin:0px 5px;">Save & Exit
          </a>
        @endif
        <a class='btn btn-primary' 
           href='{{url("view_lesson?lesson_id=".request("id"))}}'
           target="_blank"
          style="float:right !important;padding:3px 25px;margin:0px 5px;" >preview Lesson
       </a>
       <br>
    </div>
  </footer>
    @include('instructor.layouts.scripts')
    @yield('scripts')
    <script type="text/javascript">
       function getNewNotification() {
       jQuery.ajax({
                async: true,
                type: "GET",
                url: "{{url('notificationInterval')}}",
                data: {
                  _token: "{{ csrf_token() }}",
                   colum:'instructor_id'

                },
                success: function (data) {
                    // alert('asa');
                  $("#notifications").html(data);
                },
                error: function () {
                  // alert('error');
                }
              });    
}

    function getCountNotification() {
       jQuery.ajax({
                async: true,
                type: "GET",
                url: "{{url('notificationInterval')}}",
                data: {
                  _token: "{{ csrf_token() }}",
                   colum:'instructor_id'

                },
                success: function (data) {
                  // alert(data);
                  var count = {{notifications_count('instructor_id')}};
                  $("#notifications").html(data);

                  if (count > 0 ) 
                  {
                    $('#bell').html('<i class="far fa-bell fa-lg"></i><span class="notification--num">'+count+'</span>');
                  }
                  else
                  {
                    $('#bell').html('<i class="far fa-bell fa-lg"></i>'); 
                  }

                },
                error: function () {
                  // alert('error');
                }
              });    
}
// window.setInterval(getCountNotification,8000); // 1000 indicated 1 second
// window.setInterval(getNewNotification,8000); // 1000 indicated 1 second

    </script>
</body>
</html>
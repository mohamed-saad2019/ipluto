
    @include('student.layouts.scripts')
    <script type="text/javascript">
         function getNewNotification() {
       jQuery.ajax({
                async: true,
                type: "GET",
                url: "{{url('notificationInterval')}}",
                data: {
                  _token: "{{ csrf_token() }}",
                   colum:'student_id'

                },
                success: function (data) {
                    // alert(data);
                   var count = {{notifications_count('student_id')}};
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


// window.setInterval(getNewNotification,8000); // 1000 indicated 1 second

    </script>

</body>

</html>
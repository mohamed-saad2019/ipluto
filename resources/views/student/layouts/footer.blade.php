
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
                   jQuery.ajax({
                      async: true,
                      type: "GET",
                      url: "{{url('read_notifications')}}",
                      data: {
                        _token: "{{ csrf_token() }}",
                         colum:'student_id'

                      },
                      success: function (data) {
                         if(data > 0)
                          {
                              $('#bell').html(`<i class="far fa-bell fa-lg"></i><span class="notification--num"> `+ data +` </span>`); 
                          }
                          else
                          {
                               $('#bell').html(`<i class="far fa-bell fa-lg"></i>`);
                          }

                      },
                      error: function () {
                        // alert('error');
                      }
                    });    
                  $("#notifications").html(data);

                },
                error: function () {
                  // alert('error');
                }
              });    
}

  

$(".disabled_loading").keydown(function(){
    if (event.which || event.keyCode){if ((event.which == 13) || (event.keyCode == 13)){document.getElementById('form_comm').submit();this.disabled = true;}};
});

window.setInterval(getNewNotification,7000); // 1000 indicated 1 second

    </script>

</body>

</html>
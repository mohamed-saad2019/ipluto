
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

$(".disabled_loading").keydown(function(){
    if (event.which || event.keyCode){if ((event.which == 13) || (event.keyCode == 13)){document.getElementById('form_comm').submit();this.disabled = true;}};
});


 $("#bell").click(function(){
         $.ajax({
        type: "get",
        url: "{{route('read_notifications_student')}}",
        data: {'colum': 'student_id' },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(data){
            $('.notification--num').html(data);
        },
        error: function () {
        console.log('error');
        }
    });
    });

// window.setInterval(getNewNotification,8000); // 1000 indicated 1 second

    </script>

</body>

</html>
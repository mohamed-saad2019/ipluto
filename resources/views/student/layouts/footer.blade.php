
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
                    // alert(1);
                   // var count = '{{notifications_count("student_id")}}';

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


 $("#bell").click(function(){
      // alert(0);
      // return false
         $.ajax({
        type: "get",
        url: "{{route('read_notifications')}}",
        data: {'colum': 'student_id' },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(data){
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
        console.log('error');
        }
    });
    });

window.setInterval(getNewNotification,7000); // 1000 indicated 1 second
window.setInterval(getCountNotification,7000); // 1000 indicated 1 second

    </script>

</body>

</html>

    @include('student.layouts.scripts')notification_student.js
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
                url: "{{url('notificationCount')}}",
                data: {
                  _token: "{{ csrf_token() }}",
                   colum:'student_id'

                },
                success: function (data) {
                    // alert('asa');
                  $("#bell").html(data);
                },
                error: function () {
                  // alert('error');
                }
              });    
}
window.setInterval(getNewNotification,5000); // 1000 indicated 1 second
window.setInterval(getCountNotification,5000); // 1000 indicated 1 second

    </script>

</body>

</html>
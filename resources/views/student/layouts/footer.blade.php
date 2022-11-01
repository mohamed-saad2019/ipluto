
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
                  $("#notification_interval").html(data);
                },
                error: function () {
                  // alert('error');
                }
              });    
}


window.setInterval(getNewNotification,5000); // 1000 indicated 1 second

    </script>

</body>

</html>
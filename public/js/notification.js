 function getNewNotification() {
      $.ajax({
        type: "GET",
        url: "{{url('notificationInterval')}}",
        data:{colum:'instructor_id'},
        success: function (data) {
            alert('asa');
          $("#notifications").html(data);

        },
        error: function()
        {
            console.log('error');
        }
    });     
}

window.setInterval(getNewNotification,45000); // 1000 indicated 1 second

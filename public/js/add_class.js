$(document).ready(function () {
    
    $("body").on("click",".add_day", function(){
        $(".add_new_day").append('<div class="card"><select name="day[]"><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option></select></div>');
        $(".add_time").append('<input type="time" class="form-control" placeholder="Time" name="time[]" required>');
    });
    
});





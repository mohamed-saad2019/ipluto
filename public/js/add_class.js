$(document).ready(function () {

    $("body").on("click",".add_day", function(){

     if($('.fa-trash').length < 7)
     {
            const d = new Date();
           let i = d.getTime();

        $(".add_new_day").append('<div class="card '+i+'" style="margin-bottom:17px"><select class="form-control select2" name="day[]"><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option></select></div>');
        $(".add_time").append('<input type="time" class=" '+i+' form-control" placeholder="Time" name="time[]" required>');
        $(".delete_record").append('<i class="fa fa-trash" id="'+i+'" style="padding:15px 10px;color:red;display:block;font-size:22px"></i>');
        $('.select2').select2();
     }

    });

    $("body").on("click",".fa-trash", function(){
        id = this.id;
        $("#"+id).remove();
        $("."+id).remove();
    });    
    

    $("body").on("change",".choosedClass", function(){
        class_id = $(this).val();
        div_id   = $(this).attr("id");
        if(class_id)
        {
            $.ajax({
                type: "get",
                url: "/classes/getStudentInClass",
                data: {'class_id': class_id , 'div_id':div_id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data){
                    if(data)
                    {
                        $(".student_"+div_id).remove() ;
                        $(".student_"+div_id).remove() ;
                        $("#shareLesson").append(data) ;
                    }
                },
                error: function (data) {
                   console.log(data)
                }
            });
        }
    }); 

    $("body").on("click",".add_new_class", function(){
        lesson_id = $("#lesson_id").val();
        if(lesson_id)
        {
            $.ajax({
                type: "get",
                url: "/classes/getClasses",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: {'lesson_id': lesson_id },
                success: function(data){
                    if(data)
                    {
                        $("#shareLesson").append(data) ;
                    }
                },
                error: function (data) {
                   console.log(data)
                }
            });
        }
    }); 







});






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
            i = 0 
            $(".choosedClass").each(function()
            {
                if($(this).val() == class_id)
                {
                    i = i + 1 ;
                }
            });

            if(i == 1 || i == 1)
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
                            $(".students_"+div_id).show() ;
                            $("#student_"+div_id).html(data) ;
                            $('.select2').select2();
                        }
                    },
                    error: function (data) {
                    console.log(data)
                    }
                });
            }else{
                alert("It is not possible to choose the same class name twice") ;
            }
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
                        $("#all_classes").append(data) ;
                    }
                },
                error: function (data) {
                   console.log(data)
                }
            });
        }
    }); 

    $("body").on("click",".show", function(){
        div_id = $(this).attr('id');
        statusShow = $(this).attr('status');

        if(statusShow == 1)
        {
            $(".students_"+div_id).hide();
            $(this).attr('status',0);
        }else{
            $(".students_"+div_id).show();
            $(this).attr('status',1);
        }
    }); 


    $("body").on("click",".deleteDivClass", function(){
        div_id = $(this).attr('id');
        if (confirm("Are you sure you want to delete this class ? ") == true) {
            $("#main_"+div_id).remove() ;
        } 
    }); 


    $("body").on("change",".getLessonInClass", function(){
        class_id = $(this).val();
        if(class_id)
        {
           
            $.ajax({
                    type: "get",
                    url: "/library/getLessonInClass",
                    data: {'class_id': class_id },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        if(data != 500)
                        {
                            $('.fetch_lesson').append(data);
                        }
                        else
                        {
                            alert('There are no lessons for this class')
                        }

                    },
                    error: function (data) {
                    console.log(data)
                    }
                });
        }
    });



});






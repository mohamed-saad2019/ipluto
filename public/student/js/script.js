

  $('.comment__replay').click(function() {
    $(this).parent().next().children().toggle(500);
  })

// $('.btn_replay').click(function(){
//     $(".replay_ather").toggle(500);
    
//  })
$('.btn_replay').click(function(){
     $(".replay_ather").toggle(500);
     if($(".btn_replay i").hasClass("fa-arrow-down"))
     {
         $(".btn_replay i").addClass("fa-arrow-up").removeClass("fa-arrow-down");
     }
     else
     {
         $(".btn_replay i").addClass("fa-arrow-down").removeClass("fa-arrow-up")
 
     }
 })
 
// $('.comment__replay').click(function(){
//     $(".replay").toggle(500);

//  })
 
 
 $('.fa-thumbs-up').click(function(){
     type        = $(this).attr('type') ; //video or comment or reply
     type_id     = $(this).attr('type_id') ; // video_id or comment_id or reply_id
     typeUser    = $(this).attr('typeUser') ;   //student or instrusctor
     typeUserId  = $(this).attr('typeUserId') ;    //student_id or instrusctor_id
     action = "";

    if($(this).hasClass("activelike"))
    {
        $(this).addClass("activelike").removeClass("activelike");
        action    = 'removelike'; 
        // $("#down_"+type+"_"+type_id).css("pointer-events","none");
    }
    else
    {
        $(this).removeClass("activelike").addClass("activelike");
        action   = 'like' ;
        // $("#down_"+type+"_"+type_id).attr("disabled","disabled");
    }


    $.ajax({
        type: "post",
        url: "/student/savelikeOrDislike",
        data: {'type': type , 'type_id':type_id , 'typeUser': typeUser, 'typeUserId':typeUserId , 'action':action},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(jstring){
            if(jstring)
            {
                data = JSON.parse(jstring) ;
                $("#like_"+type+"_"+type_id).text(data.likes);
                $("#dislike_"+type+"_"+type_id).text(data.dislikes);
            }
        },
        error: function (data) {
        console.log(data)
        }
    });



 });

 $('.fa-thumbs-down').click(function(){
    
    type        = $(this).attr('type') ; //video or comment or reply
    type_id     = $(this).attr('type_id') ; // video_id or comment_id or reply_id
    typeUser    = $(this).attr('typeUser') ;   //student or instrusctor
    typeUserId  = $(this).attr('typeUserId') ;    //student_id or instrusctor_id

    if($(this).hasClass("activeunlike"))
    {
        $(this).addClass("activeunlike").removeClass("activeunlike");
        action    = 'removedislike'; 
        // $("#up_"+type+"_"+type_id).attr("disabled","");
    }
    else
    {
        $(this).removeClass("activeunlike").addClass("activeunlike");
        action    = 'dislike';  
        // $("#up_"+type+"_"+type_id).attr("disabled","disabled");
    }

    $.ajax({
        type: "post",
        url: "/student/savelikeOrDislike",
        data: {'type': type , 'type_id':type_id , 'typeUser': typeUser, 'typeUserId':typeUserId , 'action':action},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(jstring){
            if(jstring)
            {
                data = JSON.parse(jstring) ;
                $("#like_"+type+"_"+type_id).text(data.likes);
                $("#dislike_"+type+"_"+type_id).text(data.dislikes);
            }
        },
        error: function (data) {
        console.log(data)
        }
    });

 });

 $(".add_input").click(function(){
    lesson_id       = $('#lesson_id').val();     
    instructor_id   = $('#instructor_id').val();     
    student_id      = $('#student_id').val();     
    video_id        = $('#video_id').val();
    comment_id      = $(this).attr('commant_id');
    csrf_id         = $('#csrf_'+comment_id)[0].content ;

    $("#new_form").remove() ;
    $('#csrf_'+comment_id).remove() ;
    $('#like_unlike_'+comment_id).append('<form id="new_form" method="post" action="store_reply"><input name="_token" type="hidden"  value="'+csrf_id+'"><input name="_method" type="hidden" value="post"><input type="hidden" id="comment_id" name="comment_id" value="'+comment_id+'"><input type="hidden" id="lesson_id" name="lesson_id" value="'+lesson_id+'"><input type="hidden" id="instructor_id" name="instructor_id" value="'+instructor_id+'"><input type="hidden" id="student_id" name="student_id" value="'+student_id+'"><input type="hidden" id="video_id" name="video_id" value="'+video_id+'"></input><input class="pt-3 add_reply disabled_loading" style="border-radius: 17px;width: 351px;" placeholder="Add Replay" name="reply" required="required" ></form>');

});

 

 
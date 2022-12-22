

  $('.comment__replay').click(function() {
    $(this).parent().next().children().toggle(500);
  })

// $('.btn_replay').click(function(){
//     $(".replay_ather").toggle(500);
    
//  })
 
// $('.comment__replay').click(function(){
//     $(".replay").toggle(500);

//  })
 
 
 $('.fa-thumbs-up').click(function(){
     
     if($(this).hasClass("activelike"))
     {
         $(this).addClass("activelike").removeClass("activelike");
         
     }
     else
     {
         $(this).removeClass("activelike").addClass("activelike")
 
     }
 });
 $('.fa-thumbs-down').click(function(){
     
     if($(this).hasClass("activeunlike"))
     {
         $(this).addClass("activeunlike").removeClass("activeunlike");
     }
     else
     {
         $(this).removeClass("activeunlike").addClass("activeunlike")
 
     }
 });
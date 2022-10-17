

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
 
 $('.btn_rep').click(function(){
     $(".rep_ather").toggle(500);
     if($(".btn_rep i").hasClass("fa-arrow-down"))
     {
         $(".btn_rep i").addClass("fa-arrow-up").removeClass("fa-arrow-down");
     }
     else
     {
         $(".btn_rep i").addClass("fa-arrow-down").removeClass("fa-arrow-up")
 
     }
 })
 
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
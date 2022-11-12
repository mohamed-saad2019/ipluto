function takeshot() {
          html2canvas(document.body).then((canvas) => {
          let a = document.createElement("a");
          a.download = "ss.png";
          a.href = canvas.toDataURL("image/png");
          console.log(canvas.toDataURL("image/png"));
        });
     }
child

$("#fullscreen-button").click(function(){
    $mode = this.getAttribute("data-mode")
    if($mode=='full')
    {
        // $(".full_screen").fadeToggle();
        $mode = this.setAttribute("data-mode", "cancel");
        $("#fullscreen-button").html('<i class="fa fa-times" style="color:#fff"></i>');
        $('.row_slide').addClass('cus_hidden');
        $('#lightBoxItem').css('width','100%');
        $('#lightBoxContainer').css('height','100%');
        var element = document.querySelector("#full");
        element.requestFullscreen()
        .then(function() {
            // element has entered fullscreen mode successfully
        })
        .catch(function(error) {
            // element could not enter fullscreen mode
        });
    }
    else if($mode == 'cancel')
    {
        $mode = this.setAttribute("data-mode", "full");
        $("#fullscreen-button").html('<i class="fas fa-expand"></i>');
        $('.row_slide').removeClass('cus_hidden');
        $('#lightBoxItem').css('width','55%');
        $('#lightBoxContainer').css('height','80vh');
        var element = document.querySelector("#full");
       document.exitFullscreen()
        .then(function() {
            // element has exited fullscreen mode
        })
        .catch(function(error) {
            // element has not exited fullscreen mode
        });
    }
 })

$(".item .over_lay").click(function(){
   let imgSr = $(this).next().attr("src");
   $(".lightBox").css({
    backgroundImage :" url("+imgSr+")"
   })
})

function prevSlide(){
    currentIndex ++;
    if(currentIndex == myImg.length)
    {
        currentIndex = 0;
    }
    var imgSrc = myImg[currentIndex].getAttribute("src");
    lightBoxItem.style.backgroundImage =" url("+imgSrc+")";


}




function nextSlide(){
    currentIndex --;

    if(currentIndex < 0)
    {
        currentIndex = myImg.length -1;
    }
    var imgSrc = myImg[currentIndex].getAttribute("src");
    lightBoxItem.style.backgroundImage =" url("+imgSrc+")";


}

$(".list_item").click(function(){

       // alert($(this).attr("data-type"));

       $('.list_item').removeClass('cus_active');
       $(this).addClass('cus_active');

       let type   = $(this).attr("data-type");
       
       if(type.includes("officedocument"))
       {
        $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html('<iframe height="100%" src="https://view.officeapps.live.com/op/embed.aspx?src='+$(this).attr("data-src")+'&amp;wdAr=1.7777777777777777" width="100%" height="800px" frameborder="0">This is an embedded <a target="_blank" href="https://office.com">Microsoft Office</a> presentation, powered by <a target="_blank" href="https://office.com/webapps">Office</a>.</iframe>');
       }

       if(type.includes("pdf"))
       {
                 $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html(' <iframe src="'+$(this).attr("data-src")+'" width="100%" height="100%"></iframe>');
       }

        if(type.includes("url"))
       {
        $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html('<center><a href="'+$(this).attr("data-src")+'">'+$(this).attr("data-src")+'</a></center>');
       }


       if(type.includes("image"))
       {
         $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html('<img style="width:100%" src="'+$(this).attr("data-src")+'" alt="not Found"/>');
       }

       if(type.includes("video"))
       {
        $('#fullscreen-button').addClass('cus_hidden');

        $('#child').html('<video style="width:100%" controls><source src="'+$(this).attr("data-src")+'" type="video/mp4" /></video>');
       }

       if(type.includes("audio"))
       {
          $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html('<center><audio controls><source src="'+$(this).attr("data-src")+'" type="audio/mpeg"></audio></center>');
       }

        if(type.includes("whiteboard"))
       {
        $('#fullscreen-button').removeClass('cus_hidden');

        $('#child').html('<div style="width:100%; height: 100%;" id="wt-container"></div><div id="output"></div>');
        var wt = new api.WhiteboardTeam('#wt-container', {
            clientId: 'bc4d22750d5923626dab48d169529a71',
            boardCode: 'be296d51ed223d2b99ef59b998d81f9e'
        });
        // wt.fullscreen();



       }
});
// myPrev.addEventListener("click",prevSlide);

// myNext.addEventListener("click" , nextSlide)











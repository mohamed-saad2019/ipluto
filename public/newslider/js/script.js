



var myImg =Array.from(document.querySelectorAll(".item img"));
var lightBoxContainer = document.getElementById("lightBoxContainer");
var lightBoxItem = document.getElementById("lightBoxItem");
var myClose = document.getElementById("close");
var myPrev = document.getElementById("prev");
var myNext = document.getElementById("next");

var currentIndex = 0;


for(var i = 0 ; i<myImg.length ; i++)
{
    myImg[i].addEventListener("click" , function(eventInfo)
    {

        currentIndex =myImg.indexOf(eventInfo.target);
        console.log(currentIndex) ;

        lightBoxContainer.style.display = "flex";
        
        var imgSrc =  eventInfo.target.getAttribute("src");

        lightBoxItem.style.backgroundImage =" url("+imgSrc+")";


    })
}

// $(".item img").click(function(){
//     let imtemImg = $(this).attr("src");
//     $(".lightBox").css({
//         backgroundImage:" url("+imtemImg+")"
//     })
// })
$(".full_screen").hide();
$(".fa-arrows-alt ").click(function(){
    $(".full_screen").fadeToggle();

 


        var url= $(this).parent().parent().next('img').attr('src');
        $(".full_screen .full_screenimg").css({
            backgroundImage:" url("+url+")"
       
        })

    
 

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
        $('#lightBoxItem').html('<iframe height="90%" src="https://view.officeapps.live.com/op/embed.aspx?src='+$(this).attr("data-src")+'&amp;wdAr=1.7777777777777777" width="100%" height="800px" frameborder="0">This is an embedded <a target="_blank" href="https://office.com">Microsoft Office</a> presentation, powered by <a target="_blank" href="https://office.com/webapps">Office</a>.</iframe>');
       }

       if(type.includes("pdf"))
       {
        $('#lightBoxItem').html('<iframe src="https://docs.google.com/viewerng/viewer?url='+$(this).attr("data-src")+'&embedded=true" frameborder="0" height="100%" width="100%">');
       }

        if(type.includes("url"))
       {
        $('#lightBoxItem').html('<a href="'+$(this).attr("data-src")+'">'+$(this).attr("data-src")+'</a>');
       }


       if(type.includes("image"))
       {
        $('#lightBoxItem').html('<img style="width:100%" src="'+$(this).attr("data-src")+'" alt="not Found"/>');
       }

       if(type.includes("video"))
       {
        $('#lightBoxItem').html('<video style="width:855px" controls><source src="'+$(this).attr("data-src")+'" type="video/mp4" /></video>');
       }

       if(type.includes("audio"))
       {
        $('#lightBoxItem').html('<audio controls><source src="'+$(this).attr("data-src")+'" type="audio/mpeg"></audio>');
       }
});
// myPrev.addEventListener("click",prevSlide);

// myNext.addEventListener("click" , nextSlide)

document.addEventListener("keydown", function(eventInfo){

        if(eventInfo.code == "ArrowRight")
        {
            prevSlide();
        }
        else if(eventInfo.code == "ArrowLeft")
        {
            nextSlide();
        }
        else if(eventInfo.code == "Escape")
        {
            $(".full_screen").hide()

        }
        

})






document.addEventListener("mousemove", function(eventInfo){

    myImg.style.left = eventInfo.clientX + "px";
    myImg.style.top = eventInfo.clientY + "px";

})


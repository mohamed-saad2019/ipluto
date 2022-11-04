



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

myPrev.addEventListener("click",prevSlide);

myNext.addEventListener("click" , nextSlide)

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


$(document).ready(function () {

    $("body").on("change","#input_now", function(){

        var now = document.getElementById("input_now");
        if (now.checked == true){
            document.getElementById("dateTimeDiv").style.visibility = "hidden";
          } else {
            $(".dateTimeDiv").show() ;
            document.getElementById("dateTimeDiv").style.visibility = "visible";
          }
    });  
    

    function submit_form() {
        alert("Dd");
        if (conditions) {
            alert("f");
            document.forms['myform'].submit();
        }
        else {
            returnToPreviousPage();
        }
    }


});






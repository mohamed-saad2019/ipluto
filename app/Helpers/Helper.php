<?php

if( !function_exists('calcPeriodDate'))
{
    function calcPeriodDate($date)
    {
        $d1 = $date ;
        $d2 = date("Y-m-d h:i:s");
        $interval = $d1->diff($d2);
        $diffInSeconds = $interval->s; //45.
        $diffInMinutes = $interval->i; //23.
        $diffInHours = $interval->h; //8.
        $diffInDays = $interval->d; //21.
        $diffInMonth = $interval->m; //21.

        if($diffInMonth != 0)
        {
            $resualt = $diffInMonth . " month ," .$diffInDays." days, ".$diffInHours." Hours, ".$diffInMinutes." mins \n" ;
        }elseif($diffInDays != 0){
            $resualt = $diffInDays." days, ".$diffInHours." Hours, ".$diffInMinutes." mins \n" ;
        }elseif($diffInHours != 0){
            $resualt = $diffInHours." Hours, ".$diffInMinutes." mins \n" ;
        }elseif($diffInMinutes != 0){
            $resualt = $diffInMinutes." mins \n" ;
        }else{
            $resualt = " 0 mins \n" ;
        }
        return $resualt ;
    }
}

if( !function_exists('getTitle'))
{
    function getTitle($name)
    {
        $exName = explode(".",$name);
        return $exName[0] ;
    }
}


?>

<?php

if(!function_exists('get_release')){
    function get_release(){
        // $version = @file_get_contents(storage_path().'/app/bugfixer/version.json');
        // $version = json_decode($version,true);
        // echo $version['subversion'];
    }
}

if(!function_exists('get_subject_instructor')){
    function get_subject_instructor($instructor_id){
       return \App\InstructorGrade::where('instructor_id',$instructor_id)->first()->subject_id;
    }
}


if(!function_exists('get_grade_instructor')){
    function get_grade_instructor($instructor_id){
       return \App\InstructorGrade::where('instructor_id',$instructor_id)->first()->grade_id;
    }
}

if(!function_exists('checkMail')){
    function checkMail($str)
    {
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
    }
}

if(!function_exists('checkDuplicated')){
    function checkDuplicated($colum,$value)
    {
          $count = \App\User::where($colum,$value)->count();

             if($count==0)
            {
                return false;
            }
            else
            {
                return true;
            }
    }
}


if(!function_exists('VerfiedPhoneNumber')){
    function VerfiedPhoneNumber($mobile , $mobile_verfied =1)
    {
           $str = $mobile;

           if (strlen($mobile) == 10 and  $mobile[0] != '0') {
                 $str = '0'.$mobile;
           }


            if(strlen($str) == 11){
                $pattern = "/^0[1][0125]\d{8}$/";
            }
            else
            {
                return false;
            }


            if(preg_match($pattern, $str)){
                return true;
            }
            else
            {
                return false;
            }       
        
    }
}


if(!function_exists('get_parent'))
    {
       function get_parent($dep_id)
        {
          $department = App\Folders::find($dep_id);
            if (!empty($department->parent_id))
            {
                return get_parent($department->parent_id).','.$department->id;

            }
            else 
            {
                return $dep_id;
            }

        }
    }

    if(!function_exists('get_student'))
    {
       function get_student($email,$mobile)
        {
            $data =  \App\User::where('email',$email)->orWhere('mobile',$mobile)->first();

            return $data->id;
        }
    }


if(!function_exists('get_size_lesson'))
    {
       function get_size_lesson($lesson_id,$withou_unit='',$user = '')
        {

          $user = empty($user)?\Auth::user()->id : $user;

          $files_count = \App\File::where('instructor_id','=',$user)
                                ->where('lesson_id',$lesson_id)->count();

         $files = \App\File::where('instructor_id','=',$user)
                                ->where('lesson_id',$lesson_id)->get();

        if ($files_count!=0) 
         {
           $size = 0;

                foreach($files as $file)
                {
                    $s = $file->size!=0 ?$file->size : 1024 ;
                    $size = $size + floatval($s);
                }

                        if($withou_unit != '')
                        {
                            return $size;
                        }

                      $base = log($size) / log(1024);
                      $suffix = array("", "KB", "MB", "GB", "TB")[floor($base)];
                      return  number_format(pow(1024, $base - floor($base)),0).$suffix;
         }
         else
        {
            return '0KB';
        }
          

     }
        
    }
        

if(!function_exists('get_size_file'))
    {
       function get_size_file($size)
        {
          $base = log($size) / log(1024);
          $suffix = array("", "KB", "MB", "GB", "TB")[floor($base)];
          return  number_format(pow(1024, $base - floor($base)),0).$suffix;
     }
        
    }
        

if(!function_exists('get_size_instructor'))
    {
       function get_size_instructor()
        {
        
          $lessons = \App\Lessons::where('instructor_id','=',\Auth::user()->id)->where('saved',1)->get();
          $total_size = 0;

          foreach($lessons as $lesson)
          {
             $files = \App\File::where('instructor_id','=',\Auth::user()->id)
                                ->where('lesson_id',$lesson->id)->get();

              if (!empty($files)) 
              {
                 
                    $size = 0;
                    foreach($files as $file)
                    {
                        $s = $file->size!=0 ?$file->size : 1024 ;
                        $size = $size + floatval($s);
                    }

              }
             $total_size = $total_size + $size; 
          }

         if(empty($total_size))
         {
            return '0MB';
         }
         else
         {
              $base = log($total_size) / log(1024);
              $suffix = array("", "kB", "MB", "GB", "TB")[floor($base)];
              return  number_format(pow(1024, $base - floor($base)),2).$suffix;
         }
          
        }
    }
        


if(!function_exists('calc_free_size'))
    {
       function calc_free_size($used_size)
        {
            $total_size = 0;
            $total_size = \Auth::user()->storage==null?100:\Auth::user()->storage;

            if($total_size !=0 and $used_size !=0)
            {
                $count1 = floatval($used_size)/ floatval($total_size);
                $count2 = $count1 * 100;
                
                return number_format($count2, 1).'%';
            }
           return 0;
        
        }
    }


if(!function_exists('free_size'))
    {
       function free_size($used_size)
        {
            $total_size = 0;
            $total_size = \Auth::user()->storage==null?100:\Auth::user()->storage;

            if($total_size !=0 and $used_size !=0)
            {
                $count1 = floatval($total_size) - floatval($used_size);
                
                return number_format($count1);
            }
           return 0;
        
        }
    }


if(!function_exists('formatfileConvertsize'))
    {
        function formatfileConvertsize($value)
         {
                    return round(($value / 1024000), 1) ;
         }
    }

if(!function_exists('check_file_size_allowed'))
    {
       function check_file_size_allowed($file)
        {
          
            $free_size = free_size(str_replace("MB","",get_size_instructor()));


           if(formatfileConvertsize($file) <=  $free_size)
           {
            return true;
           }

           return false;
        
        }
    }




if(!function_exists('generate_student_code'))
    {
       function generate_student_code($id,$fname,$lname)
        {
          
            $code = strtoupper($fname[0]).strtoupper($lname[0]).$id.rand(1,1000);

            $count = \App\User::where('code',$code)->count();

             if($count==0)
            {
                return $code;
            }
            else
            {
                return generate_student_code($id,$fname,$lname);
            }

        }
    }



if(!function_exists('check_student_in_instructor'))
    {
       function check_student_in_instructor($student_id,$instructor_id)
        {
          

            $count = \App\InstructorStudents::where('student_id',$student_id)->where('instructor_id',$instructor_id)->count();

             if($count==0)
            {
                return false;
            }
            else
            {
                return true;
            }

        }
    }


if(!function_exists('getStudentClass'))
    {
       function getStudentClass($student_id)
        {
          
        $class_st = DB::select("SELECT `class_id` FROM `classes_student` WHERE `student_id` = '".$student_id."' AND `teacher_id` = '".auth()->user()->id."' LIMIT 1");   

        if(!empty($class_st))
        {
              $class = DB::select("SELECT *  FROM `classes` WHERE `id` = '".$class_st[0]->class_id."' LIMIT 1 ");

              return $class[0] ;

        }

        return null;

        }
    }

if(!function_exists('getDaysClass'))
    {
       function getDaysClass($class_id)
        {
          
        $class_days = DB::select("SELECT * FROM `class_days` WHERE `class_id` = '".$class_id."'");   

            return $class_days;
        }
    }



if(!function_exists('get_student_subjects')){
    function get_student_subjects(){

       return $mySubjects = \App\ChildCategory::where('subcategory_id',auth()->user()->grade)->get();
    }
}

if(!function_exists('get_student_grade')){
    function get_student_grade($id){

      $grade = \App\SubCategory::where('id',$id)->first();
      
      return empty($grade)? null : $grade->title;
    }
}

if(!function_exists('get_name_subject')){
    function get_name_subject($id){
       return $mySubjects = \App\ChildCategory::where('id',$id)->first()->title;
    }
}


if(!function_exists('get_child'))
    {
       function get_child($f_id)
        {
            $kids = []; $items=[];
            $items = App\Folders::where('parent_id',$f_id)->get()->toArray();
             foreach ($items as $key => $item) 
             {
                if ($item['parent_id'] == $f_id) {
                    $kids[] = $item['id'] ;
                    if ($f_id != $item['id']) {
                        array_push($kids, ...get_child($item['id']));
                    }
                }
            }
                return $kids;
        }
    }


if(!function_exists('check_share_child_folders'))
    {
       function check_share_child_folders($parent , $childs)
        {


             $share_lesson = \App\ShareLessons::where('student_id',\Auth::user()->id)
                             ->pluck('lesson_id')->toArray();

             array_push($childs, $parent);

             $check        = \App\Lessons::whereIn('id',$share_lesson)
                            ->whereIN('folder_id',$childs)
                            ->count();

            return  $check > 0 ? true : false;
            
        }
    }


if(!function_exists('number_of_lessons_in_folder'))
    {
       function number_of_lessons_in_folder($f_id,$f_childs,$type_user)
        {
            array_push($f_childs, $f_id);
            
            if ($type_user == 'teacher') 
            {
                $count        = \App\Lessons::WhereIN('folder_id',$f_childs)            
                                ->count();
            }
            elseif ($type_user == 'student') 
            {
               $share_lesson = \App\ShareLessons::where('student_id',\Auth::user()->id)
                                ->pluck('lesson_id')->toArray();

               $count        = \App\Lessons::whereIn('id',$share_lesson)
                               ->whereIN('folder_id',$f_childs)
                               ->count();
            }

            return  $count ;   
        }
    }


if(!function_exists('get_size_folder'))
    {
       function get_size_folder($f_id , $f_childs , $type_user  , $user = '')
        {

          $user = empty($user)?\Auth::user()->id : $user;

          array_push($f_childs, $f_id);   $t_size = 0;

           if ($type_user == 'teacher') 
            {
                $lessons      = \App\Lessons::WhereIN('folder_id',$f_childs)            
                                ->pluck('id')->toArray();
            }
           elseif ($type_user == 'student') 
            {
               $share_lesson = \App\ShareLessons::where('student_id',\Auth::user()->id)
                                ->pluck('lesson_id')->toArray();

               $lessons      = \App\Lessons::whereIn('id',$share_lesson)
                               ->whereIN('folder_id',$f_childs)
                               ->pluck('id')->toArray();
            }

           foreach($lessons as $lesson)
           {
             $files_count = \App\File::where('lesson_id',$lesson)->count();

             $files = \App\File::where('lesson_id',$lesson)->get();

             $size = 0;      
                foreach($files as $file)
                {
                    $s = $file->size!=0 ?$file->size : 1024 ;
                    $size= $size + floatval($s);
                }

             $t_size= $t_size + floatval($size);
           }
         
        if ($t_size!=0) 
         {
             $base = log($t_size) / log(1024);
             $suffix = array("", "KB", "MB", "GB", "TB")[floor($base)];
             return  number_format(pow(1024, $base - floor($base)),0).$suffix;
         }
         else
        {
            return '0KB';
        }
     }
    }

if(!function_exists('notifications_count')){
    function notifications_count($colum){
    return \App\Notification::where($colum,\Auth::user()->id)->where('reading','0')->count();
    }
}

if(!function_exists('notifications')){
    function notifications($colum){
       return \App\Notification::where($colum,\Auth::user()->id)
                                ->with('user')->orderBy('created_at','DESC')->get();
    }
}


if(!function_exists('get_lessons_in_grade')){
    function get_lessons_in_grade($grade_id){
       return \App\Lessons::where('instructor_id',\Auth::user()->id)->where('grade',$grade_id)->get();
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
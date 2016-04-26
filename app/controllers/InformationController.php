<?php
    class InformationController extends BaseController{
        function show_grade_data($grade){
            $faculty = Input::get('faculty');
            $posts = DB::table('info_table')->where('grade',$grade);
            if($faculty!=""){
                $posts = $posts->where('subject',$faculty);
            }
            $posts = $posts->orderBy('id','desc')->paginate(5);
            $grade = DB::table('info_table')->where('grade',$grade)->first();
	    return View::make('main.info_grade',array('data' => $posts,'grade' => $grade));
        }
    }
?>
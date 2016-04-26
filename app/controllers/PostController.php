<?php
	class PostController extends BaseController{
		function store(){
			$date = date("Y-m-d");
			DB::table('info_table')->insert([
				'grade'=>Input::get('grade'),
				'subject'=>Input::get('subject'),
				'category'=>Input::get('category'),
				'title'=>e(Input::get('title')),
				'content'=>e(Input::get('content')),
				'date'=>$date
			]);
			return Redirect::to('/');
		}
		//store comment
		function comment_store(){
			$date = date("Y-m-d");
			$id = Input::get('id');
			DB::table('comment_detail')->insert([
				'parent_id'=>$id,
				'name'=>e(Input::get('name')),
				'content'=>e(Input::get('comment')),
				'date'=>$date
			]);
			return Redirect::to('/detail?id='.$id);
		}
		//学年別の時のstore
		function store_grade($grade){
			$date = date("Y-m-d");
			DB::table('info_table')->insert([
				'grade'=>Input::get('grade'),
				'subject'=>Input::get('subject'),
				'category'=>Input::get('category'),
				'title'=>e(Input::get('title')),
				'content'=>e(Input::get('content')),
				'date'=>$date
			]);
			return Redirect::to('/info_grade/'.$grade);
		}
		//show all data
		function index(){
			$posts = DB::table('info_table')->orderBy('id','desc')->paginate(5);
			return View::make('main.index',array('data' => $posts));
		}
		//show comment and title data
		function detail(){
			$getid = Input::get('id');
			$posts = DB::table('info_table')->where('id',$getid)->first();
			$comment = DB::table('comment_detail')->where('parent_id',$getid)->get();
			return View::make('main.detail')->with(array('data'=>$posts,'comment'=>$comment,));
		}
	}
?>
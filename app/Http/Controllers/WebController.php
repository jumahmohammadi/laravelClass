<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use App\Models\Comment;
class WebController extends Controller
{
  function home(){
    $active_page="home";
    $slider=Slider::all();
    $setting=Setting::find(1);
    if(isset($setting)){
      
      $section1=$setting->home_section1;
      $section2=$setting->home_section2;
      $section3=$setting->home_section3;
      $section4=$setting->home_section4;

      $section1_post=Post::with('category','author')->when($section1,function($query) use($section1){
        $query->where('category_id',$section1);
      })->limit(5)->orderBy('id','DESC')->get();
  
      $section2_post=Post::with('category','author')->when($section2,function($query) use($section2){
        $query->where('category_id',$section2);
      })->limit(6)->orderBy('id','DESC')->get();
    
      $section3_post=Post::with('category','author')->when($section3,function($query) use($section3){
        $query->where('category_id',$section3);
      })->limit(5)->orderBy('id','DESC')->get();
    
      $section4_post=Post::with('category','author')->when($section4,function($query) use($section4){
        $query->where('category_id',$section4);
      })->limit(5)->orderBy('id','DESC')->get();
      
      $data['section1_title']=Category::find($section1)->name?? "All Posts";
      $data['section2_title']=Category::find($section2)->name?? "All Posts" ;
      $data['section3_title']=Category::find($section3)->name ?? "All Posts";
      $data['section4_title']=Category::find($section4)->name ?? "All Posts";
      // dd($data['section1_title']);
    }else{
      $section1_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
      $section2_post=Post::with('category','author')->limit(6)->orderBy('id','DESC')->get();
      $section3_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();
      $section4_post=Post::with('category','author')->limit(5)->orderBy('id','DESC')->get();

      $data['section1_title']="All Posts";
      $data['section2_title']="All Posts";
      $data['section3_title']="All Posts";
      $data['section4_title']="All Posts";
    }

    return view('web.home',['sliders'=>$slider,'section1_post'=>$section1_post,'section2_post'=>$section2_post,'section3_post'=>$section3_post,'section4_post'=>$section4_post,'active_page'=>$active_page,'page_title'=>'Home'])->withData($data);
  }

  function category($category){
    $active_page=$category;
    $category_id=Category::where('name',$category)->first()->id;
     
     $posts=Post::with('category','author')->where('category_id',$category_id)->paginate(10);   
     return view('web.category',['posts'=>$posts,'active_page'=>$active_page,'page_title'=>$category]);
  }

  function author($id){
    $user=User::find($id);
    $author_name=$user->name.' '.$user->last_name; 
    $posts=Post::with('category','author')->where('author_id',$id)->paginate(10);   
    return view('web.author',['posts'=>$posts,'page_title'=>$author_name]);
 }

 function tag($tagName){   
   $posts=Post::with('category','author')
   ->whereHas('tags', function ($query) use ($tagName) {
    $query->where('name', $tagName);
    })
   ->paginate(10);   
   return view('web.tags',['posts'=>$posts,'page_title'=>$tagName]);
}


 function search(Request $request){
  $word=$request->word; 
  $posts=Post::with('category','author')->where('title','like',"%".$word."%")->orWhere('detail','like',"%".$word."%")->paginate(10);   
    return view('web.search',['posts'=>$posts,'word'=>$word,'page_title'=>$word]);
 }


  function singlePost($id){
    Post::where('id',$id)->increment('views',1);
    $post=Post::find($id);

    // $comments=$post->comments()->where('parent_id',null)->orderBy('id','DESC')->get();
    $comments=Comment::with('replies')->where('parent_id',null)->where('post_id',$id)->orderBy('id','DESC')->get();
    return view('web.single',['post'=>$post,'comments'=>$comments,'page_title'=>$post->title]); 
  }

  public function contact(){

    return view('web.contact',['page_title'=>"Contact us",'setting'=>setting()]); 
  }
}

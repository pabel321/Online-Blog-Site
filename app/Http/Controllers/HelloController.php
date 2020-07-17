<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class HelloController extends Controller
{
    public function about(){
       return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }
    public function post()
    {
    	 $category=DB::table('categories')->get();
         return view('pages.post',compact('category'));
    }
     public function addCategory()
    {
    	return view('pages.addCategory');
    }

     public function storeCategory(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:5',
        'slug' => 'required|unique:categories|max:25|min:5',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        return Redirect()->back();
    }
      public function allCategory()
    {
        $category=DB::table('categories')->get();
        return view('pages.allCategory',compact('category'));
    }
      public function viewCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('pages.viewCategory')->with('cat',$category);
    }
     public function deleteCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->delete();
        return Redirect()->back();
    }
     public function editCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('pages.editCategory',compact('category'));
    }
    public function updateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:25|min:5',
        'slug' => 'required|max:25|min:5',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        return Redirect()->back();
    }

     public function storePost(Request $request)
    {
        $validatedData = $request->validate([
        'title' => 'required|max:125',
        'details' => 'required|max:400',
        'image' => 'required|mimes:jpeg,jpg,png|max:1000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name. '.' .$ext;
            $upload_path='public/img/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $category=DB::table('posts')->insert($data);
            return Redirect()->back(); 
        }
        else
        {
            $category=DB::table('posts')->insert($data);
            return Redirect()->back(); 
        }       
    }

    public function allPost()
    {
        $category=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
        return view('pages.allPost',compact('category'));
    }

    public function viewPost($id){
         $category=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('pages.viewPost',compact('category'));
    }

    public function editPost($id){
         $category=DB::table('categories')->get();
         $post=DB::table('posts')->where('id',$id)->first();
         return view('pages.editPost',compact('category','post'));
    }

    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
        'title' => 'required|max:125',
        'details' => 'required|max:400|',
        'image' => 'mimes:jpeg,jpg,png|max:1000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name. '.' .$ext;
            $upload_path='public/img/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            $category=DB::table('posts')->where('id',$id)->update($data);
            return Redirect()->route('allPost'); 
        }
        else
        {
            $data['image']=$request->old_photo;
            $category=DB::table('posts')->where('id',$id)->update($data);
            return Redirect()->route('allPost'); 
        }       
    }

    public function deletePost($id)
    {
        $category=DB::table('posts')->where('id',$id)->first();
        $image=$category->image;
        DB::table('posts')->where('id',$id)->delete();
        unlink($image);
        return Redirect()->back();
    }

    public function index()
    {
        $post=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->paginate(2);
        return view('pages.index',compact('post'));
    }

    public function createStudent(){
        return view('pages.createStudent');
    }

    public function storeStudent(Request $request){
         $validatedData = $request->validate([
        'name' => 'required|max:25|min:5',
        'phone' => 'required|unique:students|max:12|min:8',
        'email' => 'required|unique:students',
        ]);

         $student=new Student;
         $student->name=$request->name;
         $student->email=$request->email;
         $student->phone=$request->phone;
         $student->save();
         return Redirect()->back();
    }

    public function allStudent(){
        $student=Student::all();
        return view('pages.allStudent',compact('student'));
    }

    public function viewStudent($id)
    {
        $student=Student::findOrFail($id);
        return view('pages.viewStudent',compact('student'));
    }

    public function deleteStudent($id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return Redirect()->back();
    }
     public function editStudent($id)
    {
        $student=Student::findOrFail($id);
        return view('pages.editStudent',compact('student'));
    }

       public function updateStudent(Request $request,$id)
    {
         $validatedData = $request->validate([
        'name' => 'required|max:25|min:5',
        'phone' => 'required|unique:students|max:12|min:8',
        'email' => 'required|unique:students',
        ]);

         $student=Student::findOrFail($id);
         $student->name=$request->name;
         $student->email=$request->email;
         $student->phone=$request->phone;
         $student->save();
         return Redirect()->back();
    }

}

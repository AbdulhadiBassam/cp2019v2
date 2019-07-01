<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where([]);
        if ($request->has('name')&& $request->input('name') != null)
            $categories = $categories->orwhere('name','like','%' . $request->input('name') . '%');
        if ($request->has('lang')&& $request->input('lang') != '-1')
            $categories = $categories->orwhere('lang','=',$request->input('lang'));

        $categories = $categories->paginate(10);
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function edit($id)
    {
        try
        {
            $category = Category::findOrFail($id);
            return view('category.edit', compact('category'));
        }
        catch (ModelNotFoundException $exception)
        {
            return redirect()->route('category.index')->whth ('error', 'category not found');
        }
    }

    public function update (Request $request, $id)
    {
        try{
            //find model (category)
             $category = Category::findOrFail($id);
             $oldName = $category->name;
             //validation
            $request->validate($this->rules($id), $this->messages());
             if($request->hasFile('category_image')){
                 //upload new one
                 $imagePath = parent::uploadImage($request->file('category_image'));
                 //remov the old image
                 if (File::exists(public_path($category->image))){
                     File::delete(public_path($category->image));
                 }
                 $category->image=$imagePath;
                 //upload new one
             }
             $category->name = $request->input('name');
             $category->lang = $request->input('lang');
             $category->update();
             return redirect()->route('category.index')->with ('success', "category $oldName update successfully");
        }
            catch(ModelNotFoundException $exception){
            return redirect()->route('category.index')->with ('error', 'category not found');
        }
    }

    public function store(Request $request)
    {
//validation
        $direction = '/image/';
//        dd($direction);
//      $this->validate($request,$this->rules() ,$this->messages());
        $request->validate($this->rules(),$this->messages());
        $uploadedImage = $request->file('category_image');
        $imageName = time() .'.'. $uploadedImage->getClientOriginalExtension();
//        $direction = public_path('/image/');

        $uploadedImage->move(public_path($direction), $imageName);
        $imagePath = 'image/' . $imageName;

        $category = new Category();
        $request['image']=$imagePath;
        $category->name = $request['name'];
        $category->fill($request->all());// all category
        $category = Category::Create($request->all());
        $result = DB::table('categories')->insert([
            'name' => $request->input('name'),
            'lang' => $request->input('lang'),
            'image' => $imagePath,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
            ]);
//        $category->name = $request->input('name');
//        $category->lang = $request->input('lang');
//        $category->image = $imagePath;
//        $result = $category->save();
        if ($result === TRUE)
            return redirect()->back()->with('success', 'Category saved successfully');
        //save in database

  }
    public function destroy($id){
        //find category
        try{
            $category = Category::findOrFail($id);
            //deleted
        $category->delete();
        return redirect()->back()->with('success', "Category $category->namr deleted successfully");

        }
        catch (ModelNotFoundException $ModelNotFoundException){
            return redirect()->back()->with('error', "Category is not found");
        }

    }
    private function rules($id = null)
    {
         $rules =[
            'lang'=> 'required|in:en,ar'
        ];
         if ($id){
             $rules ['name'] = 'required|min:3|unique:categories,name,' . $id ;
//             $rules ['category_image'] = 'mimes:png,jpeg,JPG';
         }
         else{
             $rules ['name'] = 'required|min:3|unique:categories,name';
//             $rules   ['category_image'] = 'required|mimes:png,jpeg';
         }
        return $rules;
    }

    private function messages()
    {
        return [
            'name.required' => 'name is required',
            'name.min' => 'name length is too short',
            'name.unique' => 'name is already taken',
            'image.required' => 'image is required',
            'image.mimes' => 'invalid image',
            'lang.required' => 'language in required',
            'lang.in' => 'invalid language'
        ];
    }


}

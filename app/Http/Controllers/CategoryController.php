<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
//validation
//      $this->validate($request,$this->rules() ,$this->messages());
        $request->validate($this->rules(),$this->messages());

        $uploadedImage = $request->file('image');
        $imageName = time() .'.'. $uploadedImage->getClientOriginalExtension();
        $direction = public_path('/image/');
        $uploadedImage->move($direction, $imageName);
        $imagePath = '/image/' . $imageName;

        $category = new Category();
       $category->fill($request->all());// all category
//        $category->name = $request->input(name);
//        $category->lang = $request->input(lang);
//        $category->image = $imagePath;
        $result = $category->save();
        if ($result === TRUE)
            return redirect()->back()->with('success', 'Category saved successfully');
  }

    private function rules()
    {
        return [
            'name' => 'required|min:3|unique:categories,name',
            'image'=> 'required|mimes:png,jpeg',
            'lang'=> 'required|in:en,ar'
        ];
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

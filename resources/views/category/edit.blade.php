{{--{{dd(route('Category.store'))}}--}}{{-- //يظهر لي المسار بشكل كامل من الراوت ويب--}}
@extends('base_layout.master_layout')

@section('body')

    <div class="row">
        <div class="col-md-12">
          <!-- رسالة التعديل موجودة في ملف الماستر-->
        </div>

        <div class="col-md-3">
            <form action="{{route('category.update',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                {{--<input type="hidden" name="_method" value="PUT">--}}
                {{--{{method_field('PUT')}}--}}
                @method('PUT')
                {{--{{csrf_field()}}--}}
                {{--<input type="hidden" name="_token" value="'.csrf_token().'"> --}}
                @csrf
                <div class="col-md-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                             style="width: 260px; height: 150px;">

                            {{--{{dd($category->image)}}--}}
                            {{--<img src="{$category->image}" alt="">--}}
                            <img src="{{asset($category->image)}}" alt="Imge ...">
                        </div>

                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="image"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <span class="error">{{$errors ->first('category_image')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        <span class="error">{{$errors ->first('name')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="lang">Language</label>
                        <select name="lang" id="lang" class="form-control">
                            <option value="en" {{$category->lang == 'en' ? 'selected' : ''}}>en</option>
                            <option value="ar" {{$category->lang == 'an' ? 'selected' : ''}}>ar</option>
                        </select>
                        <span class="error">{{$errors ->first('lang')}} </span>
                    </div>
                    <div class="form-cation">
                        <input type="submit" value="Edit" class="btn btn-primary">
                        <a href="{{route('category.index')}}" class="btn btn-default"> cancel</a>

                        {{--<input type="reset" value="Cancel" class="btn btn-default">--}}
                    </div>
                </div>
            </form>



        </div>

    </div>

@endsection


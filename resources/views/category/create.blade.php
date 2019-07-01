{{--{{dd(route('Category.store'))}}--}}{{-- //يظهر لي المسار بشكل كامل من الراوت ويب--}}
@extends('base_layout.master_layout')

@section('body')

    <div class="row">
<div class="col-md-12">

</div>

        <div class="col-md-3">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                {{--{{csrf_field()}}--}}
                {{--<input type="hidden" name="_token" value="'.csrf_token().'"> --}}
                @csrf
                <div class="col-md-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                        <div>
                                                                <span class="btn red btn-outline btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="category_image"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <span class="error">{{$errors ->first('image')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        <span class="error">{{$errors ->first('name')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="lang">Language</label>
                        <select name="lang" id="lang" class="form-control">
                            <option value="en">en</option>
                            <option value="ar">ar</option>
                        </select>
                        <span class="error">{{$errors ->first('lang')}} </span>
                    </div>
                    <div class="form-cation">
                        <input type="submit" value="Save" class="btn btn-primary">
                        <a href="{{route('category.index')}}" class="btn btn-default"> cancel</a>
                    </div>
                </div>
            </form>



        </div>

    </div>

@endsection


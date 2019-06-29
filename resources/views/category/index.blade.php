@extends('base_layout.master_layout')

@section('body')

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Search</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="GET">

                        <div class="form-group">
                            <labrl for="name">Name</labrl>
                            <input type="text" name="name" class="form-control"
                                   value="{{app('request')->input('name')}}">

                        </div>
                        <div class="form-group">
                            <labrl for="lang">Language</labrl>
                            <select class="form-control" name="lang" >
                                <option value="-1">Choose Language</option>
                                <option value="an" {{app('request')->input('lang')=='en'? 'selected':''}}>Engilsh</option>
                                <option value="ar" {{app('request')->input('lang')=='ar'? 'selected':''}}>Arabic</option>
                            </select>
                        </div>

                    <div class="form-action">
                        <input type="submit" value="search" class="btn btn-primary"/>
                        <a href="{{route('category.index')}}" class="btn-primary"> cancel</a>
                        {{--<input type="reset" value="cancel" class="btn btn-default">--}}
                    </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">categories</h3>
                </div>
                <div class="panel-body">
                <table class="table table-bordered table-striped table-condensed flip-content">
                   <thead>

                   <tr>
                        <th> Name </th>
                        <th> Languge </th>
                   </tr>

                   </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->lang}}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                    <div class="col-md-9 text-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
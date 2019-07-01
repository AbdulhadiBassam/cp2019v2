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
                                <option value="en" {{app('request')->input('lang')=='en'? 'selected':''}}>Engilsh</option>
                                <option value="ar" {{app('request')->input('lang')=='ar'? 'selected':''}}>Arabic</option>
                            </select>
                        </div>

                    <div class="form-action">
                        <input type="submit" value="search" class="btn btn-primary"/>
                        <a href="{{route('category.index')}}" class="btn btn-default"> cancel</a>
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
                        <th> Operations </th>
                   </tr>

                   </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->lang}}</td>
                                <td style="text-align: center"><a class="btn btn-primary"
                                    href="{{route('category.edit',['id'=>$category->id])}}">
                                    <i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger remove-category"
                                        data-value="{{$category->id}}"
                                    >
                                       {{--href="{{route('category.destroy',['id'=>$category->id])}}">--}}
                                        <i class="fa fa-trash-o"></i></a>
                                </td>
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
@section('script')
    <script>
        {{--$('body').on('click','.remove-category',function () {--}}
        {{--var id = $(this).data('value')--}}
        {{--swal({--}}
            {{--title: "@lang('lang.questions.confirm_remove')",--}}
            {{--text: "@lang('category.questions.do_remove')",--}}
            {{--type: "warning",--}}
            {{--showCancelButton: true,--}}
            {{--confirmButtonClass: "btn-danger",--}}
            {{--confirmButtonText: "@lang('lang.yes')",--}}
            {{--cancelButtonText: "@lang('lang.no')",--}}
            {{--closeOnConfirm: false,--}}
            {{--function () {--}}

        {{--}})--}}
        {{--.then((willDelete) => {--}}
            {{--alert('d')--}}
                {{--if (willDelete) {--}}

                    {{--window.location = '{{route('category.destroy')}}/' + id--}}
                    {{--swal("Deleted!","Your imaginary file has deleted","success");--}}
                {{--} else {--}}
                    {{--swal("Your imaginary file is safe!");--}}
                {{--}--}}
            {{--});--}}


        {{--});--}}
      {{--//  $('#remove-category').click(function () {--}}
        $('body').on('click','.remove-category',function () {

        // $('.remove-category').click(function (){
            var id = $(this).data('value')
          console.clear()
            console.log(id)
        swal({
                title: "Are you sure",
                text: "Do yoe want to delete category?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "yes, delete it!",
                closeOnConfirm: false
            },
            function () {
            window.location = '{{route('category.destroy')}}/' + id
                 swal("Deleted!","Your imaginary file has deleted","success");
        });
        });
    </script>
@endsection
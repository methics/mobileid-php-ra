@extends("templates.app")
@section("content")

    <div class="row justify-content-md-center">
        <div class="col col-lg-4">

            @if(isset($msg))
                <p class="alert alert-info">{{$msg}}</p>
            @endif


            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                <br>
            @endif





        </div>
    </div>



@endsection
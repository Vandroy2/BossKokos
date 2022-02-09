@if($errors->any())
    <div class="alert alert-danger message_error">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block message_error">

        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block message_error">

        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block message_error">

        <strong>{{ $message }}</strong>
    </div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>


    $('.message_error').show(1000, function(){
        setTimeout(function(){
            $('.message_error').hide(500);
        }, 4000);
    });
</script>


{{--@if ($messages = Session::get('errors'))--}}
{{--    <div class="alert alert-danger alert-block">--}}
{{--        <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--        <strong>{{ $message }}</strong>--}}

{{--    </div>--}}
{{--@endif--}}


{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session('success'))--}}
{{--    <div class="alert alert-success">{{session('success')}}</div>--}}
{{--@endif--}}


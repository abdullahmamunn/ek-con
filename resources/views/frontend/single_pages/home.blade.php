@extends('frontend.layouts.index')
@section('content')
<div id="wrapper">
    <div id="content">
        <div class="post" id="post-18">
            @if($data)
            @foreach ($data as $item)
            <div class="postentry">
                  
                {!!$item['description']!!}  
                   
            </div>
            @endforeach
            @endif
        </div>  
    </div>
</div>
@endsection

      
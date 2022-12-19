@extends('layouts.app')
@section('title','Profile')

@section('content')

<div class="container">
    <h3>User Profile</h3>
    <div class="row">
        <div class="col s3 blue-grey lighten-3">
            3-columns-wide on large screens,
            4-columns-wide on medium screens,
            12-columns-wide on small screens  
  
        </div>
  
        <div class="col s9 white"> 
            This content will be:
            9-columns-wide on large screens,
            8-columns-wide on medium screens,
            12-columns-wide on small screens 
  
        </div>
  
      </div>
            
    </div>

@endsection


@section('script')

<script>

    $(function(){
       
        // $("#my").click(function(){
        // //    alert("Namaste London");
        // });

    });

</script>


@endsection

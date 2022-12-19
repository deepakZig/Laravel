@extends('layouts.app')
@section('title','Login')

@section('content')

<div class="container">
    <div class="card-header">
        <h2 class="card-title m6">Login</h2>
    </div>
    <div class="row">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <div id="show_success_alert"></div>
                 <form action="#" method="post" id="login_form">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                        <input type="email" name="email" id="email" class="validate" placeholder="Email" >
                        <label class="active" for="email">Email</label>
                        <div class="invalid-feedback red-text" id="email-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input type="password" name="password" id="password" class="validate" placeholder="Password" >
                        <label class="active" for="password">Password</label>
                        <div class="invalid-feedback red-text" id="password-error"></div>
                        </div>
                    </div>
                    <div class="card-action">
                    <div class="row d-grid ">
                        <input type="submit" value="Login" class="btn blue" id="login_btn">
                    </div>
                    <div class="text-center text-secondary">
                        <div>Don't have an account? <a href="{{url('/register')}}" class="text-decoration-none">Register Here</a></div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>       
</div>

@endsection


@section('script')
<script>

    $(function(){

        $("#login_form").submit(function(e){
            e.preventDefault();
            $("#login_btn").val("Please Wait...");
            $.ajax({
                url:'{{route('auth.login')}} ',
                method: 'post',
                data: $(this).serialize (),
                datatype:'json',
                success: function(res){
                    if(res.status == 400){
                    $('#email-error').text(res.message.email);
                    $('#password-error').text(res.message.password);     
                    $("#login_btn").val("Login");
                   
                    }else if(res.status == 401){
                        $('#login_alert').text(res.message);
                        $("#login_btn").val("Login");
                    }else{
                        if(res.status == 200 && res.message == 'Success'){
                            window.location = '{{ route('profile')}}';
                        }
                    }   
                }
            });

        });
        
    });

</script>
@endsection

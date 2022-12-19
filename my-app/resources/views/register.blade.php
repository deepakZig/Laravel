@extends('layouts.app')
@section('title','Registeration')

@section('content')

<div class="container">
    <div class="card-header">
        <h2 class="card-title m6">Register</h2>
    </div>
    <div class="row">
    <div class="col s12 m6">
        <div class="card">
            
            <div class="alert card green lighten-4 green-text text-darken-4">
                <strong id="show_success_alert" ></strong>
            </div>
            <div class="card-content">
               
                 <form action="#" method="post" id="register_form">
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
                    <div class="row">
                        <div class="input-field col s12">
                        <input type="password" name="cpassword" id="cpassword" class="validate" placeholder="Confiram Password" >
                        <label class="active" for="Confiram Password">Confiram Password</label>
                        <div class="invalid-feedback red-text" id="cpassword-error"></div>
                        </div>
                    </div>
                    <div class="row card-action">
                    <input type="submit" value="Register" class="btn blue" id="register_btn">
                    <div>Already have an account? <a href="{{url('/login')}}" class="blue-text">Login Here</a></div>
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

        $("#register_form").submit(function(e){
            e.preventDefault();
            $("#register_btn").val("Please Wait...");
            $.ajax({
                url:'{{route('auth.register')}} ',
                method: 'post',
                data: $(this).serialize (),
                datatype:'json',
                success: function(res){
                   if(res.status == 400){
                    $('#email-error').text(res.message.email);
                    $('#password-error').text(res.message.password);
                    $('#cpassword-error').text(res.message.cpassword);
                    $("#register_btn").val("Register");
                   
                    }else if(res.status == 200){
                        $('.invalid-feedback').empty();
                        $('#show_success_alert').text(res.message);
                        $("#register_form")[0].reset();
                        $("#register_btn").val(" Register");
                   }    
                }
            });

        });


    });

</script>
@endsection

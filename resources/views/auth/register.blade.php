<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   
<style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 20px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 3px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.error_message{
  margin-top: 20px; 
}
.error_message p{
  color:#ff512f; 
}
.text-center{
  text-align: center
}
 </style>
</head>
<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

       
        <form method="POST" action="{{route('register')}}">
          <h3>Register</h3>
          <div class="text-center">
            <a href="{{URL::to('login')}}">Login</a>
          </div>
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" placeholder="name" id="name" value="{{old('name')}}">
    

            <label for="username">Username</label>
            <input type="text" name="email" placeholder="Email or Username" id="username" value="{{old('email')}}">
    
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">

            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" placeholder="Password Confirmation" id="password_confirmation">
    
            <button>Register</button>

            <div class="error_message">
              @if($errors->has('name'))
              <p class="text-danger">{{$errors->first('name')}}</p>
              @endif
              @if($errors->has('email'))
              <p class="text-danger">{{$errors->first('email')}}</p>
              @endif
              @if($errors->has('password'))
              <p class="text-danger">{{$errors->first('password')}}</p>
              @endif
              @if($errors->has('password_confirmation'))
                 <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
              @endif
              </div>
        </form>
       
</body>
</html>
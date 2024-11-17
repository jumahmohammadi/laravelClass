<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        html {
  height: 100%;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}
button{
    padding: 10px 20px;
    background: transparent;
    border:1px solid white; 
    border-radius: 4px;
    display: block;
    width: 100%;
    color:white;
}
.text-danger{
    color:white; 
    display: block;
    margin-top: 8px;
}
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Register</h2>
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="user-box">
                <input type="text" name="name" value="{{old('name')}}">
                <label>Name</label>
              </div>

          <div class="user-box">
            <input type="text" name="email" value="{{old('email')}}">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" >
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="password" name="password_confirmation" >
            <label>Password Confirmation</label>
          </div>

          <div class="user-box">
            <button type="submit">Register</button>
          </div>
        </form>
        <br>
        @if($errors->has('name'))
        <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
        @if($errors->has('email'))
        <span class="text-danger">{{$errors->first('email')}}</span>
        @endif
        @if($errors->has('password'))
        <span class="text-danger">{{$errors->first('password')}}</span>
        @endif
        @if($errors->has('password_confirmation'))
           <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
        @endif
      </div>
</body>
</html>
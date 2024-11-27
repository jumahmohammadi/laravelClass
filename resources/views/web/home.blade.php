<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>{{__('labels.welcome_message')}}</h1>
   
   @if(!Auth::check()) 
    <a href="{{URL::to('login')}}">Login</a> <br>
    <a href="{{URL::to('register')}}">Register</a>
    @else
      <a href="{{URL::to('admin/dashboard')}}">GO to Dashboard</a>
    @endif
</body>
</html>
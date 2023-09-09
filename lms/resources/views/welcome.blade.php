<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>
</head>
<body>
    <h1>PHP CALENDAR TUTORIAL</h1>
    @if(isset($user))
    <h4>Welcome {{$user->name;}}!</h4>
    <a href="{{route('calendar.createEvent')}}"><button>Click here to add new Event</button></a>
    <a href="/listEvent"><button>Click here to List all Event</button></a>
    <a href="{{route('microsoft.signout')}}"><button>Click here to Signout</button></a>
    @else
    <a href="{{route('microsoft.login')}}" class="btn btn-primary btn-large"><button>Click here to sign in</button></a>
    @endif
</body>
</html>
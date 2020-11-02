<h1>Hi, {{ $name }}</h1>
@if($status == "true")
Congratulations,
Your account have been verified!
    @else
Your account have been declined.
@endif

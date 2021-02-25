
<meta name="delete-token" content="{{ auth()->user() && !isset($_COOKIE['api-token']) ?auth()->user()->tokens()->delete():'' }}">
<meta name="delete-token" content="{{ auth()->user() && !isset($_COOKIE['api-token']) ? setcookie('api-token', auth()->user()->createToken('user')->plainTextToken, time() + (180), '/'):'' }}">
<meta name="api-token" content="{{ isset($_COOKIE['api-token']) ? $_COOKIE['api-token'] :null }}">
<meta name="user-id" content="{{ auth()->user()?auth()->user()->id:null }}">

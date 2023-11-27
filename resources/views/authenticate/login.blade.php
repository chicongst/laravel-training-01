<html>
    <head><title>Login</title></head>
    <body style="width: 600px; margin: auto">
        Login
        <div>
            @error('login_failed')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <form action="{{ route('post-login') }}" method="post">
            @csrf
            <div>
                <label>Email:</label>
                <input type="text" name="email"/>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password"/>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="submit" value="Submit"/>
            </div>
        </form>
    </body>
</html>
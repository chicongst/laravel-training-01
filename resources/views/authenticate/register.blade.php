<html>
    <head><title>Register</title></head>
    <body style="width: 600px; margin: auto">
        Register
        <div>
            @error('register_failed')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <form action="{{ route('post-register') }}" method="post">
            @csrf
            <div>
                <label>Fullname:</label>
                <input type="text" name="fullname"/>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Email:</label>
                <input type="text" name="username"/>
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
<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{ route('post-create')}}" method="POST">
    @csrf()
    <label for="fname">Title:</label><br>
    <input type="text" id="fname" name="title" value="{{old('title')}}"><br>
    <label for="lname">Body:</label><br>
    <textarea name="body">{{old('body')}}</textarea><br><br>
    <input type="submit" value="Submit">
</form> 

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>


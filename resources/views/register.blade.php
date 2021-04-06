

    <form action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <br><br><br>
        <h2>Register New Student</h2><br>

    <label for="name">Name:@error('name')
        <small style="color: red;">{{$message}}</small>
        @enderror
    </label><br>
    <input type="text" id = "name" name="name" value="{{old('name')}}"><br><br>
    <label for="email">Email:@error('email')
        <small style="color: red;">{{$message}}</small>
        @enderror
    </label><br>
    <input type="email" id = "email" name="email" value="{{old('email')}}"><br><br>
    <label for="phone1">Phone1:  @error('phone1')
        <small style="color: red;">{{$message}}</small>
        @enderror
    </label><br>
    <input type="number" id = "phone1" name="phone1" value="{{old('phone1')}}">
    <br><br>
    <label for="phone2">Phone2:@error('phone2')
        <small style="color: red;">{{$message}}</small>
        @enderror
    </label><br>
    <input type="number" id = "phone2" name="phone2" value="{{old('phone2')}}"> <br><br>
    <label for="image">Profile Pic:@error('image')
        <small style="color: red;">{{$message}}</small>
        @enderror
    </label><br>
    <input type="file" id = "image" name="image" value="{{old('image')}}"><br><br>
    <button type="submit">Save</button>
    </form>



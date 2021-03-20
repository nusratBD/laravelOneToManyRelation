<center>
    <h1>All Students Data</h1>
    <table border="1" style="width: 100%">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Contact No</th>
          <th>Pro Pic</th>
        </tr>

       @foreach ($data as $row )
       <tr>
       <td>{{$row->student->name}}</td> {{--$row->student->name  here: student is the function of contact model & name is table value--}}
       <td>{{$row->student->email}}</td>
       <td>{{$row['phone1']}}<br>{{$row['phone2']}}</td>
       <td><img src="{{ Storage::url($row->student->image)}}" style="height:50px; width:80px"></td>
       </tr>
       @endforeach
      </table>
</center>

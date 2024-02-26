@extends('layout.main')
@section('content')
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>School</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($teachers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->salary }}</td>
                <td>{{ $c->school }}</td>
                <th>
                    <a href="">Sửa</a>
                    <a href="">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection

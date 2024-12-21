<!DOCTYPE html>
<head>

</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
        </tr>
        @endforeach
        </tbody>

    </table>
</body>
</html>

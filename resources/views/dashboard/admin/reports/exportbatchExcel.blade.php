<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($gazLogs as $gazLog)
        <tr>
            <td>{{ $gazLog->id }}</td>
            <td>{{ $gazLog->notice }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
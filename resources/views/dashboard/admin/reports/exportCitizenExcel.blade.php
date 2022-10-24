<table>
    <thead>
    <tr>
        <th>الرقم</th>
        <th>اسم المواطن</th>
        <th>رقم الوطني</th>
        <th>رقم الجوال</th>
        <th>المطابقه</th>
        <th>أسم المراقب</th>
        <th>الملاحظة</th>  
    </tr>
    </thead>
    <tbody>
    @foreach($citizens as $citizen)
        <tr>
            <td>{{ $citizen->id }}</td>
            <td>{{ $citizen->citName }}</td>
            <td>{{ $citizen->identityNum}}</td>
            <td>{{ $citizen->mobileNum }}</td>
            <td>{{ $citizen->checked }}</td>
            <td>{{ $citizen->observer->obsName }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>
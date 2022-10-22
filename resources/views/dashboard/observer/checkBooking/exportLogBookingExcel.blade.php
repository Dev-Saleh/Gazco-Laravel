<table>
    <thead>
    <tr>
        <th>رقم الفريد</th> 
        <th>أسم المواطن</th> 
        <th>رقم الجوال</th>
        <th>التوقيع</th>
        <th>الملاحظات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($LogBookingCitizen as $Citizen)
        <tr>
            <td>{{ $Citizen->id }}</td> 
            <td>{{ $Citizen->citizen->citName }}</td> 
            <td>{{ $Citizen->citizen->mobileNum }}</td> 
            <td></td> 
            <td></td> 
        </tr>
    @endforeach
    </tbody>
</table>

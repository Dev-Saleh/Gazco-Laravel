<table>
    <thead>
    <tr>
        <th>الرقم</th> 
        <th>أسم المواطن</th> 
        <th>تاريخ الحجز</th>
        <th>تاريخ فتح الحظر</th>
        <th>التوقيع</th>
    </tr>
    </thead>
    <tbody>
    @foreach($LogBookingCitizen as $Citizen)
        <tr>
            <td>{{ $Citizen->citizen->id}}</td> 
            <td>{{ $Citizen->citizen->citName }}</td> 
            <td>{{ $Citizen->created_at }}</td> 
            <td>{{ $Citizen->citizen->unblockDate }}</td> 
            <td></td> 
        </tr>
    @endforeach
    </tbody>
</table>

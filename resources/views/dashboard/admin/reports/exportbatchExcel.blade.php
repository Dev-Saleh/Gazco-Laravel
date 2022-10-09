<table>
    <thead>
    <tr>
        <th>رقم الفريد</th>
        <th>أسم المديري</th>
        <th>أسم المحظة</th>
        <th>أسم المربع</th>
        <th>أسم الوكيل</th>
        <th>الملاحظة</th>  
    </tr>
    </thead>
    <tbody>
    @foreach($gazLogs as $gazLog)
        <tr>
            <td>{{ $gazLog->id }}</td>
            <td>{{ $gazLog->directorate->dirName }}</td>
            <td>{{ $gazLog->station->staName }}</td>
            <td>{{ $gazLog->rigon->rigName }}</td>
            <td>{{ $gazLog->agent->agentName }}</td>
            <td>{{ $gazLog->notice }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th>عدد الدفعات</th>
        <th>اجمالي الدفعات</th>
        <th>التي تم فتح الحجز</th> 
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $batchCount}}</td>
            <td>{{ $batchResult }}</td>
            <td>{{$allowBookingCount }}</td>
        </tr>
    </tbody>
</table>
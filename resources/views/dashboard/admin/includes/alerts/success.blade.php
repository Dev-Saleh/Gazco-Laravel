@section('script')
@if(Session::has('success'))

 <script>alert.show('{{Session::get('success')}}','success')</script>

@endif
@if(Session::has('error'))

 <script>alert.show('{{Session::get('error')}}','error')</script>

@endif
@stop



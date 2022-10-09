@section('script')
<script>
$(document).on('click', '#loginCitizenBtn', function(e) {
    e.preventDefault();
   var formData = new FormData($('#citizenForm')[0]);
    var identity_num = $('#identity_num').val();
   var citizen_password = $('#citizen_password').val();
    console.log(identity_num);
    $.ajax({
        type: 'GET',
        url: "{{ route('checkauth.citizen') }}",
        data: {
            'identity_num':'123',
            'citizen_password':'321',
        },                  
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            console.log(data)
            newAlert(data.alertType,data.msg);
        },
        error: function(reject) {
            console.log('sss');// for test;

        }
    });
});
</script>
 
@stop
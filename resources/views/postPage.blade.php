<!DOCTYPE html>
<html>
<head>
	<title>Kledo Payment</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

	<style type="text/css">
		
	</style>
<div style="margin:30px">
	<h3>Tambah Payment</h3>
  
              
                <label for="name" class="col-sm-2 control-label">Payment Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="payment_name" name="payment_name" placeholder="type payment name" value="" maxlength="50" required="">
                </div>
       
  <button style="margin: 20px" id="tambah" name="tambah" class="btn btn-primary tambah">Tambah data</button>
  </div>
              <script type="text/javascript">
    $(document).ready(function () {
      $('#tambah').on('click', function() {
        $.ajax({
      type: 'post',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{route('payment.post')}}",
      data: {
          'id': $("#id").val(),
          'payment_name': $('#payment_name').val(),  
      },
      success: function(data) {
        window.location.href = "{{ route('payment') }}";

             },
             error: function(data) {
                 
      
             }
  });
      })
    });

</script>

</body>
</html>
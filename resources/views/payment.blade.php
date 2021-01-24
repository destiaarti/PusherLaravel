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
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<script>
Pusher.logToConsole = true;

var pusher = new Pusher('a5babfdfc72276a4ed36', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  alert(JSON.stringify(data));
});
</script>
<body>

	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h3>Data Payment</h3>

  <a style="margin-bottom: 10px" class="btn btn-success" href="{{ route('payment.postPage') }}">Tambah data</a>
  
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Payment Name</th>
      <th width="50px"><input type="checkbox" id="master"></th>
			
		</tr>
		@foreach($payment as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->payment_name }}</td>
		
      <td><input type="checkbox" class="sub_chk" data-id="{{$p->id}}"></td>
		</tr>
		@endforeach
	</table>

	<br/>
  <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ route('payment.delete') }}">Delete All Selected</button>
  </br>
	Halaman : {{ $payment->currentPage() }} <br/>
	Jumlah Data : {{ $payment->total() }} <br/>
	Data Per Halaman : {{ $payment->perPage() }} <br/>


	{{ $payment->links() }}

    <!-- Alert whenever a new notification is pusher to our Pusher Channel -->

   
      
              <script type="text/javascript">
    $(document).ready(function () {
      $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
        $('.delete_all').on('click', function(e) {


var allVals = [];  
$(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
});  


if(allVals.length <=0)  
{  
    alert("Please select row.");  
}  else {  


    var check = confirm("Are you sure you want to delete this row?");  
    if(check == true){  


        var join_selected_values = allVals.join(","); 


        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
                if (data['success']) {
                    $(".sub_chk:checked").each(function() {  
                        $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });


      $.each(allVals, function( index, value ) {
          $('table tr').filter("[data-row-id='" + value + "']").remove();
      });
    }  
}  
});


    });
</script>

</body>
</html>
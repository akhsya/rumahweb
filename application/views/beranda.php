<div class="box">
	<div class="box-head">
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah</button>

	</div>
	<div class="box-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Avatar</th>
					<!-- <th>Aksi</th> -->
				</tr>
			</thead>
		</table>
	</div>
</div>

<script>
	$.ajax({
	    url: "https://reqres.in/api/users?page=2",
	    type: "get",
	    success: function(response){
	        console.log(response);
	        var items=[];
	        $.each(response.data, function(i, val) {
            	items.push("<tr>");
            	items.push("<td>"+val.id+"</td>");
            	items.push("<td>"+val.first_name+"</td>");
            	items.push("<td>"+val.last_name+"</td>");
            	items.push("<td><img src="+val.avatar+" width='45'></td>");
            	items.push("</tr>");
	        });	
        	$('<tbody/>', {html:items.join("")}).appendTo('table');
	        $('table').attr('id', 'myTable');
	    }
	});
</script>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form action="" id="user">
		  <div class="form-group">
		    <label for="email">first name :</label>
		    <input type="email" id="awal" class="form-control" id="">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Last Name:</label>
		    <input type="text" id="akhir" class="form-control" id="">
		  </div>
		  <button type="button" onclick="create()" class="btn btn-default">Submit</button>
		</form>
      </div>
    </div>

  </div>
</div>

<script>
	// $('#user').serialize()
	function create() {
		$.ajax({
		    url: "https://reqres.in/api/users",
		    type: "POST",
		    data: {
		    	first_name : $('#awal').val(),
		    	last_name : $('#akhir').val()
		    },
		    success: function(response){
		        console.log(response);
		    }
		});
	}
</script>
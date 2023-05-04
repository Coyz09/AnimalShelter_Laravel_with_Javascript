$(document).ready(function () {
	$.ajax({
		type: "GET",
		url: "/api/requests/getrequests",
		dataType: 'json',
		success: function (data) {
			var tr = [];
			var i = 0;
			var tbody = $('<tbody>')
			$('.table').append(tbody)
			$.each(data, function (key, value) {
          var img = "<img src="+value.img +" width='70px', height='70px'/>";
				tr[i] = $('<tr name="'+value.id+'" id="id">')
				$(tbody).append(tr[i])
				$(tr[i]).append($('<td>'+value.id+'</td>'))
				$(tr[i]).append($('<td>'+value.adopter_Fname+'</td>'))
				$(tr[i]).append($('<td>'+value.adopter_Lname+'</td>'))
				$(tr[i]).append($('<td>'+value.adopter_Address+'</td>'))
				$(tr[i]).append($('<td>'+value.adopter_Contact+'</td>'))
				$(tr[i]).append($('<td>'+value.adopter_Email+'</td>'))
				$(tr[i]).append($('<td>'+img+'</td>'))
				$(tr[i]).append($('<td><form method="POST" action="#" id="form"><input type="hidden" id="isApproved" value="1"><input type="button" class="btn btn-primary" id="accept-btn" value="APPROVE"></form></td>'))
				i++;
				console.log(value.adopter_Fname);
				
})
			
			
},
		error: function (error) {
			console.log(error);
			alert(error);
		}
	});
$('.table-responsive').on('click', '#accept-btn', function(e){
			e.preventDefault();
			var $tr = $(this).closest('#id');
			var id = $(this).closest('#id').attr("name");
			var data = $(this).closest("#form").serialize();
			let formData = new FormData($(this).closest('#form')[0]);
			$.ajax({
			type: 'POST',
			url: '/api/requests/'+id,
			data: formData,
			contentType: false,
			processData: false,
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			dataType: "json",
			success: function (data) {
				
				$tr.fadeOut(1000, function () {
          		$tr.remove();
				});
			},
			error: function (error) {
				console.log(error);
			}
		});
})	
$('#update-btn').on('click', function(){
alert('clicked')
})


});




$("#myFormSubmit").on('click', function(e) {
    e.preventDefault();
    var data = $('#cform')[0];
    console.log(data);
    let formData = new FormData($('#cform')[0]);
    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
    $.ajax({
        type: "POST",
        url: "/api/register",
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
           if(data.errors)
                {
                   $('.alert-danger').html('');
                          $.each(data.errors, function(key, value){
                          $('.alert-danger').show();
                          $('.alert-danger').append('<li>'+value+'</li>');
                      });
                   }
           else{

            console.log(data.adopter.img);
            $("#myModal").modal("hide");
          
                var img = "<img src="+data.adopter.img +" width='50px', height='50px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.adopter.id));
                tr.append($("<td>").html(data.adopter.adopter_Fname));
                tr.append($("<td>").html(data.adopter.adopter_Lname));
                tr.append($("<td>").html(data.adopter.adopter_Address));
                tr.append($("<td>").html(data.adopter.adopter_Contact));
                tr.append($("<td>").html(data.adopter.adopter_Email));
                tr.append($("<td>").html(img));
                tr.append("<a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px'></i></a> <a href='#'  class='deletebtn' data-id="+ data.id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red'></i></a>");
                $("#cform").trigger("reset");
                // $('#loginModal').modal("show");
                $('#loginModal').modal("show");
              }

        },
        error: function(error) {
            console.log('error');
        }
    });
  });

$("#loginSubmit").on('click', function(e) {
    e.preventDefault();
    var data = $('#cform')[0];
    console.log(data);
    let formData = new FormData($('#cform')[0]);
    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
    $.ajax({
        type: "POST",
        url: "/api/register",
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
          if(data.errors)
                {
                   $('.alert-danger').html('');
                          $.each(data.errors, function(key, value){
                          $('.alert-danger').show();
                          $('.alert-danger').append('<li>'+value+'</li>');
                      });
                   }
           else{
            console.log(data.adopter.img);
            $("#loginModal").modal("hide");
          
                var img = "<img src="+data.adopter.img +" width='50px', height='50px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.adopter.id));
                tr.append($("<td>").html(data.adopter.adopter_Fname));
                tr.append($("<td>").html(data.adopter.adopter_Lname));
                tr.append($("<td>").html(data.adopter.adopter_Address));
                tr.append($("<td>").html(data.adopter.adopter_Contact));
                tr.append($("<td>").html(data.adopter.adopter_Email));
                tr.append($("<td>").html(img));
                tr.append("<a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px'></i></a> <a href='#'  class='deletebtn' data-id="+ data.id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red'></i></a>");
                $("#cform").trigger("reset");
                // $('#loginModal').modal("show");
                $('#loginModal').modal("show");
              }

        },
        error: function(error) {
            console.log('error');
        }
    });
  });

	

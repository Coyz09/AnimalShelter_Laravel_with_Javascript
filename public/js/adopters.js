
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
          
                var img = "<img src="+data.adopter.img +" width='70px', height='70px'/>";
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


$('#editModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).attr('data-id');
    console.log(id);
    // $('<input>').attr({type: 'hidden', id:'id',name: 'id',value: id}).appendTo('#updateform');
    $.ajax({
        type: "GET",
        url: "/api/adopter/" + id + "/edit",
        success: function(data){
               // console.log(data);
               $("#id").val(data.id);
               $("#efname").val(data.adopter_Fname);
               $("#elname").val(data.adopter_Lname);
               $("#eaddress").val(data.adopter_Address);
               $("#econtact").val(data.adopter_Contact);
               $("#eemail").val(data.adopter_Email);
               
               // $("#eimg").val(data.img);
          },
         error: function(){
          console.log('AJAX load did not work');
          alert("error");
          }
      });
});
$("#updatebtn").on('click', function(e) {
    e.preventDefault();
    var id = $('#id').val();
    console.log(id);
    var table = $('#ctable').DataTable();
    var cRow = $("tr td:contains("+id+")").closest('tr');
    
    var data = $("#updateform").serialize();
     console.log(data);
    $.ajax({
            type: "PATCH",
            url: "/api/adopter/"+ id,
            data: data,
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
                console.log(data);
                $('#editModal').modal("hide");

     table.row(cRow).data(data).invalidate().draw(false);
   }
     },
            error: function(error) {
                alert('error');
            }
        });
});

$('#editModal').on('hidden.bs.modal', function (e) {
  $("#updateform").trigger("reset");
  });

$('#editModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).attr('data-id');
    $("#updateform").trigger("reset");
    $("#id").val(id );
});

$(document).ready(function() {
  $.ajax({
      type: "GET",
      url: "/api/adopters/all",
      dataType: 'json',
      success: function (data) {
        if(data.errors)
                {
                   $('.alert-danger').html('');
                          $.each(data.errors, function(key, value){
                          $('.alert-danger').show();
                          $('.alert-danger').append('<li>'+value+'</li>');
                      });
                   }
           else{
         console.log(data);
         
          $.each(data, function(key, value) {
           
            var img = "<img src="+value.img +" width='50px',height='50px'/>";
            var tr = $("<tr>");
            tr.append($("<td>").html(value.adopter_Fname));
            tr.append($("<td>").html(value.adopter_Lname));
            tr.append($("<td>").html(value.adopter_Address));
            tr.append($("<td>").html(value.adopter_Contact));
            tr.append($("<td>").html(value.adopter_Email));
            tr.append($("<td>").html(img));              
            tr.append($("<td>").html(value.animal_Name));
            $("#abody").append(tr);
            // console.log(value.animals[1]);
     });
        }
    },

      error: function(){
        console.log('AJAX load did not work');
        alert("error");
    }
});
});
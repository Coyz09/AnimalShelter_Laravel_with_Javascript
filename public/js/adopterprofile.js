$(document).ready(function() {

$("#update-btn").on('click', function(e) {
    e.preventDefault();
var adopterid = $('#adopterid').val();
    // console.log(adopterid);
    // var table = $('#ctable').DataTable();
    // var cRow = $("tr td:contains("+adopterid+")").closest('tr');
    
 var data = $("#update-form").serialize();
 let formData = new FormData($(this).closest('#update-form')[0]);

$.ajax({
        type: "POST",
        url: "/api/adopterprofile/"+adopterid+"/edit",
        data: formData,
        contentType: false,
        processData: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType: "json",
        success: function(data) {
          // if(data.errors)
          //       {
          //          $('.alert-danger').html('');
          //                 $.each(data.errors, function(key, value){
          //                 $('.alert-danger').show();
          //                 $('.alert-danger').append('<li>'+value+'</li>');
          //             });
          //          }
          //  else{
            $("#update-form").trigger("reset");

            window.location.href = "/adopterprofile";

            console.log(data);
           
// }
 },
        error: function(error) {
           console.log(error);
        }
    });
});
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

  
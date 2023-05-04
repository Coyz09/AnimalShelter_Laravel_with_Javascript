
$(document).ready(function() {
  $.ajax({
      type: "GET",
      url: "/api/animals/all",
      dataType: 'json',
      success: function (data) {
         console.log(data);
         
          $.each(data, function(key, value) {
           
            var img = "<img src="+value.animal_Image +" width='250px',height='250px'/>";
            var tr = $("<tr>");
            tr.append($("<td>").html(value.animal_Name));
            tr.append($("<td>").html(value.animal_Type));
            tr.append($("<td>").html(value.animal_Breed));
            tr.append($("<td>").html(value.animal_Age));
            tr.append($("<td>").html(value.animal_Rescueplace));
            tr.append($("<td>").html(value.animal_Rescuedate));
            tr.append($("<td>").html(value.adoption_Status));
            tr.append($("<td>").html(img));              
            tr.append($("<td>").html(value.adopter_Fname));
            $("#anbody").append(tr);
            // console.log(value.animals[1]);
     });
    },

      error: function(){
        console.log('AJAX load did not work');
        alert("error");
    }
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

  
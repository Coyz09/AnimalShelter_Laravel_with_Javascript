$(document).ready(function () {
  $("#submit").on('click', function (e) {
    e.preventDefault();
    validationObj.form();
    if ($('#form').valid()) {
      var data = $("#form").serialize();
      let formData = new FormData($('#form')[0]);
      $.ajax({ 
        type: "POST",
        url: "/adoptersignup",
        data: formData,
        contentType: false,
        processData: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType: "json",
        success: function (data) {
           // console.log(data);
          $("#form").trigger("reset");
          console.log(data);
        },
        error: function (error) {
          console.log(error);
          console.log(data);
        }
      });
    }
  }); // end of store/update



    
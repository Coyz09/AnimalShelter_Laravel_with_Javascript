$('#ctable').DataTable({
     
     ajax: {
     url :"/api/adopter/all",
     dataSrc: "",
     },
    
     dom: 'Bfrtip',

    buttons: [ 'colvis',
              {

                  text: 'Add Adopter',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      // alert( 'Button activated' )
                      $("#cform").trigger("reset");
                      $('#myModal').modal('show');

                       
                  }
              },'excel', 'pdf' 

          ],
     
 columns: [
              { "data": "id" },
              { "data": "adopter_Fname" },
              { "data": "adopter_Lname" },
              { "data": "adopter_Address" },
              { "data": "adopter_Contact" },
              { "data": "adopter_Email" },

              {
                "data": "img",
                "render": function (data) {
                    return '<img src="' + data + '" class="avatar" width="50" height="50"/>';
                    }
              },
              { "data": "status" },
              { "data" : null,
                  render : function ( data, type, row ) {
                  return "<a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px'></i></a> <a href='#'  class='deletebtn' data-id="+ data.id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red'></i></a>";
                }
              }
        ],

       });

$("#myFormSubmit").on('click', function(e) {
    e.preventDefault();
    var data = $('#cform')[0];
    console.log(data);
     var table = $('#ctable').DataTable();
    let formData = new FormData($('#cform')[0]);
    for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
    }
    $.ajax({
        type: "POST",
        url: "/api/adopter",
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
                 table.destroy().draw();
                 $('#ctable').DataTable({
     
               ajax: {
               url :"/api/adopter/all",
               dataSrc: "",
               },
              
               dom: 'Bfrtip',

              buttons: [ 'colvis',
                        {

                            text: 'Add Adopter',
                            className: 'btn btn-primary',
                            action: function ( e, dt, node, config ) {
                                // alert( 'Button activated' )
                                $("#cform").trigger("reset");
                                $('#myModal').modal('show');

                                 
                            }
                        },'excel', 'pdf' 

                    ],
               
           columns: [
                        { "data": "id" },
                        { "data": "adopter_Fname" },
                        { "data": "adopter_Lname" },
                        { "data": "adopter_Address" },
                        { "data": "adopter_Contact" },
                        { "data": "adopter_Email" },

                        {
                          "data": "img",
                          "render": function (data) {
                              return '<img src="' + data + '" class="avatar" width="50" height="50"/>';
                              }
                        },
                        { "data": "status" },
                        { "data" : null,
                            render : function ( data, type, row ) {
                            return "<a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px'></i></a> <a href='#'  class='deletebtn' data-id="+ data.id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red'></i></a>";
                          }
                        }
                  ],

                 });

                $('.alert-danger').hide();
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
               // $("#estatus").val(data.status);
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
                $('.alert-danger').hide();

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


$('#ctable tbody').on( 'click', 'a.deletebtn', function (e) {
    var table = $('#ctable').DataTable();
    var $row = $(this).closest('tr');
    var id = $(this).data('id');
    console.log(id);
    // console.log(table);
    e.preventDefault();
        bootbox.confirm({
            message: "Do you want to delete this personnel?",
            buttons: {
                confirm: {
                    label: 'yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'no',
                    className: 'btn-danger'
                }
            },
      callback: function (result) {
        console.log(result);
               if (result)
                          $.ajax({
                              type: "DELETE",
                              url: "/api/adopter/"+ id ,
                              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                              dataType: "json",
                             success: function(data) {
                                  console.log(data);
                                  table.row( $row ).remove().draw(false);
                                 bootbox.alert('success');
                              },
                              error: function(error) {
                                  console.log('error');
                              }
                            });          
              }
                  
        });
});
// $(document).ready(function () {
// 	$('#form').on('click', '#submit', function (e) {
//     e.preventDefault();
// 		var data = $("#form").serialize();
// 		let formData = new FormData($('#form')[0]);
// 		$.ajax({
// 			type: 'POST',
// 			url: '/api/login',
// 			data: formData,
// 			contentType: false,
// 			processData: false,
// 			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
// 			dataType: "json",
// 			success: function (data) {
// 				console.log(data)
// 			},
// 			error: function (error) {
				
// console.log(error)
// 			}
// 		});
// 	});

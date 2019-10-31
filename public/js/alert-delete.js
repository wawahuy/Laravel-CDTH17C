function adddelete() {

$('.alert-delete').removeClass('disabled');

$('.alert-delete').click(function (e){
    e.preventDefault();

    swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: true
	},
	(isConfirm) => {
        if (isConfirm){
            window.location = $(this).attr('href');
        } else {
        }
	});
});


}


$(document).ready(function () {
    adddelete();
});


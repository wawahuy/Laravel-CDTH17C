function adddelete() {

$('.alert-delete').removeClass('disabled');

$('.alert-delete').click(function (e){
    e.preventDefault();

    swal({
		title: "Bạn có muốn?",
		text: "Xóa dòng dữ liệu này!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Có, xóa nó!',
		cancelButtonText: "Không!",
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


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


function addWarning(){
	$("*[data-href]").css('cursor', 'pointer');
	$("*[data-href]").click(function (e){
		e.preventDefault();

		swal({
			title: "Bạn có muốn?",
			text: $(this).attr('data-alert'),
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Có, đi đến',
			cancelButtonText: "Không",
			closeOnConfirm: false,
			closeOnCancel: true
		},
		(isConfirm) => {
			if (isConfirm){
				window.location = $(this).attr('data-href');
			} else {
			}
		});
	});
}

function addShowpass(){
	$("*[data-password]").css('cursor', 'pointer');
	$("*[data-password]").click(function (e){
		e.preventDefault();
		var t = $(this);
		$(t.attr('data-password')).attr('type', 'text');
		setTimeout(function (t){
			$(t.attr('data-password')).attr('type', 'password');
		}, 1500, t);
	});
}

$(document).ready(function () {
	adddelete();
	addWarning();
	addShowpass();
});


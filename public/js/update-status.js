
$('.status-select').on('change', function () {

	var resultId = $(this).data('result-id');
	var newStatus = $(this).val();

	$.ajax({
		url: 'admin/update',
		method: 'POST',
		data: {
			result_id: resultId,
			new_status: newStatus
		},
		success: function (response) {

			if (response.success) {
				alert('Статус обновлен');
			}
		}
	});
});

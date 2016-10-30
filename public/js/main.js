function init() {
	$('#finduser').on('submit', callUser);
	$('#invite').on('change', invite);
	$('#delete').on('click', handleDelete);
}

function callUser(event, $data) {
	event.preventDefault();
	var $query = $("#name_user").val();

	$.ajax({
		type: 'get',
		url: '/users/' + $query,
		success: handleUserData
	});
}

function handleUserData(data) {
	var $toggle = $('#invite');
	var userId = $('#user').data('user_id');

	var $userContainer = $('#user_found');
	var $result = $userContainer.find("#user");
	$result.text(data.name);
	$result.data('user_id', data.id);
	$userContainer.removeClass('hidden');

	console.log(userId, data.id);
	$toggle.prop('checked', userId == data.id);
	$('#invited').text(userId == data.id ? 'Invited.' : 'Not invited.');
}

function invite(event) {
	var $userId = $('#user_found #user').data('user_id');
	var $invite = $(this).is(':checked') ? 1 : 0;

	$.ajax({
		'type': 'get',
		'url': '/tests/' + $('#test_id').val() + '/invite/' + $userId + '/' + $invite,
		success: handlerInviteCallback
	});
}

function handlerInviteCallback(data) {	
	$('#invited').text(data == 1 ? 'Invited.' : 'Uninvited.');
}

function handleDelete(event) {
	event.preventDefault();
	var testId = $('#test_id').val();

	if (testId.length > 0) {
		if (confirm('Please confirm to delete.')) {
			window.location.href = '/tests/delete/' + testId;
		}
	}
	else {
		alert('First save to delete.');
	}
}

$(window).on('load', init);
var $ = jQuery.noConflict();

 $('body').on('hover', '.nav-item.dropdown', function() {
    $(this).find('.dropdown-toggle').dropdown('toggle');
});

$(document).ready(function() {
    $('#example').DataTable();
} );


function applyReadOnlyMode(form_id){
	$('#' + form_id + ' input').attr('readonly', 'readonly');
	$('#' + form_id + ' input[type=radio]').attr('disabled', 'disabled');
	$('#' + form_id + ' input[type=checkbox]').attr('disabled', 'disabled');
	$('#' + form_id + ' textarea').attr('readonly', 'readonly');
	$('#' + form_id + ' select').attr('disabled', 'disabled');
	$('#' + form_id + ' .save_btn').remove();
	$('#' + form_id + ' .add_btn').remove();
}

jQuery(document).ready(function () {
    var msg       = jQuery('.message').text();
    var msg_color = jQuery('.message_color').text();
    
    if (msg != '' && msg_color != '') {
        notify(msg, msg_color, 3000);
    } 
});


var notify = function(msg, type, time = 5000) {
    if (type == 'success') {
        toastr.success(msg, 'Success Alert', {timeOut: time});
    } else if (type == 'error') {
        toastr.error(msg, 'Inconceivable!', {timeOut: time});
    } else if (type == 'info') {
        toastr.info(msg, 'Information', {timeOut: time});
    } else if (type == 'warning') {
        toastr.warning(msg, 'Warning', {timeOut: time});
    }
      
}
  
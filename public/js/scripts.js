$(function() {
    $(".validate").validate();
});


$('button.btn-delete').confirm({
    title: 'Confirm Action?',
    content: 'Are you sure want to delete?',
    buttons: {
        yes: {
            btnClass: 'btn-red',
            action: function(button) {
                let buttonInstance = this.$target;
                let formInstance = $(buttonInstance).closest("form");
                formInstance.submit();
            }
        },
        no: function() {

        }
    }
});
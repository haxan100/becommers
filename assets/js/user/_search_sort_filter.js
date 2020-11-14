$('body').on('click','._bizOption', function() {
    $(this)
        .parent()
        .parent()
        .find('._bizSelect')
        .attr('data-value', $(this).data('value'))
        .find('._bizSelectText')
        .html($(this).html());
});
$('body').on('click','._bizFilterPil', function() {
    $(this)
        .parent()
        .parent()
        .find('._bizSelect')
        .attr('data-value', $(this).data('value'))
        .find('._bizSelectText')
        .html($(this).html());
});
$('._datepicker').datepicker({
    numberOfMonths: 1,
    maxDate: '+0D',
    dateFormat: 'dd/mm/yy',
    onSelect: function( selectedDate ) {
        if(!$(this).data().datepicker.first){
            $(this).data().datepicker.inline = true
            $(this).data().datepicker.first = selectedDate;
        } else {
            if(selectedDate > $(this).data().datepicker.first){
                $(this).val($(this).data().datepicker.first+' - '+selectedDate);
            } else {
                $(this).val(selectedDate+' - '+$(this).data().datepicker.first);
            }
            $(this).data().datepicker.inline = false;
        }
    },
    onClose:function(){
        delete $(this).data().datepicker.first;
        $(this).data().datepicker.inline = false;
    }
});

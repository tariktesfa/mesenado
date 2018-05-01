$('select').on('change', function() {
    
    $('select').find('option').prop('disabled', false);
    
    $('select').each(function() {
       $('select').not(this).find('option[value="' + this.value + '"]').prop('disabled', true); 
    });
    
});
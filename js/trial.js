var removeSelection = function(select) {
    $('select').filter(':not(#' + select.attr('id') + ')').each(function() {
        var index = select.find(':selected').index();
        $("'"+'#'+ select.attr('id'))+"'").find('option:eq(' + index + ')').remove();
    });
};

$(function() {
    $('select').change(function() {
        removeSelection($(this));
    });
});
(function($){
$(function() {

    $('#page_template').change(function() {
        $('#page_metabox').toggle($(this).val() == 'default');
    }).change();

});


$(function() {

    $('#page_template').change(function() {
        $('#team_metabox').toggle($(this).val() == 'page-our-people.php');
    }).change();

});

})(jQuery);
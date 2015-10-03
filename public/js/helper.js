function activateTitleInputs() {
    $('#title0').focus();

    $('#add').click(function(){
        var n = $('#titles .form-group').size();
        var $template = $('#template').clone();
        $template.find('label').attr('for', 'title'+n);
        $template.find('input').first().attr('name', 'title['+n+'][title]')
            .attr('id', 'title'+n);
        $template.find('input').last().attr('name', 'title['+n+'][lang]')
            .attr('id', 'lang'+n).removeAttr('readonly');
        $template.removeAttr('aria-hidden').removeAttr('style');

        $('#titles').append($template);

        $('#title'+n+'').focus();
        $('#remove').prop('disabled', false);
    });

    $('#remove').click(function(){
        if ($('#titles .form-group').size() > 0) {
            $('#titles .form-group').last().remove();
            if ($('#titles .form-group').size() < 2) {
                $('#remove').prop('disabled', true);
            }
        }
    });
};

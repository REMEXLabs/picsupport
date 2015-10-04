function activateTitleInputs() {
    $('#title0').focus();

    $('#add').click(function(){
        var n = $('#titles .form-group').size();
        var $template = createEmptyTemplate(n);

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

function createEmptyTemplate(n) {
    var $template = $('#template').clone().removeAttr('id');
    $template.find('label').attr('for', 'title'+n);
    $template.find('input').first().attr('name', 'title['+n+'][title]')
        .attr('id', 'title'+n);
    $template.find('input').last().attr('name', 'title['+n+'][lang]')
        .attr('id', 'lang'+n);
    $template.removeAttr('aria-hidden').removeAttr('style');

    return $template;
}

function createFilledTemplate(n, title, lang, readonly) {
    var $template = createEmptyTemplate(n);
    $template.find('input').first().val(title);
    $template.find('input').last().val(lang);
    if (readonly) {
        $template.find('input').last().attr('readonly', '');
    }
    return $template;
}

function titlesFromPikto(pikto) {
    var titles = [];

    $.each(pikto.props, function(idx, prop){

        if (prop.name === 'http://purl.org/dc/elements/1.1/title') {

            $.each(prop.descs, function(idx, desc){
                var title = {
                    title: prop.value,
                    lang: desc.value
                };
                if (desc === 'en') {
                    titles.unshift(title);
                } else {
                    titles.push(title);
                }
            });

        }

    });

    return titles;
}

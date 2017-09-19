jQuery(document).ready(function($) {

    var frame;

    $('#profile-avatar-button').on('click', function(e) {
        e.preventDefault();

        if(frame) {
            frame.open();
            return;
        }

        frame = wp.media({
          title: 'Upload your avatar',
          button: {
            text: 'Use this avatar'
          },
          multiple: false
        })

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            $('#profile-avatar-input').val(attachment.url);
            $('#profile-avatar-preview').attr('src', attachment.url);
        })
        /* end of frame select */

        frame.open();
    });
    /* end of button click */

    $('#profile-avatar-remove-button').on('click', function(e) {
        e.preventDefault();

        var answer = confirm("Are you sure?")
        if(answer) {
            $('#profile-avatar-input').val('');
            $('#submit').trigger('click');
        }
    })

});

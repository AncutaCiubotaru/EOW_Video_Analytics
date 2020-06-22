
import { v4 as uuidv4 } from 'uuid';

var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe);

player.on('play', function(event_data) {

    let video_id = window.location.pathname;
    let user_id = uuidv4();
    var data =
        {
            video_id : video_id,
            user_id : user_id,
            event_name : 'play',
            duration: event_data.duration,
            percent: event_data.percent,
            seconds: event_data.seconds
        };
    $.ajax({
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: '/playevent',
        data: data,
        success: function() {
            console.log("/playevent success");
        },
        error: function(e){
            console.log(e);
        }
    })

});
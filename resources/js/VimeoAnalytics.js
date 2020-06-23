
import { v4 as uuidv4 } from 'uuid';

var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe);

let video_id = window.location.pathname;
let user_id = get_user_id();

function get_user_id() {

    if(!localStorage.getItem("user_id"))
        localStorage.setItem("user_id", uuidv4());

    return localStorage.getItem("user_id");

}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: "POST",
});


player.on('play', function(event_data) {
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
        url: '/play_event',
        data: data,
        success: function() {
            console.log("/play_event success");
        },
        error: function(e){
            console.log(e);
        }
    })

});
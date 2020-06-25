
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

    try {
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
                console.log(data);
            },
            error: function(e){
                log_error(e);
            }
        });

    } catch (e) {
        log_error(e);
    }
});

player.on('pause', function(event_data) {
    try {
        let time_diff_seconds = (Date.now() - get_start_time_recorded())/1000;
        let end_interval_tmp = parseFloat(get_start_time()) + time_diff_seconds;
        let end_interval = end_interval_tmp.toString().substring(0, end_interval_tmp.toString().indexOf(".") + 4)
        set_end_time(end_interval);

        console.log(get_start_time());
        console.log(get_end_time());

        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'pause',
                duration: event_data.duration,
                percent: event_data.percent,
                seconds: event_data.seconds,
            };
        $.ajax({
            url: '/ended_event',
            data: data,
            success: function() {
                console.log("/pause_event success");
                console.log(data);
            },
            error: function(e){
                log_error(e);
            }
        });

    } catch (e) {
        log_error(e);
    }
});


player.on('bufferend', function() {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'bufferend',
            };
        $.ajax({
            url: '/bufferend_event',
            data: data,
            success: function() {
                console.log("/bufferend_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

player.on('bufferstart', function() {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'bufferstart',
            };
        $.ajax({
            url: '/bufferstart_event',
            data: data,
            success: function() {
                console.log("/bufferstart_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

player.on('ended', function(event_data) {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'ended',
                duration: event_data.duration,
                percent: event_data.percent,
                seconds: event_data.seconds,
            };
        $.ajax({
            url: '/ended_event',
            data: data,
            success: function() {
                console.log("/ended_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

function log_error(error)
{
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'error',
                error_message: error,
            };
        $.ajax({
            url: '/function_error',
            data: data,
            success: function() {
                console.log("/function_error success");
            },
            error: function(e){
                console.log("Error in log_error");
                console.log(e);
            }
        });
    } catch (e) {
        console.log("Error in log_error");
        console.log(e);
    }
}

player.on('error', function(event_data) {

    var data =
        {
            video_id : video_id,
            user_id : user_id,
            event_name : 'error',
            message: event_data.message,
            methodd: event_data.method,
            name: event_data.name,
        };
    $.ajax({
        url: '/error_event',
        data: data,
        success: function() {
            console.log("/error_event success");
        },
        error: function(e){
            log_error(e);
        }
    });
});


player.on('progress', function(event_data) {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'progress',
                duration: event_data.duration,
                percent: event_data.percent,
                seconds: event_data.seconds,
            };
        $.ajax({
            url: '/progress_event',
            data: data,
            success: function() {
                console.log("/progress_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

player.on('seeked', function(event_data) {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'seeked',
                duration: event_data.duration,
                percent: event_data.percent,
                seconds: event_data.seconds,
            };
        $.ajax({
            url: '/seeked_event',
            data: data,
            success: function() {
                console.log("/seeked_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

player.on('timeupdate', function(event_data) {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'timeupdate',
                duration: event_data.duration,
                percent: event_data.percent,
                seconds: event_data.seconds,
            };
        $.ajax({
            url: '/timeupdate_event',
            data: data,
            success: function() {
                console.log("/timeupdate_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});

player.on('volumechange', function(event_data) {
    try {
        var data =
            {
                video_id : video_id,
                user_id : user_id,
                event_name : 'volumechange',
                volume: event_data.volume,
            };
        $.ajax({
            url: '/volumechange_event',
            data: data,
            success: function() {
                console.log("/volumechange_event success");
            },
            error: function(e){
                log_error(e);
            }
        });
    } catch (e) {
        log_error(e);
    }
});


import { v4 as uuidv4 } from 'uuid';
// import Vimeo from "@vimeo/player";

class VimeoIntervals{

    constructor(video_player_id) {
        this.video_id = window.location.pathname;
        this.user_id = this.get_user_id();
        this.video_player =  new Vimeo.Player(video_player_id);

        this.video_player.on('play', this.play_event.bind(this));
        this.video_player.on('pause', this.pause_event.bind(this));
        this.video_player.on('error', this.error_event.bind(this));
    }

    get_user_id() {
        if(!localStorage.getItem("user_id"))
            localStorage.setItem("user_id", uuidv4());
        return localStorage.getItem("user_id");
    }
    set_start_time(start_time){
       this.start_time = start_time;
    }

    get_start_time(){
        return this.start_time;
    }

    set_start_time_recorded(start_time){
        this.start_time_recorded = start_time;
    }

    get_start_time_recorded(){
        return this.start_time_recorded;
    }

    set_end_time(end_time){
       this.end_time = end_time;
    }

    get_end_time(){
        return this.end_time;
    }

    play_event(event_data)
    {
        try {
            this.set_start_time(event_data.seconds);
            this.set_start_time_recorded(Date.now());
        } catch (e) {
            this.log_error(e);
            console.log(e)
        }
    }

    pause_event(event_data)
    {
        try {
            let time_diff_seconds = (Date.now() - this.get_start_time_recorded())/1000;
            let end_interval_tmp = parseFloat(this.get_start_time()) + time_diff_seconds;
            let end_interval = end_interval_tmp.toString().substring(0, end_interval_tmp.toString().indexOf(".") + 4)
            this.set_end_time(end_interval);

            console.log(this.get_start_time());
            console.log(this.get_end_time());

            let data =
                {
                    video_id : this.video_id,
                    user_id : this.user_id,
                    start_interval: this.get_start_time(),
                    end_interval: this.get_end_time(),
                    video_duration: event_data.duration
                };

            this.post_data('/record_intervals',data)
                .then(data => console.log(data))
                .catch(err => console.log(err));

        } catch (e) {
            console.log(e);
            this.log_error(e);
        }
    }

    async post_data(url, data)
    {
        let response = await fetch(url,{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        });

        let res = await 'Data created';
        return res;
    }
    error_event(event_data)
    {
        try {
            let data =
                {
                    video_id : this.video_id,
                    user_id : this.user_id,
                    event_name : 'error',
                    message: event_data.message,
                    methodd: event_data.method,
                    name: event_data.name,
                };

            this.post_data('/error_event',data)
                .then(data => console.log(data))
                .catch(err => console.log(err));

        } catch (e) {
            console.log(e);
        }
    }
    log_error(error)
    {
        try {
            let data =
                {
                    video_id : this.video_id,
                    user_id : this.user_id,
                    event_name : 'error',
                    error_message: error,
                };

            this.post_data('/function_error',data)
                .then(data => console.log(data))
                .catch(err => console.log(err));


        } catch (e) {
            console.log("Error in log_error");
            console.log(e);
        }
    }
}

let video_player_id = document.querySelector('#v_player');
let video_intervals = new VimeoIntervals(video_player_id);



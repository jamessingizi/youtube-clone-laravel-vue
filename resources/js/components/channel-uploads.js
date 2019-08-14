import Axios from "axios";

Vue.component('channel-uploads',{

    props:{
        channel: {
            type: Object,
            required: true,
            default: () => ({})
        }
    },

    data: () => ({
        selected: false
    }),

    methods: {
        upload(){
            this.selected=true;
            this.videos = Array.from(this.$refs.videos.files);

            this.uploaders = this.videos.map(video =>{
                const form = new FormData()

                form.append('video',video)

                form.append('title',video.name)

                return axios.post(`/channels/${this.channel.id}/videos`,form)
            })
        }
    }

})

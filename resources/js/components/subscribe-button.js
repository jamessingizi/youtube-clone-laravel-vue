import numeral from 'numeral';
import Axios from 'axios';
Vue.component('subscribe-button',{

    props:{
        channel: {
            type: Object,
            required: true,
            default: () => ({})
        },
        initialSubscriptions:{
            type: Array,
            required: true,
            default: () => []
        }
    },

    data: function(){

        return {
            subscriptions: this.initialSubscriptions
        }

    },

    computed: {

        subscribed() {

            if(!__auth()){
                return false;
            }
            return this.subscription;
        },

        owner() {
            if(!__auth()){
                return false;
            }
            return __auth().id===this.channel.user_id
        },

        count() {
            return numeral(this.subscriptions.length).format('0a');
        },

        subscription(){
            if(!__auth()){
                return null;
            }
            return this.subscriptions.find(subscription=>subscription.user_id===__auth().id);
        },


    },

    methods:{

        toggleSubscription(e){
            e.preventDefault();
            if(!__auth()){
               return alert('Please login to subscribe');
            }

            if(this.owner){
                return alert('You cannot subscribe to your channel');
            }

            if(this.subscribed){

                //subscribe and update subscriptions list and button status
                axios.delete(`/channels/${this.channel.id}/subscriptions/${this.subscription.id}`)
                        .then(()=>{
                            this.subscriptions = this.subscriptions.filter(s => s.id !== this.subscription.id)
                        })

            }else{
                //unsubscribe and update the button status
                axios.post(`/channels/${this.channel.id}/subscriptions`)
                        .then(response => {
                            this.subscriptions = [
                                ...this.subscriptions,
                                response.data
                            ]
                        });
            }
        }

    }
})

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        User lists will be here
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat list</div>

                    <div class="panel-body">
                        <ul class="list-messages list-group"></ul>
                    </div>

                    <div class="panel-footer">
                        <div class="form-group">
                            <input class="form-control" v-model="message" v-on:keyup.enter="postMessage" placeholder="Type message and press enter to send message" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {message: null};
        },
        sockets: {
            message: function (val) {
                var data = JSON.parse(val);
                var html = '<li class="list-group-item"><strong>'+data.user+'</strong> '+data.message+'</li>';
                $('.list-messages').append(html);
            }
        },
        methods: {
            postMessage: function() {
                if( this.message ){
                    axios.post('./post-message', {message: this.message}).then(response => {this.chats = response.data}).catch(function (error) {
                        console.log(error.response);
                    });
                    this.message = '';
                }
            }
        }
    }
</script>

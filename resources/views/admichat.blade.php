@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
            <div class="chat-content">
                <ul>
                </ul>
            </div>
            <div class="chat-form">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="text-name" placeholder="Enter name"/>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="text-chat" placeholder="Enter chat"/>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary" value="Enviar" id="submit-chat"/>
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
</div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script type="text/javascript">
    var socket = io.connect('http://localhost:8888');
    jQuery(document).ready(function($){
        $('#submit-chat').click(function(){
            if($('#text-chat').val() != ""){
                var data = {name: $('#text-name').val(), message: $('#text-chat').val(), chanel}
                socket.emit('sendChatToServer', data );
            }else{
                alert('Please enter text to chat');
            }
            return false;
        });
        socket.on('serverChatToClient', function(message){
            $('.chat-content ul').append('<li><strong>'+message.name+':</strong> '+message.message+'</li>');
        });
    });
</script>
@endsection

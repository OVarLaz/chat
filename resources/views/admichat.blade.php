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
                            <input type="text" class="form-control" id="admin-name" placeholder="Admin"/>
                        </div>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="text-name" placeholder="Enter channel"/>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script type="text/javascript">
    var socket = io.connect('http://localhost:8888');
    var channel =  $('#text-name').val();
    jQuery(document).ready(function($){
        $('#submit-chat').click(function(){
            if($('#text-chat').val() != ""){
                
                var data = {channel: $('#text-name').val(), message: $('#text-chat').val(), name: $('#admin-name').val()}
                socket.emit('sendChatToClient', data );
                $clean=$('#text-chat').val('')

            }else{
                alert('Please enter text to chat');
            }
            return false;
        });
        
        socket.on('adminChat', function(message){
            console.log('adminChat');
            
            $('.chat-content ul').append('<li><strong>'+message.name+':</strong> '+message.message+'</li>');
        });
    });
</script>
@endsection

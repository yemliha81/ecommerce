<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<body>

<h2>Messages</h2>
    
<div class="messages"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('be75c9caa070aab0ee45', {
      cluster: 'eu'
    });





    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
       
        //let message = JSON.stringify(data);
        $('.messages').append('<div>'+data.message+'</div>');
      //alert();
    });
  </script>
</body>
</html>
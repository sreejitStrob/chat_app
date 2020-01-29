<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7455a3c52b935d083656', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     // alert(JSON.stringify(data));
      chat_display(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <div>
    <ul id="chat_history">

    </ul>



  <div>
<form id="chat_form">
Name: <input type="text" name="name"><br>


</form>
<button action="chat.php" id="send">Send </button>
<script>
 $("#send").click(function(){
  //alert("The paragraph was clicked.");
  var form = document.getElementById('chat_form');
  var formData = new FormData(form);
  var xhr = new XMLHttpRequest();
  // Add any event handlers here...
  xhr.open('POST', "chat.php", true);
  xhr.send(formData);
});
function chat_display(context){
  $('#chat_history').append(`<li>${context}</li>`);
  var notify = new Notification('Hi there!');

}


  </script>
</body>
</html>
console.log(config);

      $("#btn-chat").click(function() {
        sendMessage();
      });

      $('#btn-input').on('keypress',function(e) {
          if(e.which == 13) {
            sendMessage();
          }
      });

      function sendMessage() {
        let message = $('#btn-input').val();
        if(message != '') {
          $.post( "chat.php", { message: message, name: config.name, color: config.color}).done(function() {
          console.log(message);
          $('#btn-input').val("");
        });
        }
      }

      function chat_display(context) {

        let data = JSON.parse(context);
        console.log(data);

        $('#chat').append(`
          <li class="left clearfix">
              <span class="chat-img pull-left">
                <img src="http://placehold.it/50/${data.color}/fff&text=${(data.name).charAt(0)}" alt="User Avatar" class="img-circle" />
              </span>
              <div class="chat-body clearfix">
                  <div class="header">
                    <strong class="primary-font">${data.name}</strong> 
                  </div>
                  <p>${data.message}</p>
              </div>
            </li>
        `);
      }

      function notifyMe(context) {

        let data = JSON.parse(context);

        if(data.name != config.name) {
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          else if (Notification.permission === "granted") {
            var notification = new Notification(data.message);
          }

          else if (Notification.permission !== "denied") {
            Notification.requestPermission().then(function (permission) {
              if (permission === "granted") {
                var notification = new Notification(data.message);
              }
            });
          }
        }
      }
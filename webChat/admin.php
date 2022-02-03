<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="./admin.css">
</head>
<body>
    <div class="parent">
        <div class="usersContainer">
            <p style="cursor: pointer;" onclick="logout()">logout</p>
            <p>Users</p>
            <div id="usersChatsContainer">
                <div class="userChats">
                    <img src="./images/icons/chat.png" >
                    <div class="date">
                        27th March 2020
                    </div>
                    <div class="newChat">
                        3
                    </div>
                </div>
                
            </div>

        </div>
        <div id="chatContainer">
            <div id="messagesHolder">
                <div class='msgLeft'>row->message</div>
                <div class='msgRight'>row->message</div>
            </div>
            <hr style="width: 100%;">
            <div class="controller">
                <input type="file" name="file" id="inputFile"  style="display: none;">
                <label for="inputFile"><img src="./images/icons/file.png" class="imageFile"></label>
                <input type="text" name="input" id="inputText"  placeholder="Enter message">
                <input type="submit" value="Send" id="submitBtn">
            </div>

        </div>
    </div>
</body>
</html>
<script >
    var chatCont=document.getElementById('usersChatsContainer')
    var chatHld=document.getElementById('messagesHolder')
    var submit=document.getElementById('submitBtn')
    var input=document.getElementById('inputText')
    var CURRENT_CHAT_USER="" 
    
    var data={}

    //to send data to server
    const sendData=(data,type)=>{

                
        var xml = new XMLHttpRequest()

        xml.onload = function(){

            if(xml.readyState == 4 || xml.status == 200){
                
                handleResult(xml.responseText)
            
            }
        }

        data.type=type
        var dataString = JSON.stringify(data)
        xml.open("POST","passer.php",true)
        xml.send(dataString)
    }

     //handle results fro the server
     const handleResult = (results) => {
        alert(results)
        var info=JSON.parse(results);

        switch (info.type) {
        case 'logout':
            window.location='admlogin.php'
            break;
        case 'messages':
            chatCont.innerHTML=info.message
            break;
        case 'startadminchat':
            chatHld.innerHTML=info.message
            break;
        case 'adminreplytext':
            chatHld.innerHTML=info.message
            break;
            

        default:
            break;
    }

   
    }

    //fired when browser first loads
    sendData({},"adminlaunch")

    //to logout
    const logout=()=>{
        var log = confirm('Admin,are you sure you want to logout?')
        if (log) {
            sendData(data, "logout");

        }
    }
    //to start chat with users by admin
    const startChat=(e) => {
        
        CURRENT_CHAT_USER = e.target.id;
        if (CURRENT_CHAT_USER == "") {
            CURRENT_CHAT_USER = e.target.parentNode.id;
        }
        sendData({
            chatid: CURRENT_CHAT_USER
        }, "startadminChat");
        
    }
    submit.onclick=()=>{
        var msg=input.value
        var trimMess=msg.trim()
        if (trimMess=="") {
           return
        }
        else{
           
            sendData({
                message:trimMess,
                user:CURRENT_CHAT_USER
            },'adminSendText')
        }
    }
</script>
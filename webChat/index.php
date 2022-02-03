<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webChat</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="parent">
        <div class="signin" >
            <p class="signBtn">
                Sign In
            </p>
        </div>
        <div class="signout">
            <p class="logoutBtn" onclick="logout()">
               logout
            </p>
        </div>
        <div class="signModal">
            <div class="signModalContainer">
                <img src="./images/icons/close.png" class="signClose" onclick="signcloseFunc()">
                <img src="./images/icons/user.png" class="avater">
                <form action="" id="form">
                    <p style="text-align: center;color: gray;font-size: 20px;margin-bottom: 5px;">SignUp</p>
                    <input type="email" name="email" id="emailInput" placeholder="Email">
                    <input type="text" name="username" id="textInput" placeholder="Username">
                    <input type="text" name="password" id="passwordInput" placeholder="Password">
                    <input type="text" name="password2" id="passwordRetype" placeholder="Retype Password">
                    <input type="submit" value="SignUp" id="SignUpSbmt">
                </form>
                <p href="" id='SignInToggle' style="margin-bottom: 30px;cursor: pointer;">Signin</p>
            </div>
            <div class="signInModalContainer">
                <img src="./images/icons/close.png" class="signClose" onclick="signcloseFunc()">
                <img src="./images/icons/user.png" class="avater">
                <form action="" id="form2">
                  
                    <p style="text-align: center;color: gray;font-size: 20px;margin-bottom: 5px;">SignIn</p>
                    <input type="email" name="email" id="emailInput" placeholder="Email">
                    <input type="text" name="password" id="passwordInput" placeholder="Password">
                    <input type="submit" value="SignIn" id="SignInSbmt">
                </form>
                <p href="" id="SignUpToggle" style="margin-bottom: 60px;cursor: pointer;">SignUp</p>
            </div>
           
        </div>
        <div class="chatModal">
            <div class="modalParent">
                <div class="iconParent">
                <img src="./images/icons/close.png" class="closeIcon">
                </div>
                <div class="chatParent">
                    <div class="messagesContainer">
                      
                       
                    </div>
                    <div class="controller">
                        <input type="file" name="file" id="inputFile" >
                        <label for="inputFile"><img src="./images/icons/file.png" class="imageFile"></label>
                        <input type="text" name="input" id="inputText"  placeholder="Enter message">
                        <input type="submit" value="Send" id="submitBtn">
                    </div>
                </div>
            </div>
        </div>
        <div class="chatPopper" >
            <img src="./images/icons/chat.png" class="chatPopperImg">
            <p>Chat Us</p>
        </div>
    </div>
</body>
</html>
<script  >
    var chatPopper=document.getElementsByClassName('chatPopper')[0]
    var signin=document.getElementsByClassName('signin')[0]
    var sign=document.getElementsByClassName('signout')[0]
    var chatModal=document.getElementsByClassName('chatModal')[0]
    var closeIcon=document.getElementsByClassName('closeIcon')[0]
    var input=document.getElementById('inputText')
    var submit=document.getElementById('submitBtn')
    var SignInToggle=document.getElementById('SignInToggle')
    var SignUpToggle=document.getElementById('SignUpToggle')
    var signUp=document.getElementsByClassName('signModalContainer')[0]
    var signIn=document.getElementsByClassName('signInModalContainer')[0]
    var signUpUser=document.getElementById('SignUpSbmt')
    var signInUser=document.getElementById('SignInSbmt')
    var form=document.getElementById('form')
    var inputs=form.getElementsByTagName('input')
    var form2=document.getElementById('form2')
    var inputs2=form2.getElementsByTagName('input')
    var signclose=document.getElementsByClassName('signClose')[0]
    var signmodal=document.getElementsByClassName('signModal')[0]
    var sendBtn=document.getElementById('submitBtn')
    var messInput=document.getElementById('inputText')
    var signup=document.getElementsByClassName('signBtn')[0]
    var messagescontainer=document.getElementsByClassName('messagesContainer')[0]

    var inputValue=""
    

    var data={}

    //to toggle between signup/signin content on modal
    SignInToggle.onclick=()=>{
        signUp.style.display='none'
        signIn.style.display='flex'
    }

    //to toggle between signup/signin content on modal
    SignUpToggle.onclick=()=>{
        signUp.style.display='flex'
        signIn.style.display='none'
    }

    //the chat icon when clicked toggles between opening and closing the modal
    chatPopper.onclick=()=>{
        chatModal.style.display='flex'
        chatPopper.style.display='none'
        sendData(data,'prevMessages')
        messagescontainer.scrollTo(0, messagescontainer.scrollHeight)

    }

    //the close icon when clicked toggles between opening and closing the modal
    closeIcon.onclick=()=>{
        chatModal.style.display='none'
        chatPopper.style.display='block'
    }

    //func called when submit cicked to collect data in the text input
    submit.onclick=()=>{
        inputValue=input.value
        sendData(inputValue)
    }


    //to collect user signup data 
    signUpUser.onclick=()=>{
        for (let index = 0; index < inputs.length; index++) {
            var key=inputs[index].name

            switch (key) {
                case 'email':
                    data.email=inputs[index].value
                    break;
                case 'username':
                    data.username=inputs[index].value
                    break;
                case 'password':
                    data.password=inputs[index].value
                    break;
                case 'password2':
                    data.password2=inputs[index].value
                    break;
            
                default:
                    break;
            }
            
        }
        sendData(data,'signup')
        
    }

    //to collect user signin data 
    signInUser.onclick=()=>{
        
        for (let index = 0; index < inputs2.length; index++) {
            var key=inputs2[index].name

            switch (key) {
                case 'email':
                   
                    
                    data.email=inputs2[index].value
                    break;
                
                case 'password':
                   
                    data.password=inputs2[index].value
                    break;
              
                default:
                    break;
            }
            
        }
        sendData(data,'login')
        alert(JSON.stringify(data))
    }


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
        xml.open("POST","routes.php",true)
        xml.send(dataString)
    }

    //handle results fro the server
    const handleResult=(results)=>{
        alert(results)
        var info=JSON.parse(results);

        switch (info.type) {
            case 'login':
            window.location='index.php'
            localStorage.setItem('logged','login');
            
                break;
            case 'logout':
            window.location='index.php'
            localStorage.setItem('logged','logout');
                break;
            case 'text':
                messagescontainer.innerHTML=info.message
                messagescontainer.scrollTo(0, messagescontainer.scrollHeight)
                break;
            case 'collect':
            
                break;
        
            default:
                break;
        }
    }

    let localData=   localStorage.getItem('logged');
    
     if (localData=='logout') {
        signin.style.display='flex'
        sign.style.display='none'
        chatPopper.style.display='none'
    }else if (localData=='login') {
        signin.style.display='none'
        sign.style.display='block'
        chatPopper.style.display='block'
    }
    alert(localData)

    //to close user modal
    const signcloseFunc=()=>{
        signmodal.style.display='none'
    }

    //to open user modal
    signup.onclick=()=>{
        signmodal.style.display='block'
    
    }

    //to send message
    sendBtn.onclick=()=>{
       
        var msg=messInput.value
        var trimMess=msg.trim()
        if (trimMess=="") {
           return
        }
        else{
           
            data.message=msg
            sendData(data,'sendText')
        }
    }

    //to logout
    const logout=()=>{
        sendData(data,'logout')
    }
</script>
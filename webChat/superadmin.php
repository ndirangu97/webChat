<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>
    <link rel="stylesheet" href="./super.css">

</head>
<body>
    <div class="formHolder">
        <form action="" id="form">
            <p style="text-align: center;color: gray;font-size: 20px;margin-bottom: 5px;">SignUp</p>
            <input type="email" name="email" id="emailInput" placeholder="Email">
            <input type="text" name="username" id="textInput" placeholder="Username">
            <input type="text" name="password" id="passwordInput" placeholder="Password">
            <input type="text" name="password2" id="passwordRetype" placeholder="Retype Password">
            <input type="submit" value="SignUp" id="SignUpSbmt">
        </form>
    </div>
</body>
</html>
<script>

    var signUpUser = document.getElementById('SignUpSbmt')
    var form = document.getElementById('form')
    var inputs = form.getElementsByTagName('input')

    var data={}

     //to collect user signup data 
     signUpUser.onclick=()=>{
    
        for (let index = 0; index < inputs.length-1; index++) {
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
        sendData(data,'superadmin')
        
        
    }
    //to send data to server
    const sendData = (data, type) => {


    var xml = new XMLHttpRequest()

    xml.onload = function() {

        if (xml.readyState == 4 || xml.status == 200) {

            handleResult(xml.responseText)

        }
    }

    data.type = type
    var dataString = JSON.stringify(data)
    xml.open("POST", "routes.php", true)
    xml.send(dataString)
    }

    //handle results fro the server
    const handleResult = (results) => {
       alert(results)
        var info=JSON.parse(results);

        if (info.type=='error') {
            alert(info.message) 
        }else{
            alert('admin registered successfully')
        }


    }
</script>
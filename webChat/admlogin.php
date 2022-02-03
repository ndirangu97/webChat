<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./adminlg.css">
</head>

<body>
    <div class="parent">
        <div class="formHolder">
            <form action="" id="form">

                <p style="text-align: center;color: gray;font-size: 20px;margin-bottom: 60px;margin-top: 60px;">Admin SignIn</p>
                <input type="email" name="email" id="emailInput" placeholder="Email">
                <input type="text" name="password" id="passwordInput" placeholder="Password">
                <input type="submit" value="SignIn" id="SignInSbmt">
            </form>
        </div>

    </div>
</body>

</html>
<script>
    

    var signInUser = document.getElementById('SignInSbmt')
    var form = document.getElementById('form')
    var inputs = form.getElementsByTagName('input')

    var data={}

    //to collect user signin data 
    signInUser.onclick = () => {


        for (let index = 0; index < inputs.length - 1; index++) {

            var key = inputs[index].name

            switch (key) {
                case 'email':
                    data.email = inputs[index].value
                    break;

                case 'password':
                    data.password = inputs[index].value
                    break;

                default:
                    break;
            }

        }
     
        sendData(data, 'adminlogin')
        alert(JSON.stringify(data))
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
        xml.open("POST", "passer.php", true)
        xml.send(dataString)
    }
    //handle results fro the server
    const handleResult = (results) => {
        alert(results)
        var info=JSON.parse(results);

    switch (info.type) {
        case 'login':
            window.location='admin.php'
            break;

        default:
            break;
    }

    }
</script>
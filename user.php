<?php 
$MARKBOOK_GET_API = "https://script.google.com/macros/s/AKfycbylQm3yW95G8C6vmZKwQ88Id_LIPzeSr6heWCEjwlEuESgD9Emy/exec";
$LESSON_URL = "lesson-dev.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <base target="_top">
  </head>
  <body>
  <h1>We haven't seen you here before. Please enter your username</h1>
  <p>
   Please enter the username assigned by your teacher<input type="text" id="userNameInput"/>
   <p id="errorMessage" style="color:red;"></p>
   <br>
   <button onclick="storeUserName()">OK</button>
    </p>
    
    <script>

    function callback(result) {
        if (result) { //if user not found result == null
            setCookie(document.getElementById("userNameInput").value);
            window.location = "<?php echo $LESSON_URL . '?' . $_SERVER['QUERY_STRING'] ?>";
        }
        else {
            document.getElementById("errorMessage").innerHTML += "user not found<br>";
        }
    }

    function setCookie(value) {
        var d = new Date(1e13);
        var expires = "expires="+ d.toUTCString();
        document.cookie = "user=" + value + ";" + expires + ";path=/";
    }

    function storeUserName() {
        var user = document.getElementById("userNameInput").value;
        if (user) {
            var s = document.createElement("script");
            s.src = "<?php echo $MARKBOOK_GET_API ?>?action=getMarkbookSettings&workbookSheetString=<?php echo $_SERVER['QUERY_STRING']?>&user=" + encodeURIComponent(user) + "&prefix=callback";
            document.body.appendChild(s);
        }
      }

    </script>
  </body>
</html>



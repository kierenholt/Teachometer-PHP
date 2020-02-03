<?php 
$MARKBOOK_GET_API = "https://script.google.com/macros/s/AKfycbylQm3yW95G8C6vmZKwQ88Id_LIPzeSr6heWCEjwlEuESgD9Emy/exec";
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

            //set cookie
            var img = document.createElement('img'); 
            img.src = "https://teachometer.co.uk/set-cookie.php?" + document.getElementById("userNameInput").value; 
            img.style.display = "none";
            document.body.appendChild(img); 

            setTimeout(function() {location.reload(true);}, 1000); //small delay to allow cookie to be set
        }
        else {
            document.getElementById("errorMessage").innerHTML += "user not found<br>";
        }
    }

    function storeUserName() {
        var user = document.getElementById("userNameInput").value;
        if (user) {
            var s = document.createElement("script");
            //get markbook settings then call callback()
            s.src = "<?php echo $MARKBOOK_GET_API ?>?action=getMarkbookSettings&workbookSheetString=<?php echo $_SERVER['QUERY_STRING']?>&user=" + encodeURIComponent(user) + "&prefix=callback";
            document.body.appendChild(s);
        }
      }

    </script>
  </body>
</html>



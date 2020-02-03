<?php 
$MARKBOOK_GET_API = "https://script.google.com/macros/s/AKfycbylQm3yW95G8C6vmZKwQ88Id_LIPzeSr6heWCEjwlEuESgD9Emy/exec";
$PUBLIC_COURSE_PAGE = "https://teachometer.co.uk/course.php";

if (!isset($_COOKIE['user'])) {
  include('user-dev.php');
  exit();
}

$USER = $_COOKIE['user'];
?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8"> 
  <LINK href="include/lessonstyle.css" title="main" rel="stylesheet" type="text/css">

  <style>
div#topbit {
    width: 100%;
    background-image: url(stripeBG.gif);
    height: 50px;
}
div#topbit p {
    clear: none;
}


p#teachometer {
    display: block;
    float: right;
    color: #373748;
    font-size: 30px;
    margin: 9px 10px 0 0;
  text-shadow: 2px 2px 5px #fff;
}

img#logo {
    float: right;
    height: 50px;
}
</style>
</head>
<body>

<div id="topbit"> 
<div class="widthLimit">
    <a href="index.php"><img src="icon128.png" id="logo"/></a>
    <p id="teachometer">Teachometer<br>
</div>
</div>
	
  <p><h1 id="titleH1"></h1></p>
  <p id="visibleError" hidden>This page has been temporarily removed by your teacher</p>
	<div id="questionsDiv"></div>
    

    <script src="include/assignment.js"></script>
    <script src="include/acorn.js"></script>
  
  <p><a href="<?php echo ($PUBLIC_COURSE_PAGE . '?' . $_SERVER['QUERY_STRING'])?>" target="_blank">Go to Course page</a></p>

<script>

function writeToSheet(scores) {
  
  var data = {
        "action" : "writeToSheet",
        "workbookSheetString" : "<?php echo $_SERVER['QUERY_STRING']?>",
        "user" : "<?php echo $USER ?>",
        "scores" : JSON.stringify(scores)
      };
  var queryString = "?";
  for (var key in data) {
    queryString += key + "=" + encodeURIComponent(data[key]) + "&";
  }

  console.log(queryString); //REMOVE FROM LIVE VERSION
  
  fetch("<?php echo $MARKBOOK_GET_API ?>" + queryString, {
    mode: 'no-cors', // no-cors, *cors, same-origin
    method: 'GET', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then((myJson) => {
    console.log(myJson);  //REMOVE FROM LIVE VERSION
  });

}

function init(markbookSettings) { //this is how it likes to be used. it doesnt like strings for data or arrays for scores

  //bad username
  if (markbookSettings == null) {
    //delete user cookie

    var img = document.createElement('img'); 
    img.src = "https://teachometer.co.uk/set-cookie.php"; 
    img.style.display = "none";
    document.body.appendChild(img); 

    location.reload(true);
  }

  //internal settings
  var settings = {
      "questionsDiv": document.getElementById("questionsDiv"),
      //no solutions div
      "allowRowDelete" : false,
      "allowRefresh" : false,
      "submitButtonText" : "check answers",
      "showRowTitles" : true,
      "allowGridlines" : false,
      "user" : "<?php echo $USER ?>"
  };

  //FIRST THING AFTER GETTING THE DATA BACK - hide if visible is set to false
  if (markbookSettings["visible"] == false) {
    document.getElementById("visibleError").hidden = false;
    return;
  }

  document.getElementById("titleH1").innerHTML = markbookSettings["title"];
  window.document.title = markbookSettings["title"];

  //transfer markbookSettings to settings
  for (var key in markbookSettings) {
    if (markbookSettings.hasOwnProperty(key)) {
      settings[key] = markbookSettings[key];
    }
  }

  /*** CALL CONSTRUCTOR ***/
  window.assignment = new AssignmentHTML(settings);
  
  //markbookupdate
    var markbookUpdateInjector = function(paramaggregateScoreGetter) {
      var aggregateScoreGetter = paramaggregateScoreGetter;
  
      return function(scores) {
        var aggScores = aggregateScoreGetter();
        for (var key in aggScores) {
            scores[key] = aggScores[key];
        }
        writeToSheet(scores);
        console.log(JSON.stringify(scores)); //REMOVE FROM LIVE VERSION 
    
      };
  };
    settings.markbookUpdate = markbookUpdateInjector(assignment.aggregateScoreGetter);
            
}
    
</script>
<script src="<?php echo $MARKBOOK_GET_API ?>?action=getMarkbookSettings&workbookSheetString=<?php echo $_SERVER['QUERY_STRING']?>&user=<?php echo urlencode($USER) ?>&prefix=init"></script>


</body>
</html>


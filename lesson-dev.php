<?php 
$MARKBOOK_GET_API = "https://script.google.com/macros/s/AKfycbylQm3yW95G8C6vmZKwQ88Id_LIPzeSr6heWCEjwlEuESgD9Emy/exec";
$USER = "teachometer";
?>

<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8"> 
  <LINK href="include/lessonstyle.css" title="main" rel="stylesheet" type="text/css">

</head>
<body>
	
	<div id="questionsDiv"></div>
    

    <script src="include/assignment.js"></script>
    <script src="include/acorn.js"></script>
  


<script>

function writeToSheet(workbookSheetString, user, scores) {
  
  var data = {
        "action" : "writeToSheet",
        "workbookSheetString" : "AFkMWUFZShUtKAJLNQk4HzA8QiwyIUM1CjYINTozNT8DT00UMk4JEAE-P00BCg4-HC5ZV1kIWUFKSEJITkNNTE5JBg==",
        "user" : "adusholt@gmail.com",
        "scores" : JSON.stringify(scores) //this is how it likes to be used. it doesnt like strings for data or arrays for scores
      };

    fetch("<?php echo $MARKBOOK_GET_API ?>", {
      mode: 'no-cors', // no-cors, *cors, same-origin
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then((myJson) => {
        console.log(myJson);
      });

}

    function init(markbookSettings) {	
		
        //internal settings
        var settings = {
            "questionsDiv": document.getElementById("questionsDiv"),
            //no solutions div
            "allowRowDelete" : false,
        	  "allowRefresh" : false,
            "submitButtonText" : "check answers",
            "showRowTitles" : true,
            "allowGridlines" : false
        };
        
        
        //transfer markbookSettings to settings
        for (var key in markbookSettings) {
          if (markbookSettings.hasOwnProperty(key)) {
            settings[key] = markbookSettings[key];
          }
        }
		
        /*** CALL CONSTRUCTOR ***/
		    window.assignment = new AssignmentHTML(settings);
        
        //markbookupdate
          var markbookUpdateInjector = function(paramWorkbookSheetString, paramuser, paramaggregateScoreGetter) {
            var workbookSheetString = paramWorkbookSheetString;
            var user = paramuser;
            var aggregateScoreGetter = paramaggregateScoreGetter;
        
            return function(scores) {
              var aggScores = aggregateScoreGetter();
              for (var key in aggScores) {
                  scores[key] = aggScores[key];
              }
              writeToSheet(workbookSheetString, user, scores);
              console.log(JSON.stringify(scores));
          
            };
        };
          settings.markbookUpdate = markbookUpdateInjector(
              settings.workbookSheetString,
              settings.user,
              assignment.aggregateScoreGetter);
                
    }
    
</script>        
<script src="<?php echo $MARKBOOK_GET_API ?>?action=getMarkbookSettings&workbookSheetString=AFkMWUFZShUtKAJLNQk4HzA8QiwyIUM1CjYINTozNT8DT00UMk4JEAE-P00BCg4-HC5ZV1kIWUFKSEJITkNNTE5JBg%3D%3D&user=<?php echo $USER ?>&prefix=init"></script>


</body>
</html>


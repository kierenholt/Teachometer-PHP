<?php 
$MARKBOOK_GET_API = "https://script.google.com/macros/s/AKfycbylQm3yW95G8C6vmZKwQ88Id_LIPzeSr6heWCEjwlEuESgD9Emy/exec";
?>
<html>
    <body>
        <h1> Lessons </h1>
        <table id="para"></table>

        <script>

            function doStuff(sheets) {
                var table = document.getElementById("para");
                for (var i = 0; i < sheets.length; i++) {
                    var row = table.insertRow(0);
                    row.insertCell(0).innerHTML=`<a href="${sheets[i].url}" >${sheets[i].name}</a>`;
                }
            }

        </script>
        <script src="<?php echo $MARKBOOK_GET_API ?>?action=getSheetUrls&workbookSheetString=AFkMWUFZShUtKAJLNQk4HzA8QiwyIUM1CjYINTozNT8DT00UMk4JEAE-P00BCg4-HC5ZV1kIWUFKSEJITkNNTE5JBg%3D%3D&prefix=doStuff"></script>
        
    </body>
</html>
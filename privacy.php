<html>
<head>
<LINK href="style.css" title="main" rel="stylesheet" type="text/css">
<LINK href="altstyle.css" title="alternate" rel="alternate stylesheet" type="text/css">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#373748">
</head>
<body>


<?php include 'include/header.php'?>

<div id="bottombit">

<div class="widthLimit">

<div class="contentBar">
<h2>Teachometer G Suite Add-on Privacy Policy</h2>

<h3>Which permissions are needed for Teachometer?</h3>

<p>When you use Teachometer for the first time, you’ll be asked to accept the minimum-required permissions:</p>

    <div class=left style="width:55%">
    <table>

    <tr>
        <td><h3>Required permission</h3></td>
        <td>	<h3>Why it is needed</h3></td>
    </tr>

    <tr>
        <td><li>Associate you with your personal info on Google</td>
        <td>Your unique <a href="https://openid.net/what-is-openid/">open id - a 22 digit number</a> is stored in the Teachometer server. Teachometer uses openid to activate 'Teacher mode' on the lesson and course pages. Teachometer also uses openid to communicate with Google's Drive API. 
            Openid does <b>not</b> give Teachometer access to any of your personal details. Teachometer <b>cannot</b> access your email or even your name using openid.</td>
    </tr>


    <tr>
        <td><li>Connect itself to your Google Drive</td>
        <td>This allows you to open Teachometer files from within Google Drive.
            This does not grant Teachometer access to any of your drive files.</td>
    </tr>



    <tr>
        <td><li>See, edit, create and delete only the specific Google Drive files you use with this app.</td>
        <td>This allows you to open, edit and save the schemes of work you make onto your Google Drive. Teachometer does not store your work anywhere on its servers.
            Teachometer also uses this to store the markbook as a Google sheet onto your Google Drive.
            Teachometer can <b>only</b> access the files you have created from within Teachometer. Teachometer <b>cannot</b> read any Docs or any files made in other apps.</td>
    </tr>


    </table>
    </div>

    <div class=right style="width:35%">
    <img src="images/givingConsent.gif" />
    </div>
    </div>

</div>


<div class=widthLimit>

    <div class="contentBar">

<p>
<br><br>
<h2>Why does Teachometer need these permissions?</h2>

<p>Teachometer uses Google Drive to store your schemes of work and markbooks.  
<br>Teachometer only requests the minimum-required permissions that are essential for it to function optimally.
<br>Teachometer has no access to your Google account, nor your personal details, nor your email address and certainly not your password.</p>

<h2>Where can I review or revoke these permissions?</h2>
<p>Click <a href="https://myaccount.google.com/permissions?">here</a> to review the permissions for any Google Addons or apps, including Teachometer. </p>

<h2>OK I'm satisfied now. How do I begin planning lessons?</h2>
<p>Thank you for reading this. Click <a href="http://www.teachometer.co.uk/v2/schemeofwork.php">here</a> to start planning and assigning lessons. Make sure to check both permissions boxes when you log in.</p>


</div>

</div> <!---widthlimit--->
</div>



<?php include 'include/footer.php'?>
<?php include 'include/gopher.php'?>

</body>
</html>

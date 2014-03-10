<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Captcha Validation</title>
</head>
<body>

<div style="text-align: center; color: blueviolet; font-size: x-large; margin-bottom: 10px;">Captcha Validation</div>
<?php
if (isset($_GET['success'])) {
    echo "<div style=\"text-align: center; color: forestgreen; margin-bottom: 10px;\">$_GET[success]</div>";
}
if (isset($_GET['error'])) {
    echo "<div style=\"text-align: center; color: firebrick; margin-bottom: 10px;\">$_GET[error]</div>";
}
?>
<table style="text-align: center;" align="center">
    <form action="validate.php" method="post">
        <tr>
            <td>
                <img src="getCaptcha.php" alt="Are you human?" id="captcha"/>
            </td>
            <td>
                <a href="#" onclick=" document.getElementById('captcha').src='getCaptcha.php'; document.getElementById('code').focus();" id="change-image">Refresh</a>
            </td>

        </tr>
        <tr>
            <td colspan="2"><input type="text" name="code" size="30" id="code"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Check"/></td>
        </tr>

    </form>
</table>
</body>
</html>
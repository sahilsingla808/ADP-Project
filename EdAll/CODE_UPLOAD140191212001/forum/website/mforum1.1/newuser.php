<?
require("global.php");
ShowHeader("New User");
?>
* indicates a required field. <BR>

<FORM NAME="user" METHOD="POST" ACTION="newuser2.php">
Username:*<INPUT TYPE="TEXT" NAME="username"><BR>
Password:*<INPUT TYPE="PASSWORD" NAME="password"><BR>
Password(verify):*<INPUT TYPE="PASSWORD" NAME="password2"><BR>
Email:*<INPUT TYPE="TEXT" NAME="email"><BR>

<INPUT TYPE="SUBMIT" VALUE="Create User!">
</FORM>
<?
ShowFooter();
?>
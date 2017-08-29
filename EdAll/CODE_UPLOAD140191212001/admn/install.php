<?
require("configure.php");
require("db.php");


//initialize the database
$forum=new DB_Sql_uf;
$forum->appname="Forum";
$forum->appshortname="Forum";
$forum->database=$dbname;
$forum->server=$servername;
$forum->user=$dbusername;
$forum->password=$dbpassword;
//ok, done initialising, connect
$forum->connect();


$forum->query("CREATE DATABASE $dbname");
$forum->select_db($dbname);
echo "created database: $dbname\n<BR>";


  // Start generating tables and indicies
  // ###################### Start forum #######################
   $forum->query("CREATE TABLE forum (
   forumid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
   title CHAR(100) NOT NULL,
   description CHAR(250) NOT NULL,
   active SMALLINT NOT NULL,
   displayorder SMALLINT NOT NULL,
   replycount INT UNSIGNED NOT NULL,
   lastpost INT NOT NULL,
   threadcount MEDIUMINT UNSIGNED NOT NULL,
   allowposting SMALLINT NOT NULL,
   PRIMARY KEY(forumid)
  )");

  // ###################### Start post #######################
   $forum->query("CREATE TABLE post (
   postid INT UNSIGNED NOT NULL AUTO_INCREMENT,
   threadid INT UNSIGNED NOT NULL,
   username CHAR(50) NOT NULL,
   email CHAR(50) NOT NULL,
   title CHAR(100) NOT NULL,
   dateline INT NOT NULL,
   pagetext MEDIUMTEXT,
   PRIMARY KEY(postid),
   INDEX idxdisp(threadid,dateline)
  )");



  // ###################### Start thread #######################
   $forum->query("CREATE TABLE thread (
   threadid INT UNSIGNED NOT NULL AUTO_INCREMENT,
   title CHAR(100) NOT NULL,
   lastpost INT UNSIGNED NOT NULL,
   forumid SMALLINT UNSIGNED NOT NULL,
   replycount INT UNSIGNED NOT NULL,
   postusername CHAR(50) NOT NULL,
   lastpostuser CHAR(50) NOT NULL,
   dateline INT UNSIGNED NOT NULL,
   PRIMARY KEY(threadid)
  )");

   $forum->query("CREATE TABLE user (
   userid INT UNSIGNED NOT NULL AUTO_INCREMENT,
   username CHAR(50) NOT NULL,
   password CHAR(16) NOT NULL,
   title CHAR(50) NOT NULL,
   email CHAR(50) NOT NULL,
   datereg INT NOT NULL,
   PRIMARY KEY(userid)
   )");

  $forum->query("INSERT INTO user VALUES (NULL, 'Admin', 'you', 'Admin', 'n@n.n'," . time() . ")");
echo mysql_error();

?>
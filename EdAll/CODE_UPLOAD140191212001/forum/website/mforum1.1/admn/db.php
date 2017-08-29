<?php
// db class for mysql
// this class is used in all scripts
// do NOT fiddle unless you know what you are doing

class DB_Sql_uf {
  var $database = "";

  var $link_id  = 0;
  var $query_id = 0;
  var $record   = array();

  var $errdesc    = "";
  var $errno   = 0;
  var $reporterror = 1;

  var $server   = "localhost";
  var $user     = "root";
  var $password = "";

  var $appname  = "Forum";
  var $appshortname = "Forum";

  function connect() {
    // connect to db server

    if ( 0 == $this->link_id ) {
      if ($this->password=="") {
        $this->link_id=mysql_pconnect($this->server,$this->user);
      } else {
        $this->link_id=mysql_pconnect($this->server,$this->user,$this->password);
      }

      if ($this->database!="") {
        mysql_select_db($this->database, $this->link_id);
      }
    }
  }

  function geterrdesc() {
    $this->error=mysql_error();
    return $this->error;
  }

  function geterrno() {
    $this->errno=mysql_errno();
    return $this->errno;
  }

  function select_db($database="") {
    // select database
    if ($database!="") {
      $this->database=$database;
    }

    mysql_select_db($this->database, $this->link_id);

  }

  function query($query_string) {
    // do query

    $this->query_id = mysql_query($query_string,$this->link_id);

    return $this->query_id;
  }

  function fetch_array($query_id=-1) {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    $this->record = mysql_fetch_array($this->query_id);

    return $this->record;
  }

  function free_result($query_id=-1) {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return @mysql_free_result($this->query_id);
  }

  function query_first($query_string) {
    // does a query and returns first row
    $this->query($query_string);
    $returnarray=$this->fetch_array($this->query_id);
    $this->free_result($this->$query_id);
    return $returnarray;
  }

  function data_seek($pos,$query_id=-1) {
    // goes to row $pos
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    $status = mysql_data_seek($this->query_id, $pos);
    return $status;
  }

  function num_rows($query_id=-1) {
    // returns number of rows in query
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysql_num_rows($this->query_id);
  }

  function insert_id() {
    // returns last auto_increment field number assigned

    return mysql_insert_id($this->link_id);

  }

}
?>
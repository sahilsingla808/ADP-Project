<?php
class db
{
	var $database = ""; //dbname
	var $linkid = 0;
	var $queryid = 0;
	var $record = array();

	var $server = "localhost"; //servername
	var $user = "root"; //username
	var $password = ""; //password

	function connect() 
	{
	//connects to database
		if ($this->link_id == 0) 
		{
			if ($this->password=="")
			{
				$this->link_id=mysql_pconnect($this->server,$this->user);
			}
			else
			{
				$this->link_id=mysql_pconnect($this->server,$this->user,$this->password);
			}
			if ($this->database!="")
			{
				mysql_select_db($this->database, $this->link_id);
			}
		}
	}

	function selectdb($db = "")
	{
	//selects db
		if ($db != "")
		{
			$this->database = $db;
		}
		mysql_select_db($this->database, $this->linkid
	}

	function query($qs)
	{
	//query function
		$this->queryid = mysql_query($qs, $this->linkid);
		return $this->queryid;
	}

	function fetcharray($qid = -1)
	{
	//fetches single row from result of query.
		if ($qid != -1)
		{
			$this->queryid=$qid;
		}
		$this->record = mysql_fetch_array($this->queryid);
		return $this->record;
	}

	function freeresult($qid = -1) 
	{
	//incase you're using too much memory, this frees some
		if ($qid!=-1)
		{
			$this->queryid=$qid;
		}
		return @mysql_free_result($this->queryid);
	}

	function queryfirst($qs)
	{
	//gets first row of result of query.
		$this->query($qs);
		$retarray=$this->fetcharray($this->queryid);
		$this->freeresult($this->$queryid);
		return $retarray;
	}

	function data_seek($pos,$qid = -1)
	{
	//goes to a specified row for use in fetcharray()
		if ($qid != -1)
		{
			$this->queryid=$qid;
		}
		$status = mysql_data_seek($this->queryid, $pos);
		return $status;
	}

	function numrows($qid = -1)
	{
	//gets number of rows
		if ($qid!=-1)
		{
			$this->queryid=$qid;
		}
		return mysql_num_rows($this->queryid);
	}

	function insert_id()
	{
	//gets number from last auto_insert field
		return mysql_insert_id($this->linkid);
	}

}
?>
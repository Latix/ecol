<?php
    require_once("connection.php");

    class Festus{

        public $cols, $vals, $searchQuery, $searchResult, $page, $updateMessage;
        protected $conn;

        //Connects to Database
        function __construct(){ $this->conn = Db::getInstance(); }//End

        //Cheks if value exists in table
        function validate($values, $tabelName){
            $value = array();

            foreach ($values as $key => $val) { array_push($value, "`".$key."`='".$val."'"); }

            $found = mysqli_num_rows(mysqli_query($this->conn, "SELECT * FROM $tabelName WHERE ".implode("AND ", $value).""));
            $validate =  ($found > 0 ? true : false);

            return $validate;
        }// End

        function stringEscape($string){
            return htmlspecialchars(mysqli_real_escape_string($this->conn, stripslashes(trim($string))), ENT_QUOTES, 'UTF-8');
        }

        //Function to login
        function login($tableName, $id, $key, $enckey=false){
            $loginQuery = "SELECT * FROM $tableName WHERE `".array_keys($id)[0]."` = '".$id[array_keys($id)[0]]."'";
            $this->runLoginQuery = mysqli_query($this->conn, $loginQuery);
			if(mysqli_num_rows($this->runLoginQuery) > 0){
				$this->info = mysqli_fetch_array($this->runLoginQuery);
                if($enckey){ $password = md5(md5($id[array_keys($id)[0]]). $key[array_keys($key)[0]]); }else{ $password = md5($key[array_keys($key)[0]]); }
                if(password_verify($password, $this->info[array_keys($key)[0]])){
					return true;
                    var_dump(true);
				}else{ $this->info = false;return false; }
			}else{ return false; }
        }
        //End

        //Function to Insert into table
        function insert($tableName, $values){
            $this->cols = "( `".implode("`, `", array_keys($values))."` )";
            $this->vals = "( '".implode("', '", $values)."' )";
            $run = mysqli_query($this->conn, "INSERT INTO ".$tableName." ".$this->cols." VALUES ".$this->vals);
            return $run;
        }//End

		//Function to Update Rows in Table
		function update($tableName, $valuesToUpdate, $identifier){
			foreach($valuesToUpdate as $key=>$value){
				$this->values[] = "`".$key."`='".$value."'";
			}
			return $run = mysqli_query($this->conn, "UPDATE ".$tableName." SET ".implode(", ", $this->values)." WHERE ".array_keys($identifier)[0]."='".$identifier[array_keys($identifier)[0]]."'");
		}

        //Function to delete from table
        function delete($tableName, $identifier){
            if(mysqli_query( $this->conn, "DELETE FROM $tableName WHERE `".array_keys($identifier)[0]."` = '".$identifier[array_keys($identifier)[0]]."'")){
                return true;
            }else{ return false; }
        }//End

        //function to set values
        function setValues($list){
            $values = array();
            foreach ($list as $key => $value) { $values[$key] = self::stringEscape($value); }
            return $values;
        }
    }


?>

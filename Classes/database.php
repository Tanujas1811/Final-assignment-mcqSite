<?php  

class Database {  
    public $db;
    private $result=array();
    public function __construct() {
        $host        = "host = 127.0.0.1";
        $port        = "port = 5432";
        $dbname      = "dbname = mcq";
        $credentials = "user = postgres password=postgres";
     
        $this->db = pg_connect( "$host $port $dbname $credentials"  );
        if(!$this->db) {

           echo "Error : Unable to open database\n";
        } else {
           echo "";
        }
    }
    public function query($sql) {
        $ret = pg_query($this->db, $sql);
       return $ret;
}

public function fetch_row($result) {
    $ret = pg_fetch_row($result);
   return $ret;
}
public function num_rows($result) {
    $ret = pg_num_rows($result);
   return $ret;
}
public function fetch_all($result) {
    $ret = pg_fetch_all($result);
   return $ret;
}

public function insert($table,$params=array()){
    if($this->tableexists($table)){
        $table_columns=implode(',',array_keys($params));
        $table_values=implode(',',($params));
       $sql2="INSERT INTO $table ($table_columns) VALUES ($table_values);";
       if(pg_query($this->db,$sql2)){
            echo 'row inserted';
            return true;
       }
       else{
           echo pg_last_error($this->db);
           return false;
       }
    }
  else{
      return false;
  }
       
   }


   public function update($table,$params=array(),$where=null){
    if($this->tableexists($table))
    {
        $args=array();
        foreach($params as $key =>$value){
            $args[]="$key='$value'";
        }

        $sql2="UPDATE $table SET ".implode(',',$args);
        if($where!=null){
            $sql2 .=" WHERE $where";
        }
        if(pg_query($this->db,$sql2)){
            echo 'data updated';
            return true;
       }
       else{
           echo pg_last_error($this->db);
           return false;
       }
    }

   }

   public function delete($table,$where=null){
    if($this->tableexists($table)){
            $sql2="DELETE FROM $table";
            if($where!=null){
                $sql2 .=" WHERE $where";
            }
            if(pg_query($this->db,$sql2)){
                echo 'data deleted';
                return true;
           }
           else{
               echo pg_last_error($this->db);
               return false;
           }
    }
    else{
        return false;
    }
   }

   public function select($table,$rows="*",$join=null,$where=null,$order=null,$limit=null){
    if($this->tableexists($table)){
        $sql="SELECT $rows FROM $table";
        if($join!=null)
        {
            $sql .=" JOIN $join";
        }
        if($where!=null)
        {
            $sql .=" WHERE $where";
        }
        if($order!=null)
        {
            $sql .=" ORDER BY $order";
        }
        if($limit!=null)
        {
            $sql .=" LIMIT 0,$limit";
        }
        echo $sql;
        $query=pg_query($this->db,$sql);
        if($query){
            $this->result=pg_fetch_all($query);
 
            return true;
 
        }else{
            echo array_push($this->result,pg_last_error($this->db));
             return false;
        }
 
    }
 
    else{
        return false;
    }


   }
   public function sql($sql2){
         $query=pg_query($this->db,$sql2);
       if($query){
           $this->result=pg_fetch_all($query);

           return true;

       }else{
           echo array_push($this->result,pg_last_error($this->db));
            return false;
       }

   }

private function tableexists($table){

   $sql2="SELECT tablename
   FROM pg_catalog.pg_tables
   WHERE schemaname != 'pg_catalog' AND 
       schemaname != 'information_schema' AND tablename like '$table';";
    $tableInDB=pg_query($this->db,$sql2);
    if($tableInDB){
        $rows = pg_num_rows($tableInDB);
        
        if($rows==1){
        
            return true;
        }else{
            array_push($this->result,$table.'does not exist in this database');
            return false;
        }
    }
}
public function getResult(){
   
    print_r( $val=$this->result);
    $this->result=array();
    return $val;
}
}
?>
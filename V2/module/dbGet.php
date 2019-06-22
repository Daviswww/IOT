<?php
include 'D:/XAMPP/htdocs/IOT/V2/includes/dbh.inc.php';

class Dbget extends Dbh
{
    protected function getLSTdata()
    {
        $sql = "SELECT * FROM farmer1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
            return $data;
        }
	}
	
    public function getINSdata($msg)
    {
		$sql = "INSERT INTO farmer1(sen, soil_humidity, air_humidity, temperature, rainfall, illumination) VALUES($msg)";
		$result = $this->connect()->query($sql);
		//header ("Location: ../page/insert.php?insert=done");
	}

    public function getUDPdata($a ,$b, $c)
    {
		if(!empty($cost))
		{
			$sql = "UPDATE db
					SET a = $a
					WHERE sname = '$name' ";
			$result = $this->connect()->query($sql);			
		}
		if(!empty($attack))
		{
			$sql = "UPDATE db
					SET b = $b
					WHERE sname = '$name' ";
			$result = $this->connect()->query($sql);		
		}
		if(!empty($defense))
		{
			$sql = "UPDATE db
					SET c = $c
					WHERE sname = '$name'";
			$result = $this->connect()->query($sql);			
        }
        header("Location: ../page/update.php?update=done");
	}
    public function getDELdata($name)
    {
		$sql = "delete from dbcard where cardname = '$name'";
		$result = $this->connect()->query($sql);
		header ("Location: ../page/delete.php?delete=done");
	}

	public function getLASTdata(){
		$sql = 'SELECT * FROM farmer1 ORDER BY id DESC LIMIT 1';
		$result = $this->connect()->query($sql);

		while($row = $result->fetch_assoc()){
			return $row;
		}
		
	}
}

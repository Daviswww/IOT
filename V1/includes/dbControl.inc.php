<?php
include 'dbh.inc.php';

class Dbcontrol extends Dbh
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
		$sql = "INSERT INTO farmer1(sen, soil_humidity, air_humidity, temperature) VALUES($msg)";
		$result = $this->connect()->query($sql);
		//header ("Location: ../page/insert.php?insert=done");
	}

    public function getUDPdata($a ,$b, $c)
    {
		if(!empty($cost))
		{
			$sql = "UPDATE dbcard
					SET cost = $cost
					WHERE cardname = '$name' ";
			$result = $this->connect()->query($sql);			
		}
		if(!empty($attack))
		{
			$sql = "UPDATE dbcard
					SET attack = $attack
					WHERE cardname = '$name' ";
			$result = $this->connect()->query($sql);		
		}
		if(!empty($defense))
		{
			$sql = "UPDATE dbcard
					SET defense = $defense
					WHERE cardname = '$name'";
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

}

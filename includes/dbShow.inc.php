<?php
class Show extends Dbcontrol  
{
    public function showALLdata()
    {
		$datas = $this->getLSTdata();
		echo "<table>";
		echo "<tr>";
		echo "<td>date</td>";
		echo "<td>soil_humidity</td>";
		echo "<td>air_humidity</td>";
		echo "<td>temperature</td>";
		echo "</tr>";
		if(is_array($datas))
		{
			foreach($datas as $data)
			{
				echo "<tr>";
				echo "<td>" . $data['date'] . "</td>";
				echo "<td>" . $data['soil_humidity'] . "</td>";
				echo "<td>" . $data['air_humidity'] . "</td>";
				echo "<td>" . $data['temperature'] . "</td>";
				echo "</tr>";
			}
		}
        echo "</table>";
	}
    public function showSELdata($date)
    {
		$sels = $this->getLSTdata();
		$TryStrpos = false;
		echo "<table>";
		echo "<tr>";
		echo "<td>date</td>";
		echo "<td>soil_humidity</td>";
		echo "<td>air_humidity</td>";
		echo "<td>temperature</td>";
		echo "</tr>";
		if(is_array($sels) && $date != "")
		{
			foreach($sels as $sel)
			{
				$TryStrpos = strpos($sel['date'], "2019-06-12", 0);
				if($TryStrpos)
				{
					echo "<tr>";
					echo "<td>" . $sel['date'] . "</td>";
					echo "<td>" . $sel['soil_humidity'] . "</td>";
					echo "<td>" . $sel['air_humidity'] . "</td>";
					echo "<td>" . $sel['temperature'] . "</td>";
					echo "</tr>";
				}
			}
		}
		echo "</table>";
	}
	public function showUPDdata($name)
	{
		$datas = $this->getLSTdata();
		echo "<table>";
		echo "<tr>";
		echo "<td>date</td>";
		echo "<td>name</td>";
		echo "<td>cost</td>";
		echo "<td>attack</td>";
		echo "<td>defense</td>";
		echo "</tr>";
		if(is_array($datas))
		{
			foreach($datas as $data)
			{
				if($data['cardname'] == $name)
				{
					echo "<tr>";
					echo "<td>" . $data['date'] . "</td>";
					echo "<td>" . $data['cardname'] . "</td>";
					echo "<td>" . $data['cost'] . "</td>";
					echo "<td>" . $data['attack'] . "</td>";
					echo "<td>" . $data['defense'] . "</td>";
					echo "</tr>";
				}
			}
		}
		echo "</table>";
	}
}

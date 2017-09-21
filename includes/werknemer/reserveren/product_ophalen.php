<?php

require "../../database/connect.php";

$conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM product");

$stmt->execute();

$catItem1 = [];
$catItem2 = [];
$catItem3 = [];
$catItem4 = [];
$categorie = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	// If categorie
	if ($row['categorie'] == 1)
	{	
		$categorie[1] = "Muizen";
		// If status is beschikbaar
		if ($row['status'] == 1) 
		{
			// Haal producten uit die categorie
			$id = $row['id'];
			$type = $row['type'];
			$aantal = $row['aantal'];

			$item1 = array($id, $type, $aantal);
            array_push($catItem1, $item1);
		}
	}

	if($row['categorie'] == 2)
	{	
		$categorie[2] = "Toetsenborden";
		// If status is beschikbaar
		if ($row['status'] == 1) 
		{
			// Haal producten uit die categorie
			$id = $row['id'];
			$type = $row['type'];
			$aantal = $row['aantal'];

			$item2 = array($id, $type, $aantal);
            array_push($catItem2, $item2);
		}
	}

	if($row['categorie'] == 3)
	{
		$categorie[3] = "Computers";
		// If status is beschikbaar
		if ($row['status'] == 1) 
		{
			// Haal producten uit die categorie
			$id = $row['id'];
			$type = $row['type'];
			$aantal = $row['aantal'];

			$item3 = array($id, $type, $aantal);
            array_push($catItem3, $item3);
		}
	}

	if($row['categorie'] == 4)
	{
		$categorie[4] = "Beeldschermen";
		// If status is beschikbaar
		if ($row['status'] == 1) 
		{
			// Haal producten uit die categorie
			$id = $row['id'];
			$type = $row['type'];
			$aantal = $row['aantal'];

			$item4 = array($id, $type, $aantal);
            array_push($catItem4, $item4);
		}
	}
}

for($i = 1; $i != 5; $i++)
{
	echo "<option disabled selected>";
		print $categorie[$i];
	echo "</option>";
	
	if($i == 1)
	{
		foreach($catItem1 as $value)
    	{
    		?> <option value="<?php print $value[0];?>"> <?php print $value[1] . ": " . $value[2];?> </option> <?php
    	}
	}

	if($i == 2)
	{
		foreach($catItem2 as $value)
    	{
    		?> <option value="<?php print $value[0];?>"> <?php print $value[1] . ": " . $value[2];?> </option> <?php
    	}
	}

	if($i == 3)
	{
		foreach($catItem3 as $value)
    	{
    		?> <option value="<?php print $value[0];?>"> <?php print $value[1] . ": " . $value[2];?> </option> <?php
    	}
	}

	if($i == 4)
	{
		foreach($catItem4 as $value)
    	{
    		?> <option value="<?php print $value[0];?>"> <?php print $value[1] . ": " . $value[2];?> </option> <?php
    	}
	}
}

?>
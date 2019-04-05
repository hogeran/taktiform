<?

    session_start();
    $dbConnection = mysql_connect("mysql.ambosantus.se", "ambosant", "tWdpkjQ8")
        or die("Error: no oLink");
    
    mysql_select_db("ambosant_a")
        or die("Error: no db select");
    
    $dbQuery = "SELECT * FROM tbproducts_11 ORDER BY number ASC";
    $dbResult = mysql_query($dbQuery);
    $arrProducts = array();
    
    while ($dbRow = mysql_fetch_assoc($dbResult)) {
        $arrProducts[$dbRow['number']] = $dbRow;
    }
    
    require("func_product.php");
    require("func_cart.php");
    
    if (isset($_POST['AddProductId'])) {
        CartProductAdd($_POST['AddProductId']);
    }
    
    if (isset($_POST['RemProductId'])) {
        CartProductRemove($_POST['RemProductId']);
    }
    
    $bodyFront = false;

?>
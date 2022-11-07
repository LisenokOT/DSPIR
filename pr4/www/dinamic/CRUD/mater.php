<?php
function openmysqli(): mysqli {
    $connection = new mysqli('mysql', 'user', 'password', 'appDB');
    return $connection;
}
function outputStatus($status, $message)
{
    echo '{status: ' . $status . ', message: "' . $message . '"}';
}
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addMaterial();
            break;
        case 'DELETE':
            removeMaterial();
            break;
        case 'PATCH':
            updateMaterialPrice();
            break;
        case 'GET':
            getMaterialByID();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
}
catch (Exception $e) {
    $message = $e->getMessage();
    outputStatus(2, $message);
};

function addMaterial() {
    $data = json_decode(file_get_contents('php://input'));
    if (!isset($data['name']) || !isset($data['price'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subName = $data['name'];
    $subPrice = $data['price'];
    $result = $mysqli->query("SELECT * FROM home WHERE name = '{$subName}';");
    if ($result->num_rows === 1) {
        $message = 'material '. $subName . ' already exists';
        outputStatus(1, $message);
    } else {
        $query = "INSERT INTO home (name, price)
        VALUES ('" . $subName . "', '" . $subPrice . "');";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Added material ' . $subName;
        outputStatus(0, $message);
    }
}
function removeMaterial()
{
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['name'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subName = $data['name'];
    $result = $mysqli->query("SELECT * FROM home WHERE name = '{$subName}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM home WHERE name = '" . $subName . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Removed subject ' . $subName;
        outputStatus(0, $message);
    } else {
        $message = 'Material ' . $subName . ' does not exist';
        outputStatus(1, $message);
    }
}
function updateMaterialPrice()
{
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['name']) || !isset($data['password'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subName = $data['name'];
    $subAuditorium = $data['auditorium'];
    $result = $mysqli->query("SELECT * FROM home WHERE name = '{$subName}';");
    if ($result->num_rows === 1) {
        $query = "UPDATE home SET auditorium = '" . $subAuditorium . "' WHERE name = '" . $subName . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Changed auditorium for ' . $subName;
        outputStatus(0, $message);
    } else {
        $message = $subName . ' does not exist';
        outputStatus(1, $message);
    }
}
function getMaterialByID()
{
    if (!isset($_GET['id'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subID = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM home WHERE ID = '{$subID}';");
    if ($result->num_rows === 1) {
        foreach ($result as $info) {
            echo "{status: 0, name: '" . $info['name'] . "}";
        }
        $mysqli->close();
    } else {
        $message = 'Material ID '. $subID . ' does not exist';
        outputStatus(1, $message);
    }
}
?>
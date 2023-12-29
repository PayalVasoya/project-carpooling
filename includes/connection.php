<?php
$host = "localhost";
$user = "root";
$psw = "";
$db = "carpooling";
$conn = new mysqli($host,$user,$psw,$db);
if($conn)
{
    //echo "Connected successfully";
}
else
{
    die("Connection failed: " . $conn->connect_error);

}
function hasPermission($role_id, $permission_name) {
    global $conn;
    $query = "SELECT COUNT(*) as count FROM tbl_role_permission
              INNER JOIN tbl_permission ON tbl_role_permission.permission_id = tbl_permission.permission_id
              WHERE role_id = $role_id AND permission_name = '$permission_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'] > 0;
}
?>
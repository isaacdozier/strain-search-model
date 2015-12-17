

<?php
$q_strain = intval($_GET['q_strain']);

include('../lib/config.php');

$sql_strain="SELECT * FROM strain_list WHERE id = '".$q_strain."'";
$result_strain = mysqli_query($con,$sql_strain);


while($row_strain = mysqli_fetch_array($result_strain)) {
    echo $row_strain['name']."<br/>";
}
mysqli_close($con);
?>
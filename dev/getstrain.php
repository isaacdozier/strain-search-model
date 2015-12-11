<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q_strain = intval($_GET['q_strain']);

include('../lib/config.php');

$sql_strain="SELECT * FROM strain_list WHERE id = '".$q_strain."'";
$result_strain = mysqli_query($con,$sql_strain);

echo "<table>
<tr>
<th>Strain</th>
</tr>";
while($row_strain = mysqli_fetch_array($result_strain)) {
    echo "<tr>";
    echo "<td>" . $row_strain['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Electricity Bill Calculator</title>
  <!-- add CSS framework -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I= sha384-UmsYCO9jN/D7zSS0v3xB/mYum/yLkCQwBf0bWLugf9+sX9n/6L/6L12slhHGzjH sha512-0nF/zvLbtfLbE9GC8ubhcjKLWDCbFap4kbCdce7JvGv1GB/8uEhaeOj+xvhkMhWmVuL4yEI/VvJgHmW8VX9xkw==" crossorigin="anonymous">
<style>
table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
    }
	
	th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
  <div class="grid-container">
    <h1>Electricity Bill Calculator</h1>
    <form action="" method="post">
      <label>Voltage (V):
        <input type="float" name="voltage" required>
      </label>
      <br>
      <label>Current (A):
        <input type="float" name="current" required>
      </label>
      <br>
      <label>Rate (per kWh):
        <input type="float" name="rate" required>
      </label>
 
	  <br>
      <button type="submit" name="submit">Calculate</button>
	  <br>
    </form>
<label id="output"> Answer:
		<?php
function calculateElectricityBill($voltage, $current, $rate, $hour) {

  $power = $voltage * $current;
  $power = $power / 1000;
  $energy = $power * $hour * 1000;
  $energy = $energy / 1000;
  $total = $energy * ($rate / 100);

  $result = [
    'power' => $power,
    'energy' => $energy,
    'total' => $total
  ];

  return $result;
}
 
 
if (isset($_POST['submit'])) {
  $voltage = $_POST['voltage'];
  $current = $_POST['current'];
  $rate = $_POST['rate'];

  echo '<br><table>';
  echo '<tr><th>Hour</th><th>Energy (kWh)</th><th>Total Charge (RM)</th></tr>';
 
  $total_energy = 0;
  $total_charge = 0;
  for ($hour = 1; $hour <= 24; $hour++) {
    $result = calculateElectricityBill($voltage, $current, $rate, $hour);

   
    $total_energy += $result['energy'];
    $total_charge += $result['total'];

    echo '<tr>';
    echo "<td>$hour</td>";
    
    echo '<td>' . $result['energy'] . '</td>';
    echo '<td>' . number_format((float)$result['total'], 2, '.', '') . '</td>';
    echo '</tr>';
  }

}
?>

      </label>

  </div>
</body>
</html>

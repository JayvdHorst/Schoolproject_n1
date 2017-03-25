<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}
th, td {
    border: none;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}
body{
	font-family: verdana;
}
#days{
	margin: 0;
	color: white;
	background-color: black;
}
#days h2{
	padding: 5px;
	margin: 0;
}
#days p{
	padding: 5px;
	margin: 0;
}
#days a{
	text-decoration: none;
	color: white;
	padding: 5px;
	margin-bottom: 5px;
}
p{
	margin: 0;
}
</style>

<div id="gids">
	<div id="days">
		<h2>Radio Gids</h2>
		<p><?php echo $date?></p>
		<a href="?date=<?=$prev_date;?>">Previous</a>
		<a href="?date=<?=$next_date;?>">Next</a>
	</div>

	<div id="program">
		<table>
			<tr>
				<th>Programma</th>
				<th>Tijd</th>
			</tr>
			
			<?php
			for ($i = 0; $i <= $size; $i++) {
				$str = $array[$i]['start'];
				$hour =  date('h:i a', strtotime($str));
				
				echo "<tr>";
					echo "<td>";
						echo $array[$i]['title'];
					echo "</td>";
					echo "<td>";
						echo $hour;
					echo "</td>";
				echo "</tr>";
			}
			?>
			
		</table>
	</div>
</div>
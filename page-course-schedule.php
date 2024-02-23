<?php

// https://www.advancedcustomfields.com/resources/repeater/

get_header();
?>


<?php
get_template_part( 'template-parts/content', 'page' );
?>

<?php
if (function_exists ('get_field')) {
	if (get_field("schedule")) {
		
		echo "<table>";
		echo "<tr>";
		echo "<th>Date</th>";
		echo "<th>Course</th>";
		echo "<th>Instructor</th>";
		echo "</tr>";

		foreach (get_field("schedule") as $row) {
			echo "<tr>";
			echo "<td>" . $row["date"] . "</td>";
			echo "<td>" . $row["course"] . "</td>";
			echo "<td>" . $row["instructor"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
}


}
?>
<?php
get_footer();

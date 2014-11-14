<?php 
echo "<div style='text-align: center;padding-top: 10px;'>";
echo "<h2>" . $this->levels[$errno] . "</b></h2>";
echo "<b>Error Msg:</b>$errstr<p/>";
echo "<b>Error On:</b> line $errline in $errfile";
echo "</div>";
?>
<?php  
$order = new Forms();  // new instance of Forms class    
$order->startForm();   // start the form


echo "\n<P class=\"T1\">All we have is bread... really</P>\n";

//	create header row
echo "\n<TABLE CELLSPACING=0 CELLPADDING=5 BORDER=0>\n
       <TR BGCOLOR=#339999>\n
       	<TD WIDTH=250><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Type of Bread</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Unit Price</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Quantity</FONT></B></TD>
       </TR>\n\n";
    
    
// 	create alternating rows and populate with data

	$j = 0;
	$on_menu = array_keys($name);
	foreach ($on_menu as $menu_num) { 
	
		if ($j % 2 != 0) { $row_color = "#99FF99"; }
		else { $row_color = "#FFFFFF"; }
				
		echo "<TR BGCOLOR=$row_color>\n";
		echo "\t<TD><FONT SIZE=2 FACE=verdana>$name[$menu_num]</FONT></TD>\n";
		echo "\t<TD ALIGN=CENTER><FONT SIZE=2 FACE=verdana>\$" . number_format($price[$menu_num], 2) . "</FONT></TD>\n";
		echo "\t<TD ALIGN=CENTER>"; TextBox::createTextBox($menu_num, 5); echo "</TD>\n";
		
		echo "</TR>\n";
		$j++;
				
	}  // end of foreach loop
			
			
// once all the rows are completed, close table tag
echo "</TABLE><BR>";


$order->endForm("Place Order");  // create submit button and end form

?>
        
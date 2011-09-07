<?php
/*  This generates the receipt if everything is valid.  In this case, 
	we are including it on the page, so the $quantities array already
	exist, so we don't have to pass it (as we would to a function).  */

//  Make the heading (ship to: info)

echo "<P CLASS=T1>SHIP TO:<BR>Jean-Luc Picard<BR>1701 Enterprise Way<BR>Starfleet Academy<BR>San Fransico, CA 94123 </P><BR>";
		
//  Make first line
echo "<TABLE CELLSPACING=0 CELLPADDING=5 BORDER=0>
       <TR BGCOLOR=#339999>
       	<TD WIDTH=250><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Type of Bread</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Quantity</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Unit Price</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=RIGHT><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Subtotal</FONT></B></TD>
       </TR>";

$items = array_keys($quantities);
$grand_total = 0;

foreach ($items as $key) {

	$sub = $quantities[$key] * $price[$key];
	$grand_total += $sub;
	
	//  Now print each line
	echo "<TR>
       	<TD WIDTH=250><FONT SIZE=2 FACE=verdana COLOR=#339999>" . $name[$key] . "</FONT></TD>
       	<TD WIDTH=100 ALIGN=CENTER><FONT SIZE=2 FACE=verdana COLOR=#339999>" . $quantities[$key] . "</FONT></TD>
       	<TD WIDTH=100 ALIGN=CENTER><FONT SIZE=2 FACE=verdana COLOR=#339999>\$" . number_format($price[$key], 2) . "</FONT></TD>
       	<TD WIDTH=100 ALIGN=RIGHT><FONT SIZE=2 FACE=verdana COLOR=#339999>\$" . number_format($sub, 2) . "</FONT></TD>
       </TR>";
} // end of foreach loop

//  Make last line
echo "<TR BGCOLOR=#339999>
       	<TD WIDTH=250><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>Grand Total:</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>&nbsp;</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=CENTER><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>&nbsp;</FONT></B></TD>
       	<TD WIDTH=100 ALIGN=RIGHT><B><FONT SIZE=2 FACE=verdana COLOR=#FFFFFF>\$" . number_format($grand_total, 2) . "</FONT></B></TD>
       </TR></TABLE>";

echo "<BR><P CLASS=P1>Thanks from ordering from <I>Just Bread.</I>  We hope you enjoy your bread and order again soon!</P>";

?>
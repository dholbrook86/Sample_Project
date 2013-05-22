
<h1 id="head" style="text-align: left;"><a href="dashboard.php"><img alt="" style="padding-top: 13px" src="images/logoshort.png"/></a><span style="vertical-align: 57%; position: relative; left: 217px;">Ensign Database Application</span></h1>



<ul id="navigation">

			<li><a href="dashboard.php">Dashboard</a></li>

            <li><a href="employees.php">Employees</a></li>

			<li><a href="clients.php">Clients</a></li>

			<li><a href="locations.php">Locations</a></li>

		</ul>

<?php

/*//This gets the current page and stores it as a function

function curPageURL() {

 $pageURL = 'http';

 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

 $pageURL .= "://";

 if ($_SERVER["SERVER_PORT"] != "80") {

  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

 } else {

  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

 }

 return $pageURL;

}



//This will generate the active header informatino for each page. When adding a new page, be sure and add an switch case here.

//When changing domains, make sure to chage the url to read the exact

switch (curPageURL()){ 

	case "http://www.ecohorizonenergy.com/testing/dashboard.php": 

    echo ('<ul id="navigation">

			<li><span class="active">Dashboard</span></li>

            <li><a href="employees.php">Employees</a></li>

			<li><a href="clients.php">Clients</a></li>

			<li><a href="locations.php">Locations</a></li>

		</ul>');

	break;

	case "http://www.ecohorizonenergy.com/testing/employees.php":

    echo ('<ul id="navigation">

			<li><a href="dashboard.php">Dashboard</a></li>

            <li><span class="active">Employees</span></li>

			<li><a href="clients.php">Clients</a></li>

			<li><a href="locations.php">Locations</a></li>

		</ul>');

	break;

    case "http://www.ecohorizonenergy.com/testing/clients.php":

    echo ('<ul id="navigation">

			<li><a href="dashboard.php">Dashboard</a></li>

            <li><a href="employees.php">Employees</a></li>

			<li><span class="active">Clients</span></li>

			<li><a href="locations.php">Locations</a></li>

		</ul>');

	break;

    case "http://www.ecohorizonenergy.com/testing/locations.php":

    echo ('<ul id="navigation">

			<li><a href="dashboard.php">Dashboard</a></li>

            <li><a href="employees.php">Employees</a></li>

			<li><a href="clients.php">Clients</a></li>

			<li><span class="active">Locations</span></li>

		</ul>');

	break;

	default :

    echo 'There was an error getting header information.';

}*/

?>
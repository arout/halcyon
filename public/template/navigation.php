<?php
if( $_application['cache']->fetch('email') === FALSE )
	require_once('nav-visitor.php');
else
	require_once('nav-loggedin.php');
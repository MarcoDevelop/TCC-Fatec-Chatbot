<?php

	if(!$_SESSION['usuario']) {
		header('Location: ../');
		exit();
	}

?>
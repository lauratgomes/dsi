<?php 

$this->load->view('includes/header');
$this->load->view('includes/menu');
if ($_SESSION['admin'] != TRUE) {
	$this->load->view('login.php');
} else {
	if ($tela != '') $this->load->view('telas/' . $tela);
}
$this->load->view('includes/footer');
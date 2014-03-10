<?php 
/*if($this->router->fetch_class() == 'login') {
	
	$this->load->view('layout/login_header');
}else {
	$this->load->view('layout/header');
}*/
if($this->session->userdata('userdetails')) {
	$this->load->view('layout/header');
}else {
	$this->load->view('layout/login_header');
}
?>


<div class="main">
			<div class="container">
				<div class="row-fluid">
				<?php 
if($this->router->fetch_class() == 'loagin') {
	?>
					<div class="span3">
						<aside class="side-nav">
							<div class="section-title">
								<h3>List Header</h3>
							</div>
							<ul class="first">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="#">Library</a></li>
								<li><a href="#">Application</a></li>
							</ul>
							<ul>
								<li class="nav-header">Another LIst Header</li>
								<li><a href="#">Profile</a></li>
								<li><a href="#">Settings</a></li>
							</ul>
							<ul>
								<li><a href="#">Help</a></li>
							</ul>
						</aside><!-- .side-nav -->
					</div>
					<!--  Content -->
	<?php }?>		
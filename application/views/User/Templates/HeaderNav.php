<div class="header" id="home1">
	<div class="container">
		<div class="w3l_login">
			<a href="<?php echo base_url() . "templates/user/"; ?>#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
		</div>
		<div class="w3l_logo">
			<h1><a href="<?php echo base_url() . "templates/user/"; ?>index.html">Electronic Store<span>Your stores. Your place.</span></a></h1>
		</div>
		<div class="search">
			<input class="search_box" type="checkbox" id="search_box">
			<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
			<div class="search_form">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search...">
					<input type="submit" value="Send">
				</form>
			</div>
		</div>
		<div class="cart cart box_1">
			<form action="#" method="post" class="last">
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="display" value="1" />
				<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</form>
		</div>
	</div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url() . "templates/user/"; ?>index.html" class="act">Home</a></li>
					<!-- Mega Menu -->
					<li class="dropdown">
						<a href="<?php echo base_url() . "templates/user/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="col-sm-3">
									<ul class="multi-column-dropdown">
										<h6>Mobiles</h6>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Mobile Phones</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Mp3 Players <span>New</span></a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">Popular Models</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products.html">All Tablets<span>New</span></a></li>
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="multi-column-dropdown">
										<h6>Accessories</h6>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html">Laptop</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html">Desktop</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html">Wearables <span>New</span></a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products1.html"><i>Summer Store</i></a></li>
									</ul>
								</div>
								<div class="col-sm-2">
									<ul class="multi-column-dropdown">
										<h6>Home</h6>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products2.html">Tv</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products2.html">Camera</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products2.html">AC</a></li>
										<li><a href="<?php echo base_url() . "templates/user/"; ?>products2.html">Grinders</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<div class="w3ls_products_pos">
										<h4>30%<i>Off/-</i></h4>
										<img src="<?php echo base_url() . "templates/user/"; ?>images/1.jpg" alt=" " class="img-responsive" />
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</ul>
					</li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>about.html">About Us</a></li>
					<li class="w3pages"><a href="<?php echo base_url() . "templates/user/"; ?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url() . "templates/user/"; ?>icons.html">Web Icons</a></li>
							<li><a href="<?php echo base_url() . "templates/user/"; ?>codes.html">Short Codes</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url() . "templates/user/"; ?>mail.html">Mail Us</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>

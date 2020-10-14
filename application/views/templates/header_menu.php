			<div class="app-header__content">
				<div class="app-header-left">
					<div class="search-wrapper">
						<div class="input-holder">
							<input type="text" class="search-input" placeholder="Type to search">
							<button class="search-icon"><span></span></button>
						</div>
						<button class="close"></button>
					</div>
					<ul class="header-menu nav">
						<li class="nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-database"> </i>
								Statistics
							</a>
						</li>
						<li class="btn-group nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-edit"></i>
								Projects
							</a>
						</li>
						<li class="dropdown nav-item">
							<a href="javascript:void(0);" class="nav-link">
								<i class="nav-link-icon fa fa-cog"></i>
								Settings
							</a>
						</li>
					</ul>
				</div>
				<?php 
				// var_dump($_SESSION);
				$id_admin = $_SESSION['id_admin'];
				$sql ="SELECT * FROM admin where id_admin = $id_admin";
				$query = $this->db->query($sql);
				$user = $query->result();
				$user = $user[0];

				// var_dump($user->image);die;

				?>



				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
											<img width="42" class="rounded-circle" data-toggle="modal" data-target="#exampleModal" src="<?php echo base_url() . "upload/images/admin/".$user->image; ?>" alt="">
							
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<button type="button" tabindex="0" class="dropdown-item">User Account</button>
											<button type="button" tabindex="0" class="dropdown-item">Settings</button>
											<h6 tabindex="-1" class="dropdown-header">Header</h6>
											<button type="button" tabindex="0" class="dropdown-item">Actions</button>
											<div tabindex="-1" class="dropdown-divider"></div>
											<button type="button" tabindex="0" class="dropdown-item">Dividers</button>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										Alina Mclourd
									</div>
									<div class="widget-subheading">
										VP People Manager
									</div>
								</div>
								<div class="widget-content-right header-user-info ml-3">
									<button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
										<i class="fa text-white fa-calendar pr-1 pl-1"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				</div>
			</div>
			</div>

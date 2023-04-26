<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li> <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li> <a href="{{ route('admin.users.index') }}"><i class="fas fa-tachometer-alt"></i> <span>Users</span></a> </li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Setup </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/designation') }}"> Designation </a></li>
                            </ul>
						</li>

                        <li class="submenu"> <a href="#"><i class="fas fa fa-list-ul"></i> <span> Blogs </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/categories') }}"> Categories </a></li>
								<li><a href="{{ url('admin/sub_categories') }}"> SubCategories </a></li>
								<li><a href="{{ url('admin/blogs') }}"> All Blogs </a></li>
								<li><a href="{{ url('admin/blogs/create') }}"> Add New Blog </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Galleries </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/image_categories') }}"> All Image Category </a></li>
								<li><a href="{{ url('admin/galleries') }}"> Add Galleries </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> CMS </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/pages') }}"> All CMS Pages </a></li>
								<li><a href="{{ url('admin/pages/create') }}"> Add New CMS Page </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Testimonials </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/testimonials') }}"> All Testimonials </a></li>
								<li><a href="{{ url('admin/testimonials/create') }}"> Add New Testimonial </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Customer Leads </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/customer/leads') }}"> All Customer Leads </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Website Setup </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/website/social_media') }}"> Social Media </a></li>
								<li><a href="{{ url('admin/website/header') }}"> Social Media </a></li>
                            </ul>
						</li>

					</ul>
				</div>
			</div>
		</div>

<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li> <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Setup </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/designation') }}"> Designation </a></li>
                            </ul>
						</li>

                        <li class="submenu"> <a href="#"><i class="fas fa fa-list-ul"></i> <span>Manage Blogs </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/categories') }}"> Categories </a></li>
								<li><a href="{{ url('admin/sub_categories') }}"> SubCategories </a></li>
								<li><a href="{{ url('admin/blogs') }}"> All Blogs </a></li>
								<li><a href="{{ url('admin/blogs/create') }}"> Add New Blog </a></li>
							</ul>
						</li>

                        <!-- <li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span>Manage Locations </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="">Countries</a></li>
							</ul>
						</li> -->

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Manage Galleries </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/image_categories') }}"> All Image Category </a></li>
								<li><a href="{{ url('admin/galleries') }}"> Add Galleries </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Manage CMS </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/pages') }}"> All CMS Pages </a></li>
								<li><a href="{{ url('admin/pages/create') }}"> Add New CMS Page </a></li>
                            </ul>
						</li>

					</ul>
				</div>
			</div>
		</div>

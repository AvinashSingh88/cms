<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li> <a href="{{ route('clear-cache') }}"><i class="fa fa-arrows-rotate"></i> <span>Clear Cache</span></a> </li>
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
								<li><a href="{{ url('admin/pages') }}"> All Master Pages </a></li>
								<li><a href="{{ url('admin/page_sections') }}"> All Page Section </a></li>
								<li><a href="{{ url('admin/section_data') }}"> All Section Data </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Services </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/services') }}"> All Service Pages </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Industry Sector </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/industry') }}"> All Industry Sector </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Careers </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/careers') }}"> All Careers </a></li>
							</ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Testimonials </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/testimonials') }}"> All Testimonials </a></li>
								<li><a href="{{ url('admin/testimonials/create') }}"> Add New Testimonial </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> FAQ </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/faqs') }}"> All FAQ </a></li>
								<li><a href="{{ url('admin/faqs/create') }}"> Add New FAQ </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Staffs </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/staffs') }}"> All Staffs </a></li>
								<li><a href="{{ url('admin/staffs/create') }}"> Add New Staff </a></li>
                            </ul>
						</li>

						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> All Enquiries </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/customer/leads') }}"> All Customer Leads </a></li>
								<li><a href="{{ url('admin/subscribers') }}"> All Subscribers </a></li>
                            </ul>
						</li>

						{{-- 
						<li class="submenu"> <a href="#"><i class="fas fa-calculator"></i> <span> Website Setup </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('admin/website/header') }}"> Header </a></li>
								<li><a href="{{ url('admin/website/footer') }}"> Footer </a></li>
								<li><a href="{{ url('admin/website/social_media') }}"> Social Media </a></li>
                            </ul>
						</li>
						--}}

					</ul>
				</div>
			</div>
		</div>

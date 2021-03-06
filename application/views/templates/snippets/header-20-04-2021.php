    <!--Header-part-->
    <div id="header">
        <h1><a href="<?php echo base_url(); ?>">&nbsp;</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-messaages-->
    <div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a>
        <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
		<a class="top_message tip-bottom" title="Manage Comments">
			<i class="icon-comment"></i><span class="label label-important">5</span>
		</a>
		<a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
	</div>
    <!--close-top-Header-messaages-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
            <li class=" dropdown" id="menu-messages">
				<a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#">new message</a></li>
                    <li><a class="sInbox" title="" href="#">inbox</a></li>
                    <li><a class="sOutbox" title="" href="#">outbox</a></li>
                    <li><a class="sTrash" title="" href="#">trash</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
            <li class=""><a title="" href="<?php echo base_url('logout'); ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
    </div>
    <div id="search">
        <input type="text" placeholder="Search here..." />
        <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-Header-menu-->
    <!--left-menu-stats-sidebar-->
    <div id="sidebar">
        <div id="search">
            <input type="text" placeholder="Search here..." />
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Common Elements</a>
        <ul>
            <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
            <li class="submenu"> 
				<a href="javascript:;"><i class="icon icon-th"></i> <span>Masters</span></a>
                <ul>
                    <li><a href="<?php echo base_url('designation'); ?>">Designation</a></li>
                    <li><a href="<?php echo base_url('role'); ?>">Role</a></li>
                    <li><a href="<?php echo base_url('department'); ?>">Department</a></li>
                    <li><a href="<?php echo base_url('rating'); ?>">Rating</a></li>
                    <li><a href="<?php echo base_url('salary_head'); ?>">Salary Head</a></li>
                    <li><a href="<?php echo base_url('mw_type'); ?>">MW Type</a></li>
                    <li><a href="<?php echo base_url('state'); ?>">State</a></li>
                    <li><a href="<?php echo base_url('city'); ?>">City</a></li>
                    <li><a href="<?php echo base_url('client'); ?>">Client</a></li>
                    <li><a href="<?php echo base_url('salary_head'); ?>">Salary Head</a></li>
                    <li><a href="<?php echo base_url('role'); ?>">Role</a></li>
                    <li><a href="<?php echo base_url('sales_billing'); ?>">Sales Billing</a></li>
                    <li><a href="<?php echo base_url('gstcategory'); ?>">GST Category</a></li>
                    <li><a href="<?php echo base_url('gstservice'); ?>">GST Service Category</a></li>
                </ul>
            </li>
			
			<li class="submenu"> 
				<a href="javascript:;"><i class="icon icon-th-list"></i> <span>Transactions</span></a>
                <ul>
                    <li><a href="#">Dummy Link</a></li>
                </ul>
            </li>
			
			<li class="submenu"> 
				<a href="javascript:;"><i class="icon icon-signal"></i> <span>Reports</span></a>
                <ul>
                    <li><a href="#">Dummy Link</a></li>
                </ul>
            </li>
			
            <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
            <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
            <li class="submenu"> 
				<a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">4</span></a>
                <ul>
                    <li><a href="index2.html">Dashboard2</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="chat.html">Chat option</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--close-left-menu-stats-sidebar-->

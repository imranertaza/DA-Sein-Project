<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="min-height: 65px;">
            <div class="pull-left image">
                <img src="<?php echo base_url()?>/uploads/admin_image/<?php echo user(newSession()->userId)->pic;?>" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo newSession()->name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php //$role_id = newSession()->role;?>


            <li class="Active">

                <?php
                //echo add_main_ajax_based_menu_with_permission('Dashboard', '/Admin/Dashboard', $role_id, 'fa fa-dashboard', '/Admin/DashboardAjax');
                ?>
                <a href="<?php echo base_url('Admin/Dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Admin/Slider') ?>">
                    <i class="fa fa-tasks"></i> <span>Slider</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Admin/News') ?>">
                    <i class="fa fa-tasks"></i> <span>News</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Work</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo base_url('Admin/Work') ?>">
                            <i class="fa fa-tasks"></i> <span>Work</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Category') ?>">
                            <i class=" fa fa-tasks"></i> <span>Category</span>
                        </a>
                    </li>


                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Office</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo base_url('Admin/Profile') ?>">
                            <i class=" fa fa-tasks"></i> <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Contact') ?>">
                            <i class=" fa fa-tasks"></i> <span>Contact</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Employment') ?>">
                            <i class=" fa fa-tasks"></i> <span>Employment</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/People') ?>">
                            <i class=" fa fa-tasks"></i> <span>People</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Publication') ?>">
                            <i class=" fa fa-tasks"></i> <span>Publication</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Client') ?>">
                            <i class=" fa fa-tasks"></i> <span>Client</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Event') ?>">
                            <i class=" fa fa-tasks"></i> <span>Event</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Podcasts') ?>">
                            <i class=" fa fa-tasks"></i> <span>Podcasts</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Awards') ?>">
                            <i class=" fa fa-tasks"></i> <span>Awards</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Current_vacancies') ?>">
                            <i class=" fa fa-tasks"></i> <span>Current Vacancies</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Block') ?>">
                            <i class=" fa fa-tasks"></i> <span>Block</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="<?php echo base_url('Admin/Internship_application') ?>">
                    <i class="fa fa-tasks"></i> <span>Internship Application</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Admin/Job_application') ?>">
                    <i class="fa fa-tasks"></i> <span>Job Application</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Admin/Settings') ?>">
                    <i class="fa fa-gear"></i> <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('Admin/Subscribe') ?>">
                    <i class="fa fa-gear"></i> <span>Subscribe</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="<?php echo base_url('Admin/Citizenship') ?>">
                            <i class=" fa fa-tasks"></i> <span>Citizenship</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Country') ?>">
                            <i class=" fa fa-tasks"></i> <span>Country</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Education') ?>">
                            <i class=" fa fa-tasks"></i> <span>Education</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Faq') ?>">
                            <i class=" fa fa-tasks"></i> <span>Faq</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/How_you_hear') ?>">
                            <i class=" fa fa-tasks"></i> <span>How You Hear</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Intern_semester') ?>">
                            <i class=" fa fa-tasks"></i> <span>Intern Semester</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Language') ?>">
                            <i class=" fa fa-tasks"></i> <span>Language</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Software_knowledge') ?>">
                            <i class=" fa fa-tasks"></i> <span>Software Knowledge</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/Applied_position') ?>">
                            <i class=" fa fa-tasks"></i> <span>Applied Position</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('Admin/General_settings') ?>">
                            <i class="fa fa-gears"></i> <span>General settings</span>
                        </a>
                    </li>

                </ul>
            </li>

<!--            <li>-->
<!--                <a href="--><?php //echo base_url('Admin/Settings') ?><!--">-->
<!--                    <i class="fa fa-gear"></i> <span>Settings</span>-->
<!--                </a>-->
<!--            </li>-->




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


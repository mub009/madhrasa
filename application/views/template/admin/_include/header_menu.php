<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="heading">
                    <h3 class="uppercase" style="
    color: azure;
"><b>
                            <center>
                               Admin
                            </center>
                        </b></h3>
                </li>
                <li id="NavMain" class="nav-item ">
                    <a href="<?=base_url('backend/admin/dashboard')?>" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>

                    </a>

                </li>
                <li class="heading">
                    <h3 class="uppercase">Features</h3>
                </li>

                <?php
if ($AdminPrivilege or in_array('AdminView', $this->data['CountryPrivilege']) || in_array('DealerView', $this->data['CountryPrivilege']) || in_array('VendorView', $this->data['CountryPrivilege']) || in_array('CustomerView', $this->data['CountryPrivilege']) || in_array('SupervisorView', $this->data['CountryPrivilege'])) {
    ?>
                <li id="NavMainUsers" class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-users"></i>
                        <span class="title">User</span>
                        <span id="ArrowMainUsers" class="arrow"></span>
                    </a>
                    <ul class="sub-menu">


                        <?php
if ($AdminPrivilege or in_array('AdminView', $this->data['CountryPrivilege'])) {
        ?>
                        <li id="NavUsersAdmin" class="nav-item  ">
                            <a href="<?=base_url() . 'backend/admin/user/mahal/mahal'?>" class="nav-link ">
                                <span class="title">Mahal</span>
                            </a>
                        </li>
                        <?php
}
    ?>

                     
                  

                    </ul>
                </li>
                <?php
}
?>
                
               


 




            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
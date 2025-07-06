<?php
    $controller_name=$this->router->fetch_class();
    $method_name=$this->router->fetch_method();

?>
 
    <li class="<?=$controller_name=='DashboardController' ? 'active' : ''?>">
        <a href="<?=base_url('admin/dashboard')?>"><i class="fa fa-th-large"></i> <span class="nav-label">DASHBOARD</span></a>  
    </li> 

    <li class="<?=$controller_name=='BannerController' ? 'active' : ''?>">
        <a href="<?=base_url('admin/banner')?>"><i class="fa fa-picture-o"></i> <span class="nav-label">BANNER</span></a>
    </li> 
    
    <li class="<?=$controller_name=='DoctorController' ? 'active' : ''?>">
        <a href="<?=base_url('admin/doctor')?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Doctor</span></a>
    </li> 

    <li class="<?=$controller_name=='PatientController' ? 'active' : ''?>">
        <a href="<?=base_url('admin/patient')?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Patient</span></a>
    </li> 
    
        <li class="<?=$controller_name=='MasterController' ? 'active' : ''?> <?=$method_name=='buyer' ? 'active' : ''?>  <?=$method_name=='product_image' ? 'active' : ''?> <?=$method_name=='buyer_product' ? 'active' : ''?> <?=$method_name=='product' ? 'active' : ''?> <?=$method_name=='category' ? 'active' : ''?> <?=$method_name=='sub_category' ? 'active' : ''?> ">
                <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> <span class="nav-label">Master</span> <span class="fa arrow arr"></span></a>
                <ul class="nav nav-second-level collapse">
                    <!--<li class="<?=$method_name=='buyer' ? 'active' : ''?>"><a href="<?=base_url('admin/buyer')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Buyer</span></a></li>-->
                    <!--<li class="<?=$method_name=='buyer_product' ? 'active' : ''?>"><a href="<?=base_url('admin/buyer-product')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Buyer Product</span></a></li>-->
                    <li class="<?=$method_name=='category' ? 'active' : ''?>"><a href="<?=base_url('admin/category')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Category</span></a></li>
                    <!--<li class="<?=$method_name=='sub_category' ? 'active' : ''?>"><a href="<?=base_url('admin/sub-category')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Sub Category</span></a></li>-->
                    <li class="<?=$method_name=='product' ? 'active' : ''?>"><a href="<?=base_url('admin/product')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Product</span></a></li>
                    
                    <li class="<?=$method_name=='product_image' ? 'active' : ''?>"><a href="<?=base_url('admin/product-image')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Product Image</span></a></li>
                </ul>
        </li>
        
       
         <li class="<?=$controller_name=='StockController' ? 'active' : ''?>">
            <a href="<?=base_url('admin/total-stock')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Total Stock</span></a>  
        </li>
        
        <!--<li class="<?=$controller_name=='VendorController' ? 'active' : ''?>">
            <a href="<?=base_url('admin/vendor')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Vendor</span></a>  
        </li>-->

        <li class="<?=$controller_name=='QueryController' ? 'active' : ''?> <?=$method_name=='sleep_test' ? 'active' : ''?> <?=$method_name=='free_consultation' ? 'active' : ''?>  ">
                <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> <span class="nav-label">Query</span> <span class="fa arrow arr"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?=$method_name=='sleep_test' ? 'active' : ''?>"><a href="<?=base_url('admin/sleep-test')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Sleep Test</span></a></li>
                    <li class="<?=$method_name=='free_consultation' ? 'active' : ''?>"><a href="<?=base_url('admin/free-consultation')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Free Consultation</span></a></li>
                    <li class="<?=$method_name=='berlin_list' ? 'active' : ''?>"><a href="<?=base_url('admin/berlin-questionnaire-list')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">berlin Query</span></a></li>
                </ul>
        </li>
           
        
        
        <li class="<?=$controller_name=='OrderController' ? 'active' : ''?> <?=$method_name=='pending_order' ? 'active' : ''?> <?=$method_name=='delivery_order' ? 'active' : ''?>  ">
                <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> <span class="nav-label">Order</span> <span class="fa arrow arr"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?=$method_name=='pending_order' ? 'active' : ''?>"><a href="<?=base_url('admin/pending-order')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Pending Order</span></a></li>
                    <li class="<?=$method_name=='delivery_order' ? 'active' : ''?>"><a href="<?=base_url('admin/delivery-order')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Delivery Order</span></a></li>
                </ul>
        </li>
        
        <li class="<?=$controller_name=='AccountController' ? 'active' : ''?> <?=$method_name=='monthly_account' ? 'active' : ''?> <?=$method_name=='delivery_order' ? 'active' : ''?>  ">
                <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> <span class="nav-label">Account</span> <span class="fa arrow arr"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?=$method_name=='monthly_account' ? 'active' : ''?>"><a href="<?=base_url('admin/monthly-account')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Monthly Account</span></a></li>
                    <li class="<?=$method_name=='delivery_order' ? 'active' : ''?>"><a href="<?=base_url('admin/delivery-order')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">Delivery Order</span></a></li>
                </ul>
        </li> 
        
        <li class="<?=$controller_name=='StateController' ? 'active' : ''?> <?=$controller_name=='CityController' ? 'active' : ''?> ">
                <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> <span class="nav-label">Setting</span> <span class="fa arrow arr"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?=$controller_name=='StateController' && $method_name=='index' ? 'active' : ''?>"><a href="<?=base_url('admin/state')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">State</span></a></li>
                    <li class="<?=$controller_name=='CityController' && $method_name=='index' ? 'active' : ''?>"><a href="<?=base_url('admin/city')?>"><i class="fa fa-list-alt" aria-hidden="true"></i> <span class="nav-label">City</span></a></li>
                   
                </ul>
        </li>

        

      <ul class="nav metismenu log-out-menu">
                
                <li>
                    <a href="<?=base_url('admin/AdminController/logout')?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Log Out</span> </a>
                    
                </li>
            </ul>

</div>
</nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a>
            <form role="search" class="navbar-form-custom" action="#">
               
            </form>
        </div>
               <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><span style="color: #999c9e">Welcome to</span> <b>RESPI TECH ADMIN SYSTEM</b></span>
                </li> 
                 <?php
                        //$this->db->where('quantity', "0");
                        $this->db->where('total_stock <= "10"');
                        $query = $this->db->get('tbl_total_stock')->result();
                        $stock_alert=count($query);
                        // pr($stock_alert); die;

                        //echo count($main_bannerac);
                ?>
                <li>
                <a class="logout-icon" href="<?=base_url('admin/total-stock')?>" style="color: red;">
                         Stock Alert(<?php echo $stock_alert;?>)
                    </a>
                </li>
                    <?php
                        //$this->db->where('quantity', "0");
                        $this->db->where('delivery_status','Ordered');
                        $this->db->group_by('order_id');
                        $query = $this->db->get('tbl_order')->result();
                        $order_alert=count($query);
                        // pr($stock_alert); die;

                        //echo count($main_bannerac);
                ?>
                <li>
                <a class="logout-icon" href="<?=base_url('admin/pending-order')?>" style="color: #ff8000;">
                         Pending Order(<?php echo $order_alert;?>)
                    </a>
                </li>
                <li>
                    <a class="logout-icon" href="<?=base_url('admin/AdminController/logout')?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                
            </ul>

        </nav>
    </div>

    
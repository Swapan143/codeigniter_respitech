<div class="wrapper wrapper-content animated fadeInRight">    
    <div class="row">        
           
            <div class="col-lg-3">
                <div class="ibox float-e-margins border">
                    <div class="ibox-title dash-title">
                        <span class="textsize">Total Product</span>
                    </div>
                    <div class="ibox-content inboxsize">
                        <h2 class="">
                            <?php if(!empty($product_data)) { ?>
                             <?= count($product_data) ?>
                             <?php } else { 
                                echo 0;
                             }
                             ?>
                        </h2>
                        <i class="fa fa-list-alt fonts"></i>
                        <div class="top-1">
                            <a href="<?=base_url('admin/product')?>" class="btn btn-primary pull-right mr-right" type="submit">View</a>                                                        

                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3">
                <div class="ibox float-e-margins border">
                    <div class="ibox-title dash-title">
                        <span class="textsize">Total Gallery</span>
                    </div>
                    <div class="ibox-content inboxsize">
                        <h2 class="">
                            <?php if(!empty($gallery_data)) { ?>
                             <?= count($gallery_data) ?>
                             <?php } else { 
                                echo 0;
                             }
                             ?>
                        </h2>
                        <i class="fa fa-list-alt fonts"></i>
                        <div class="top-1">
                            <a href="<?=base_url('admin/gallery')?>" class="btn btn-primary pull-right mr-right" type="submit">View</a>                                                        

                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3">
                <div class="ibox float-e-margins border">
                    <div class="ibox-title dash-title">
                        <span class="textsize">Total News</span>
                    </div>
                    <div class="ibox-content inboxsize">
                        <h2 class="">
                            <?php if(!empty($news_data)) { ?>
                             <?= count($news_data) ?>
                             <?php } else { 
                                echo 0;
                             }
                             ?>
                        </h2>
                        <i class="fa fa-list-alt fonts"></i>
                        <div class="top-1">
                            <a href="<?=base_url('admin/news')?>" class="btn btn-primary pull-right mr-right" type="submit">View</a>                                                        

                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3">
                <div class="ibox float-e-margins border">
                    <div class="ibox-title dash-title">
                        <span class="textsize">Total Greeting</span>
                    </div>
                    <div class="ibox-content inboxsize">
                        <h2 class="">
                            <?php if(!empty($greeting_data)) { ?>
                             <?= count($greeting_data) ?>
                             <?php } else { 
                                echo 0;
                             }
                             ?>
                        </h2>
                        <i class="fa fa-list-alt fonts"></i>
                        <div class="top-1">
                            <a href="<?=base_url('admin/greeting')?>" class="btn btn-primary pull-right mr-right" type="submit">View</a>                                                        

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
          
<style type="text/css">
    .dash-title{
        text-align: center;
        font-weight: bold;
        font-size: 18px;
    }
    .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 48px 20px !important;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }
    .btn {
        padding: 4px 10px !important;
    }
    .position{
        float: right;
        margin-top: -2.4em        
    }
    .top-1{
        margin-top: 2em;
    }
    .mr-right{
        margin-right: -.2em;
    }
</style>
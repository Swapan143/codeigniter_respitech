<div class="animated fadeInRight" style="margin-top: 10px;margin-left: 10px">
                <a style="text-decoration: none" href="javascript:void(0)" class="btn btn-primary btn-pad"  data-toggle="modal" data-target="#add_banner">Add Banner</a>
            </div>
        <div class="modal inmodal" id="add_banner" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                <h4 class="modal-title">Add Banner</h4>                        
                    </div>
                    <div class="modal-body">
                        <form id="form" action="<?=base_url('admin/add-banner')?>" method="post" enctype="multipart/form-data">
                          
                            <div class="row text-center">
                                <div class="col-sm-12 add-new-sevice-popup-img">                                                        
                                    <div class="form-group">
                                            
                                            <img src="<?=base_url('webroot/admin/images/Add-Photo-Button.png')?>" id="upload_photo_banner" onclick="get_banner()" style="cursor: pointer;" class="add_img_button">
                                            <input type="file" name="item_image_banner" class="image-upload selected_img" id="input_upload_banner" style="display: none" accept=".jpg,.jpeg,.png" onchange="show_photo_banner(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                   
                                                                  
                                <div class="col-sm-6">                                       
                                    <div class="form-group">
                                        <label>Banner Name</label>                                            
                                        <input name="banner_name" id="banner_name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Banner name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type banner name">
                                    </div>
                                </div>
                              
                                <div class="col-sm-12">                                       
                                    <div style="text-align: center; margin-top: 2em;">
                                        <button class="btn btn-primary pull-right" name="add_class" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </div>                                                                               
                        </form>                                            
                    </div>                                        
                </div>
            </div>
        </div>                            


    <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight" style="margin-top: 10px">
        <div class="col-lg-10">
            <h2>Banner </h2>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
      
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
    <div class="ibox-content">

        <div class="table-responsive">
            <form id="multi_delet" role="form" action="" method="post">
                
                
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th class="th-sr-width"></th>
                    <th>Banner Name</th>
                    <th>Images</th>                        
                    <th>Status</th>                        
                     <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($banner_data as $key => $value) {?>
                    <tr class="gradeX">
                        <td><?=$key+1?></td>
                        <td><?=$value->banner_name?></td>
                        <td> <img src="<?=base_url('webroot/adminImages/banner_image/'.$value->images.'')?>" class="banner_imgs"></td>
                        <td>
                            <input type="checkbox" class="js-switch" onchange="common_status_change(this.value)" id="status" value="<?=$value->id?>" <?=$value->is_active == 'Active' ? 'checked' : ''?> /></td>
                        <td style="padding: 0">
                            <!-- <a href="javascript:void(0)" class="btn btn-sm grediant-btn" style="font-size: 15px;" onclick="edit_action('<?=$value->transid?>')" id="get_action_val_<?=$value->transid?>"><i class="fa fa-pencil-square-o"></i></a> -->
                            <a style="text-decoration: none;" onclick="edit_banner('<?=$value->id?>')" href="javascript:void(0)" title="Edit">
                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                            
                            <a href="<?=base_url('admin/banner/destroy/'.$value->id)?>" style="font-size: 15px;" class="btn btn-sm grediant-btn" onclick="return confirm('Are you sure delete this banner?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
               
            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

                            <div class="modal inmodal" id="edit-category" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                            <h4 class="modal-title">Edit Banner</h4>
                                           
                                        </div>
                                        <div class="modal-body" id="edit_banner">
                                            
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                         


    <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight" style="margin-top: 10px">
        <div class="col-lg-10">
            <h2>Doctor </h2>
            </div>
            
            <div class="col-lg-2 pull-right">
                        <a href="<?=base_url('admin/add-doctor')?>"> <button class="btn btn-primary m-t-n-xs grediant-btn" type="submit" style="margin-top: 20px;"><strong>Add Doctor</strong></button></a>
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
                    <th>Name</th>
                    <th>Email</th>                        
                    <th>Mobile</th>                        
                    <th>Hospital Name</th>                        
                    <th>Specialist</th>                        
                    <th>Status</th>                        
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctor_data as $key => $value) {?>
                    <tr class="gradeX">
                        <td><?=$key+1?></td>
                        <td><?=$value->name?></td>
                        <td><?=$value->email?></td>
                        <td><?=$value->mobile?></td>
                        <td><?=$value->hospital_name?></td>
                        <td><?=$value->specialist?></td>
                       
                        <td>
                            <input type="checkbox" class="js-switch" onchange="common_status_change(this.value)" id="status" value="<?=$value->id?>" <?=$value->is_active == 'Active' ? 'checked' : ''?> /></td>
                        <td style="padding: 0">
                            <a href="<?=base_url('admin/doctor-edit/'.$value->id.'')?>" class="btn btn-sm grediant-btn" type="submit" style="font-size: 15px;"><strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i></strong></a>
                            
                            <a href="<?=base_url('admin/doctor/destroy/'.$value->id)?>" style="font-size: 15px;" class="btn btn-sm grediant-btn" onclick="return confirm('Are you sure delete this banner?')"><i class="fa fa-trash"></i></a>
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
                         


    <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight" style="margin-top: 10px">
        <div class="col-lg-10">
            <h2>Take a Free Consultation List</h2>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Height</th>                        
                    <th>Weight</th>                        
                    <th>Age</th>                        
                    <th>Gender</th>                                              
                    <th>State</th>                        
                    <th>City</th>                        
                    <th>BMI</th>                        
                    <th>BMI Category</th>                        
                    <th>Action</th>                        
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultancy_data as $key => $value) {?>
                    <tr class="gradeX">
                        <td><?=$key+1?></td>
                
                        <td><?=$value->first_name?></td>
                        <td><?=$value->last_name?></td>
                        <td><?=$value->height?></td>
                        <td><?=$value->weight?></td>
                        <td><?=$value->age?></td>
                        <td><?=$value->gender?></td>
                        <td><?=$value->state?></td>
                        <td><?=$value->city?></td>
                        <td><?=$value->bmi?></td>
                        <td><?=$value->bmi_category?></td>
                        <td>
                            <a href="<?=base_url('admin/berlin-questionnaire/'.$value->id.'')?>" class="btn btn-sm grediant-btn" type="submit" style="font-size: 15px;"><strong><i class="fa fa-info-circle" aria-hidden="true"></i></strong></a>
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

                           
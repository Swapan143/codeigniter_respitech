                         


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
                    <th>Precription</th>
                    <th>patient Name</th>
                    <th>Mobile</th>                        
                    <th>Gender</th>                        
                    <th>DOB</th>                        
                    <th>Consultation</th>                        
                    <th>Category Name</th>                        
                    <th>Product Name</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultancy_data as $key => $value) {?>
                    <tr class="gradeX">
                        <td><?=$key+1?></td>
                        <td> <img src="<?=base_url('webroot/UserImages/Consultancy/'.$value->images.'')?>" class="banner_imgs"></td>
                        <td><?=$value->name.' '.$value->patient_name?></td>
                        <td><?=$value->mobile?></td>
                        <td><?=$value->gender?></td>
                        <td><?=$value->dob?></td>
                        <td><?=$value->consultation?></td>
                        <td><?=$value->category_name?></td>
                        <td><?=$value->product_name?></td>
                
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

                           
                         


    <div class="row wrapper border-bottom white-bg page-heading animated fadeInRight" style="margin-top: 10px">
        <div class="col-lg-10">
            <h2>Book for Sleep Test List</h2>
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
                    <th>Email</th>                        
                    <th>Mobile</th>                        
                    <th>Gender</th>                        
                    <th>DOB</th>                        
                    <th>State</th>                        
                    <th>City</th>                        
                    <th>Reffered Form</th>                        
                    <th>Land Mark</th>                        
                    <th>Time Preference</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($sleep_data as $key => $value) {

                        $this->db->where('id', $value->state);
                        $state_data=$this->db->get('states')->row();

                        $this->db->where('id', $value->city);
                        $city_data=$this->db->get('cities')->row();
                        
                    ?>
                    <tr class="gradeX">
                        <td><?=$key+1?></td>
                        <td> <img src="<?=base_url('webroot/UserImages/osaSleepTest/'.$value->images.'')?>" class="banner_imgs"></td>
                        <td><?=$value->name.' '.$value->patient_name?></td>
                        <td><?=$value->email?></td>
                        <td><?=$value->mobile?></td>
                        <td><?=$value->gender?></td>
                        <td><?=$value->dob?></td>
                        <td><?=@$state_data->name?></td>
                        <td><?=@$city_data->name?></td>
                        <td><?=$value->reffered_form?></td>
                        <td><?=$value->land_mark?></td>
                        <td><?=$value->time_preference?></td>
                        <td><?=$value->address?></td>
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

                          
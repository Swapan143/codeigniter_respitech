<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Product View List</h2>
                </div>
                <div class="col-lg-4">
                    <?php 
                        $buyer_name=0;
                        foreach($buyer_product_data as $key1 => $value1)
                        {
                            if($key1 == 0)
                            {
                               $buyer_id=$value1->buyer_id;
                               $this->db->where('id', $buyer_id);
                               $buyer=$this->db->get('tbl_buyer')->row();
                               $buyer_name=$buyer->buyer_name;
                               
                            }
                        }
                    ?>
                    <h2><?=$buyer_name?></h2>
                </div>
                <div class="col-lg-4">
                    <h2><a href="<?=base_url('admin/buyer/')?>">Back</a></h2>
                </div>
            </div>
            
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Rate</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $date = new DateTime();
                        $date1= $date->modify("-1 days")->format('Y-m-d');
                        $today=date("Y-m-d");
                    foreach ($buyer_product_data as $key => $value) {
                        
                        $order_date=$value->date;
                        $ex=explode("-", $order_date);
                        $year=$ex[0];
                        $month=$ex[1];
                        $day=$ex[2];
                    
                        $monthNum  = $month;
                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                        $monthName = $dateObj->format('M');
                    ?>
                        <tr class="gradeX">
                            <td><?=$key+1?></td>
                            <td><?=$value->product_code?></td>
                            <td><?=$value->product_name?></td>
                            <td><?=$value->product_bye_rate?></td>
                            <td><?=$value->bye_qty?></td>
                            <td><?=$day.'-'.$monthName.'-'.$year?></td>
                            <td>
                                <?php 
                                    
        
                                    
                                    if($date1 == $value->date || $today == $value->date)
                                    {
                                ?>
                                        <a href="<?=base_url('admin/product-edit/'.$value->id.'')?>" class="btn btn-sm grediant-btn" type="submit" style="font-size: 15px;"><strong><i class="fa fa-pencil-square-o" aria-hidden="true"></i></strong></a>
                                        
                                <?php } ?>
                            </td>
                            
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>


     

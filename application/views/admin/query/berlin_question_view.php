                         


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
                    <th class="th-sr-width">Question Number</th>
                    <th>Question</th>
                    <th>Answer</th>
                                            
                </tr>
                </thead>
                <tbody>
                    
                    <tr class="gradeX">
                        <td>1</td>
                        <td>Do you store? (क्या आप खर्राटे लेते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->do_you_store))
                                {
                                    $q1=json_decode($query_data->do_you_store);
                                    //print_r($q1);
                                    for($i=0; $i<count($q1); $i++)
                                    {
                                        echo "<span>$q1[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>2</td>
                        <td>How often do you snore (आप कितनी बार खर्राटे लेते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->how_often_snore))
                                {
                                    $q2=json_decode($query_data->how_often_snore);
                                    //print_r($q1);
                                    for($i=0; $i<count($q2); $i++)
                                    {
                                        echo "<span>$q2[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>3</td>
                        <td>Has your snoring ever bothered other people? (क्या आपके खर्राटों से कभी अन्य
                        लोगों को परेशानी हुई है?)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->has_your_snoring_evar))
                                {
                                    $q3=json_decode($query_data->has_your_snoring_evar);
                                    //print_r($q1);
                                    for($i=0; $i<count($q3); $i++)
                                    {
                                        echo "<span>$q3[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>4</td>
                        <td>Has anyone noticed that you quit breathing during your sleep? (क्या किसी ने
                        यह देखा है कि आप सोते समय सांस लेना बंद कर देते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->has_any_one_noticed))
                                {
                                    $q4=json_decode($query_data->has_any_one_noticed);
                                    //print_r($q1);
                                    for($i=0; $i<count($q4); $i++)
                                    {
                                        echo "<span>$q4[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>5</td>
                        <td>How often do you feel tired or fatigued after you sleep? (आप सोने के बाद
                        कितनी बार थका हुआ या कमज़ोर महसूस करते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->how_often_do_you_feel))
                                {
                                    $q5=json_decode($query_data->how_often_do_you_feel);
                                    //print_r($q1);
                                    for($i=0; $i<count($q5); $i++)
                                    {
                                        echo "<span>$q5[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>6</td>
                        <td>Have you ever nodded off or fallen asleep while driving a vehicle? (क्या आप
                        कभी वाहन चलाते समय झपकी लेते हैं या सो जाते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->hao_you_evar_nodded_off))
                                {
                                    $q6=json_decode($query_data->hao_you_evar_nodded_off);
                                    //print_r($q1);
                                    for($i=0; $i<count($q6); $i++)
                                    {
                                        echo "<span>$q6[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>7</td>
                        <td>Do you have hign blood pressure? (क्या आपको उच्च रक्तचाप है)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->do_you_have_hign_blood_pressure))
                                {
                                    $q7=json_decode($query_data->do_you_have_hign_blood_pressure);
                                    //print_r($q1);
                                    for($i=0; $i<count($q7); $i++)
                                    {
                                        echo "<span>$q7[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>8</td>
                        <td>Do you have high blood sugar (क्या आपको उच्च रक्त शर्करा है)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->do_you_have_hign_blood_sugar))
                                {
                                    $q8=json_decode($query_data->do_you_have_hign_blood_sugar);
                                    //print_r($q1);
                                    for($i=0; $i<count($q8); $i++)
                                    {
                                        echo "<span>$q8[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>9</td>
                        <td> Do you Smoke (क्या आप धूम्रपान करते हैं)?</td>
                        <td>
                            <?php
                                if(!empty($query_data->do_you_have_smoke))
                                {
                                    $q9=json_decode($query_data->do_you_have_smoke);
                                    //print_r($q1);
                                    for($i=0; $i<count($q9); $i++)
                                    {
                                        echo "<span>$q9[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>

                    <tr class="gradeX">
                        <td>10</td>
                        <td>Do you drink alcohol (क्या आप शराब पीते हैं )?</td>
                        <td>
                            <?php
                                if(!empty($query_data->do_you_have_drink_alcohol))
                                {
                                    $q10=json_decode($query_data->do_you_have_drink_alcohol);
                                    //print_r($q1);
                                    for($i=0; $i<count($q10); $i++)
                                    {
                                        echo "<span>$q10[$i]</span></br>";
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                 

                   

                    
                    
                </tbody>
                </table>
               
            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

                           
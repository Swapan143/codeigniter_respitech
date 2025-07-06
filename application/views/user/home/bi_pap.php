

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!--<div class="breadcrumb-content">-->
                            <!--    <h2 class="title">COPD</h2>-->
                            <!--    <nav aria-label="breadcrumb">-->
                            <!--        <ol class="breadcrumb">-->
                            <!--            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>-->
                            <!--            <li class="breadcrumb-item active" aria-current="page">COPD </li>-->
                            <!--        </ol>-->
                            <!--    </nav>-->
                            <!--</div>-->
                             <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?=base_url('home')?>">Home</a>
                </li>
                <li class="active">COPD</li>
            </ul>
        </div>
    </div>
</div>
                        </div>
                    </div>
                </div>
            </section>
              <div class="container">
                <div class="row">
                     <div class="col-md-12 mt-4">
                         
                           
                             
                             <img style="width:40%; float:left; margin-right:20px" src="<?=base_url('webroot/adminImages/category_image/1509919191service1_img.jpg')?>" style="width:100%;">
                            <p>
                                Chronic Obstructive Pulmonary Disease (COPD) is a progressive lung disease characterized by chronic obstruction of airflow that interferes with normal breathing. It is typically caused by long-term exposure to irritants that damage the lungs and airways, with cigarette smoke being the most common cause. Other risk factors include exposure to air pollutants, genetic factors, and respiratory infections.
                                <br/>
                                 <br/>

<strong>COPD encompasses two main conditions:</strong>
<br/>
Chronic Bronchitis: Characterized by inflammation of the lining of the bronchial tubes, which carry air to and from the lungs. It leads to persistent coughing and mucus production.
Emphysema: Involves damage to the alveoli (air sacs) in the lungs, which impairs the exchange of oxygen and carbon dioxide and causes shortness of breath.
<br/>
 <br/>

<strong>Symptoms of COPD include:</strong>
<br/>

Persistent cough (often called "smoker's cough")
Excessive mucus production<br/>
Shortness of breath, especially during physical activities<br/>
Wheezing<br/>
Chest tightness<br/>
Frequent respiratory infections
<br/>
 <br/>

<strong>Diagnosis and Evaluation:</strong>
<br/>
Spirometry: A common pulmonary function test that measures the amount of air a person can breathe out and the speed at which they can do so.
Chest X-ray or CT Scan: Used to visualize the lungs and airways.
Arterial Blood Gas Analysis: Measures the levels of oxygen and carbon dioxide in the blood.

<br/>
 <br/>
<strong>Treatment and Management:</strong>
<br/>

Smoking Cessation: The most crucial step in preventing and managing COPD.
Medications: Includes bronchodilators, corticosteroids, and phosphodiesterase-4 inhibitors to reduce inflammation and open airways.
Pulmonary Rehabilitation: A program that includes exercise training, nutritional advice, and education about managing COPD.
Oxygen Therapy: For patients with severe COPD and low blood oxygen levels.
Surgery: In severe cases, options such as lung volume reduction surgery or lung transplantation may be considered.
<br/>
 <br/>
<strong>Lifestyle Modifications:</strong>
<br/>

Avoiding exposure to lung irritants
Maintaining a healthy diet
Regular physical activity
Staying up to date with vaccinations, such as flu and pneumococcal vaccines, to prevent infections
COPD is a manageable but incurable condition. Early detection and appropriate management can significantly improve the quality of life for individuals with COPD and reduce the risk of complications.
                            </p>

<div class="">
    <a class="cmn_btn" href="<?=base_url('copd-book-for-sleep-test')?>">
    Take a Free Consultation
    </a>
</div>
                     </div>
                </div>
            </div>
            
            
            <div class="container mb-4">
                <h3 class="text-center">Our Devices for Treatment of COPD</h3>
               <div class="row">


               <?php 
                foreach($main_menu as $val){
                    $category_image=trim($val->category_image,",");
                    
                    $category_name=$val->category_name;
                    $category_name_re = str_replace(' ', '', $category_name);
                    $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
                
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>">
                         <img src="<?=base_url('webroot/adminImages/category_image/'.$category_image.'')?>" style="width:100%;"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><h4 style="height: 65px;"><?php echo $val->category_name;?></h4> </a>
                        </div>
                    </div>
                    
                </div>

                <?php 
    
                 }
                ?>
                
               
                <!-- <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="#">
                         <img style="width:100%" src="webroot/user_panel/assets/img/service1_img.jpg"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><h4 style="height: 65px;">CPAP - Continuous Positive Airway Pressure</h4> </a>
                        </div>
                </div>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="#">
                         <img style="width:100%" src="webroot/user_panel/assets/img/service2_img.jpg"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><h4 style="height: 65px;">BiPAP - Bi level Positive Air Pressure</h4> </a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="#">
                         <img style="width:100%" src="webroot/user_panel/assets/img/service3_img.jpg"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><h4 style="height: 65px;">VENTILATOR</h4> </a>
                        </div>
                    </div>
                    
                </div> -->

               
               </div> 
            </div>
            <!-- breadcrumb-area-end -->

             <!-- category-area-start -->
             <!-- category-area-end -->

           

           

        </main>
        <!-- main-area-end -->




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Respitech Quiz</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/user_panel/assets/img/question/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>webroot/user_panel/assets/img/question/css/style.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
        .free_sleep_logo {
    position: absolute;
    top: -80px!important;
    width: 275px!important;
    left: -35px!important;
}
    .form-check {
      margin-bottom: 15px;
    }

    .panch_line {
      background: #7c0076;
      display: inline-block;
      padding: 5px 15px;
      border-radius: 15px;
    }

    .panch_line strong {
      font-size: 18px;
      display: block !important;
      border: none !important;
      padding: 0 !important;
    }

    .results {
      background-color: #7c0076;
      padding: 15px;
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      color: #fff;
    }

    .results strong {
      background-color: #019f13;
      padding: 5px 10px;
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      color: #fff;
      display: inline-block;
    }

    .results p span {
      color: #019f13;
      background: #fff;
      border-radius: 10px;
      padding: 0 5px;
    }

    .results2 strong {
      background-color: #00b17f;
      padding: 5px 10px;
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      color: #fff;
      display: inline-block;
    }

    .results2 p span {
      color: #00b17f;
    }

    .results3 strong {
      background-color: #ba0000;
      padding: 5px 10px;
      border-radius: 15px;
      -moz-border-radius: 15px;
      -webkit-border-radius: 15px;
      color: #fff;
      display: inline-block;
    }

    .results3 p span {
      color: #f00;
    }
   
  </style>
</head>

<body>
  <div class="banner_free_sleep_quiz">
    <div class="free_sleep_banner">
      <div class="banner_img_free_sleep"><img src="<?=base_url()?>webroot/user_panel/assets/img/question/img/banner_sleep.jpg" alt="img"></div>
    </div>
    <div class="banner_free_sleep_text">
      <div class="free_sleep_logo">
        <a href="<?=base_url()?>"><img src="https://respitech.co.in/webroot/admin/images/logo.png" alt=""></a>
      </div>
      <p class="panch_line"><strong> "Dream Deep, Breathe Better – </strong>
        Your Gateway to Restful Nights and Refreshed Mornings."</p>
        <div class="next_hide">
      <h2 class="fs-1 text-uppercase">
        Did You Know !!
        <br>
      </h2>
      <h4>Nearly 1 billion people worldwide have sleep apnea..</h4>
      <p>
        Why You Should Take This Sleep Assessment: Free Sleep
        <br>
        Assessment to know your Sleep Health
      </p>
      <p>
        <strong>
          <span class="material-symbols-outlined align-middle">
            update
          </span> within 3 to 5 mins
        </strong>
      </p>
      <div>
        <a href="#start" class="cmn_btn2 color_btn">Start Now <span class="material-symbols-outlined align-middle">
            double_arrow
          </span></a>
      </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="flag" value="<?=$flag?>">

  <form id="sleepForm" action="<?=base_url('berlin-questionnaire-submit')?>" class="form-class" method="post" enctype="multipart/form-data">
    <div class="steep1">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="0">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Enter your details in the boxes below:
        </h3>
      </div>
      <div id="start" class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="text-center bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-sm-6">
                    <label>First Name <br />(प्रथम नाम)*</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required/>
                    <div id="first_name_error" class="text-danger" style="display:none;">First Name is required.</div>
                  </div>
                  <div class="col-sm-6">
                    <label>Last Name<br /> (कुलनाम)*</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required/>
                    <div id="last_name_error" class="text-danger" style="display:none;">Last Name is required.</div>
                  </div>
                  <div class="col-md-12 mb-2 mt-3">
                    <div class="row">
                      <div class="col-sm-2">
                        <label>Height <br />(पराकाष्ठा)*</label>
                        <input type="text" class="form-control" placeholder="cm" name="height" id="height"/>
                        <div id="height_error" class="text-danger" style="display:none;">Height is required.</div>
                      </div>
                      <div class="col-sm-2">
                        <label>Weight <br />(वजन)*</label>
                        <input type="text" class="form-control" placeholder="kg" name="weight" id="weight"/>
                        <div id="weight_error" class="text-danger" style="display:none;">Weight is required.</div>
                      </div>
                      <div class="col-sm-2">
                        <label>Age<br /> (उम्र)*</label>
                        <input type="text" class="form-control" name="age" id="age"/>
                        <div id="age_error" class="text-danger" style="display:none;">Age is required.</div>
                      </div>
                      <div class="col-sm-2">
                        <label>Gender<br /> (लिंग)*</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Transgender">Transgender</option>
                        </select>
                        <div id="gender_error" class="text-danger" style="display:none;">Gender is required.</div>
                      </div>
                      <div class="col-sm-2">
                        <label>State<br /> राज्य*</label>
                        <select class="form-control" name="state" id="state">
                          <option value="">Select State</option>
                          <?php
                            foreach($states as $state_row)
                            {
                            ?>
                            <option value="<?= $state_row->id?>"><?= $state_row->name?></option>
                            <?php
                            }
                          ?>
                        </select>
                        <div id="state_error" class="text-danger" style="display:none;">State is required.</div>
                      </div>
                      <div class="col-sm-2">
                        <label>City<br /> शहर*</label>
                        <select class="form-control" name="city" id="city">
                          
                        </select>
                        <div id="city_error" class="text-danger" style="display:none;">City is required.</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-2 mt-3 text-start">
                    <label>Who are you completing this sleep assessment for?<br /> आप इस नींद मूल्यांकन को किसके लिए पूरा कर रहे हैं?</label>
                    <select class="form-control" name="who_are_you" id="who_are_you">
                      <option value="Self">Self</option>
                      <option value="Family Member">Family Member</option>
                      <option value="Friends">Friends</option>
                      <option value="Others">Others</option>
                    </select>
                    <div id="who_are_you_error" class="text-danger" style="display:none;">This field is required.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep1_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep2">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="03">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                    <h6>Questionnaire – Category wise: (प्रश्नावली – श्रेणी वार):</h6>
                  <hr />
                  <h6>Category (कैटेगरी )1</h6>
                </div>
                <div class="row">
                  <div class="col-md-6 mt-2">
                    <p class="mb-0 mb-3">1. Do you snore (क्या आप खर्राटे लेते हैं)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Yes(हाँ)" id="snore_yes" name="do_you_snore[]">
                        <label class="form-check-label" for="snore_yes">a. Yes (हाँ)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. No(नहीं)" id="snore_no" name="do_you_snore[]">
                        <label class="form-check-label" for="snore_no">b. No (नहीं)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="c. Don't Know (पता नहीं)" id="snore_dont_know" name="do_you_snore[]">
                        <label class="form-check-label" for="snore_dont_know">c. Don't Know (पता नहीं)</label>
                      </div>
                    </div>
                    <!-- Error message for the checkbox group -->
                    <div id="snore_error" class="text-danger" style="display:none;">Please select an option.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep2_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="steep3">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="05">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <h6 class="mb-0 mb-3 text-uppercase">If you Snore:</h6>
                    <hr />
                    <p>2. How often do you snore (आप कितनी बार खर्राटे लेते हैं)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Nearly every day (लगभग हर दिन)" id="snore_daily" name="how_often_snore[]">
                        <label class="form-check-label" for="snore_daily">a. Nearly every day (लगभग हर दिन)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. 3-4 times a week (सप्ताह में 3-4 बार)" id="snore_weekly" name="how_often_snore[]">
                        <label class="form-check-label" for="snore_weekly">b. 3-4 times a week (सप्ताह में 3-4 बार)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="c. 1-2 times a week (सप्ताह में 1-2 बार)" id="snore_few_weekly" name="how_often_snore[]">
                        <label class="form-check-label" for="snore_few_weekly">c. 1-2 times a week (सप्ताह में 1-2 बार)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="d. 1-2 times a month (महीने में 1-2 बार)" id="snore_monthly" name="how_often_snore[]">
                        <label class="form-check-label" for="snore_monthly">d. 1-2 times a month (महीने में 1-2 बार)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="e. Never or nearly never (कभी नहीं या लगभग कभी नहीं)" id="snore_never" name="how_often_snore[]">
                        <label class="form-check-label" for="snore_never">e. Never or nearly never (कभी नहीं या लगभग कभी नहीं)</label>
                      </div>
                    </div>
                    <!-- Error message for the checkbox group -->
                    <div id="how_often_snore_error" class="text-danger" style="display:none;">Please select how often you snore.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep3_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep4">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="10">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <p>3. Has your snoring ever bothered other people (क्या आपके खर्राटों से कभी अन्य लोगों को परेशानी हुई है?)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Yes (हाँ)" id="snore_bother_yes" name="has_your_snoring_evar[]">
                        <label class="form-check-label" for="snore_bother_yes">a. Yes (हाँ)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. No (नहीं)" id="snore_bother_no" name="has_your_snoring_evar[]">
                        <label class="form-check-label" for="snore_bother_no">b. No (नहीं)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="c. Don't Know (पता नहीं)" id="snore_bother_dont_know" name="has_your_snoring_evar[]">
                        <label class="form-check-label" for="snore_bother_dont_know">c. Don't Know (पता नहीं)</label>
                      </div>
                    </div>
                    <!-- Error message for checkbox group -->
                    <div id="has_your_snoring_evar_error" class="text-danger" style="display:none;">Please select an option.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep4_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep5">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="15">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <p>4. Has anyone noticed that you gasped for breath during your sleep (क्या किसी ने देखा है कि आप अपनी नींद के दौरान सांस के लिए हांफते हैं)</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Nearly every day (लगभग हर दिन)" id="defaultCheck1" name="has_any_one_noticed[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Nearly every day (लगभग हर दिन)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. 3-4 times a week (सप्ताह में 3-4 बार)" id="defaultCheck2" name="has_any_one_noticed[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. 3-4 times a week (सप्ताह में 3-4 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="c. 1-2 times a week (सप्ताह में 1-2 बार)" id="defaultCheck3" name="has_any_one_noticed[]">
                        <label class="form-check-label" for="defaultCheck3">
                          c. 1-2 times a week (सप्ताह में 1-2 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="d. 1-2 times a month (महीने में 1-2 बार)" id="defaultCheck4" name="has_any_one_noticed[]">
                        <label class="form-check-label" for="defaultCheck4">
                          d. 1-2 times a month (महीने में 1-2 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="e. Near or nearly never (कभी नहीं या लगभग कभी नहीं)" id="defaultCheck5" name="has_any_one_noticed[]">
                        <label class="form-check-label" for="defaultCheck5">
                          e. Never or nearly never (कभी नहीं या लगभग कभी नहीं)
                        </label>
                      </div>
                    </div>
                    <!-- Error message for checkbox group -->
                    <div id="has_any_one_noticed_error" class="text-danger" style="display:none;">Please select an option.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep5_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep6">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="20">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <h6>Category (कैटेगरी ) 2</h6>
                    <p>5. How often do you feel tired or fatigued after you sleep (आप सोने के बाद कितनी बार थका हुआ या कमज़ोर महसूस करते हैं)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Nearly every day (लगभग हर दिन)" id="defaultCheck1" name="how_often_do_you_feel[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Nearly every day (लगभग हर दिन)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. 3-4 times a week (सप्ताह में 3-4 बार)" id="defaultCheck2" name="how_often_do_you_feel[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. 3-4 times a week (सप्ताह में 3-4 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="c. 1-2 times a week (सप्ताह में 1-2 बार)" id="defaultCheck3" name="how_often_do_you_feel[]">
                        <label class="form-check-label" for="defaultCheck3">
                          c. 1-2 times a week (सप्ताह में 1-2 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="d. 1-2 times a month (महीने में 1-2 बार)" id="defaultCheck4" name="how_often_do_you_feel[]">
                        <label class="form-check-label" for="defaultCheck4">
                          d. 1-2 times a month (महीने में 1-2 बार)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="e. Never or nearly never (कभी नहीं या लगभग कभी नहीं)" id="defaultCheck5" name="how_often_do_you_feel[]">
                        <label class="form-check-label" for="defaultCheck5">
                          e. Never or nearly never (कभी नहीं या लगभग कभी नहीं)
                        </label>
                      </div>
                    </div>
                    <!-- Error message for checkbox group -->
                    <div id="how_often_do_you_feel_error" class="text-danger" style="display:none;">Please select an option.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep6_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep7">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="30">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <p>6. Have you ever nodded off or fallen asleep while driving a vehicle (क्या आप कभी वाहन चलाते समय झपकी लेते हैं या सो जाते हैं)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="a. Yes(हाँ)" id="defaultCheck1" name="hao_you_evar_nodded_off[]">
                        <label class="form-check-label" for="defaultCheck1">a. Yes (हाँ)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="b. No(नहीं)" id="defaultCheck2" name="hao_you_evar_nodded_off[]">
                        <label class="form-check-label" for="defaultCheck2">b. No (नहीं)</label>
                      </div>
                    </div>
                    <!-- Error message for checkbox group -->
                    <div id="hao_you_evar_nodded_off_error" class="text-danger" style="display:none;">Please select an option.</div>
                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep7_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep8">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="40">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <h6>Category (कैटेगरी) 3</h6>
                    <p>7. Do you have high blood pressure (क्या आपको उच्च रक्तचाप है)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes (हाँ)" id="defaultCheck1" name="do_you_have_hign_blood_pressure[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Yes (हाँ)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="No (नहीं)" id="defaultCheck2" name="do_you_have_hign_blood_pressure[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. No (नहीं)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Don't know (पता नहीं)" id="defaultCheck3" name="do_you_have_hign_blood_pressure[]">
                        <label class="form-check-label" for="defaultCheck3">
                          c. Don't Know (पता नहीं)
                        </label>
                      </div>
                    </div>

                    <!-- Error message for checkbox group -->
                    <div id="do_you_have_hign_blood_pressure_error" class="text-danger" style="display:none;">Please select an option.</div>

                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep8_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep9">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="50">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <p>8. Do you have high blood sugar (क्या आपको उच्च रक्त शर्करा है)?</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes (हाँ)" id="defaultCheck1" name="do_you_have_hign_blood_sugar[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Yes (हाँ)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="No (नहीं)" id="defaultCheck2" name="do_you_have_hign_blood_sugar[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. No (नहीं)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Don't Know (पता नहीं)" id="defaultCheck3" name="do_you_have_hign_blood_sugar[]">
                        <label class="form-check-label" for="defaultCheck3">
                          c. Don't Know (पता नहीं)
                        </label>
                      </div>
                    </div>

                    <!-- Error message for checkbox group -->
                    <div id="do_you_have_hign_blood_sugar_error" class="text-danger" style="display:none;">Please select an option.</div>

                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep9_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep10">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="80">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-6 mt-2">
                    <p>9. Do you Smoke (क्या आप धूम्रपान करते हैं)</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes (हाँ)" id="defaultCheck1" name="do_you_have_smoke[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Yes (हाँ)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="No (नहीं)" id="defaultCheck2" name="do_you_have_smoke[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. No (नहीं)
                        </label>
                      </div>
                    </div>

                    <!-- Error message for checkbox group -->
                    <div id="do_you_have_smoke_error" class="text-danger" style="display:none;">Please select an option.</div>

                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep10_btn">Next</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="steep11">
      <div class="banner_bottom">
        <div class="progressbar" data-animate="false">
          <div class="circle" data-percent="100">
            <div></div>

          </div>
        </div>
        <h3 class="mb-2">
          Please choose the correct response to each question (कृपया प्रत्येक प्रश्न का सही उत्तर चुनें)
        </h3>
      </div>
      <div class="container sleep_form">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-sm-8">
            <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
              <div class="pt-3 p-4">
                <div class="row">
                  <div class="col-md-6 mt-2">
                    <p>10. Do you drink alcohol (क्या आप शराब पीते हैं )</p>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes (हाँ)" id="defaultCheck1" name="do_you_have_drink_alcohol[]">
                        <label class="form-check-label" for="defaultCheck1">
                          a. Yes (हाँ)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="No (नहीं)" id="defaultCheck2" name="do_you_have_drink_alcohol[]">
                        <label class="form-check-label" for="defaultCheck2">
                          b. No (नहीं)
                        </label>
                      </div>
                    </div>

                    <!-- Error message for checkbox group -->
                    <div id="do_you_have_drink_alcohol_error" class="text-danger" style="display:none;">Please select an option.</div>

                  </div>
                  <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-dark ps-lg-4 pe-lg-4 steep14_btn">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>
 
  <div class="steep15">
    <div class="banner_bottom">
      <!-- <div class="progressbar" data-animate="false">
        <div class="circle" data-percent="0">
          <div></div>

        </div>
      </div> -->
      <h3 class="mb-2">
        Thank You ... Evaluation is on Process to Get the Assessment Results
      </h3>
    </div>
    <div class="container sleep_form">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-8">
          <div id="start" class="bg-white shadow rounded pt-3 pb-3" style="min-height: 150px;">
            <div class="pt-3 p-4">
              <div class="row">
                <div class="col-md-12 mt-2 text-center">
                  <div class="row">
                    <p>
                    Thank you, <strong><?=@$berlinDetails['name']?></strong>, for taking part in the Sleep Assessment Survey. Based on the details
                    provided for yourself, your height is <strong><?=@$berlinDetails['height']?> </strong> cm and your weight is <strong><?=@$berlinDetails['weight']?> </strong> kg. According to the
                    assessment, your BMI score is <strong><?=@$berlinDetails['bmi']?></strong>, which classifies you as "<strong><?=@$berlinDetails['bmi_category']?></strong>."
                    You are considered to be at <strong><?=@$berlinDetails['risk']?> </strong>, and it is recommended to consult a specialist immediately
                    or contact us for further guidance and support
                    </p>

                    <div class="text-center">
                      <div class="progressbar" data-animate="false">
                        <div class="circle text-white" data-percent="100">
                          <div></div>

                        </div>
                      </div>
                    </div>

                   <div class="results">

                   <?php if($berlinDetails['risk_type']=='1' || $berlinDetails['risk_type']=='2'){?>
                      <div class="results1 mt-4">
                        <p><strong class="d-block"> Low Risk for Obstructive Sleep Apnea (OSA),</strong> Suggested
                          Comment
                          and
                          Advise -
                          Please take this
                          assessment regularly in every six months’ interval to check you sleep health, call us for
                          more
                          guidance.</p>
                      </div>
                      <?php } ?>


                      <?php if($berlinDetails['risk_type']=='3'){?>
                      <div class="results results2 mt-4">
                        <p><strong class="d-block"> Moderate Risk for Obstructive Sleep Apnea (OSA),</strong> Suggested
                          Comment
                          and
                          Advise - Please take this as health concern, book for Sleep Test as soon as possible, call
                          us
                          for
                          the guidance.</p>
                      </div>
                      <?php } ?>


                      <?php if($berlinDetails['risk_type']=='4'){?>
                      <div class="results results3">
                        <p><strong class="d-block">High Risk for Obstructive Sleep Apnea (OSA),,</strong> Suggested
                          Comment and
                          Advise - Seek Immediate Medical Attention, and call us for the
                          guidance.

                        </p>
                      </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
  <script>
    $(document).ready(function ($) 
    {
      function animateElements() 
      {
        $(".progressbar").each(function () 
        {
          var elementPos = $(this).offset().top;
          var topOfWindow = $(window).scrollTop();
          var percent = $(this).find(".circle").attr("data-percent");
          var percentage = parseInt(percent, 10) / parseInt(100, 10);
          var animate = $(this).data("animate");
          if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            $(this).data("animate", true);
            $(this)
              .find(".circle")
              .circleProgress({
                startAngle: -Math.PI / 2,
                value: percent / 100,
                size: 100,
                thickness: 15,
                emptyFill: "#ededed",
                fill: {
                  color: "#800077"
                }
              })
              .on(
                "circle-animation-progress",
                function (event, progress, stepValue) {
                  $(this)
                    .find("div")
                    .text((stepValue * 100).toFixed(0) + "%");
                }
              )
              .stop();
          }
        });
      }

      animateElements();
      $(window).scroll(animateElements);
      $(document).unbind("scroll");

      $('#state').on('change', function() 
      {
          var state_id = $(this).val();
          //var current_url=$('#current_url').val();
          var base_url="https://respitech.co.in/get-city"; 
          $("#city").html('');
          $.ajax({
            url:base_url,
            type: 'POST',
            data: {state_id:state_id},
            success:function(data) 
            {
              $("#city").append(data);
            }
          });
      });
      var flag=$("#flag").val();;
      if(flag =='')
      {
        $('.steep2,.steep3,.steep4,.steep5,.steep6,.steep7,.steep8,.steep9,.steep10,.steep11,.steep12,.steep13,.steep14,.steep15,.steep16').hide();
      }
      else
      {
        $('.steep1,.steep2,.steep3,.steep4,.steep5,.steep6,.steep7,.steep8,.steep9,.steep10,.steep11,.steep12,.steep13,.steep14,.steep16').hide();
      }
    });

    

    $('.steep1_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Get form values
      const firstName = document.getElementById('first_name').value;
      const lastName = document.getElementById('last_name').value;
      const height = document.getElementById('height').value;
      const weight = document.getElementById('weight').value;
      const age = document.getElementById('age').value;
      const gender = document.getElementById('gender').value;
      const state = document.getElementById('state').value;
      const city = document.getElementById('city').value;
      const whoAreYou = document.getElementById('who_are_you').value;

      // Validate First Name
      if (firstName === "") {
        document.getElementById('first_name_error').style.display = 'block';
        isValid = false;
      }

      // Validate Last Name
      if (lastName === "") {
        document.getElementById('last_name_error').style.display = 'block';
        isValid = false;
      }

      // Validate Height
      if (height === "") {
        document.getElementById('height_error').style.display = 'block';
        isValid = false;
      }

      // Validate Weight
      if (weight === "") {
        document.getElementById('weight_error').style.display = 'block';
        isValid = false;
      }

      // Validate Age
      if (age === "") {
        document.getElementById('age_error').style.display = 'block';
        isValid = false;
      }

      // Validate Gender
      if (gender === "") {
        document.getElementById('gender_error').style.display = 'block';
        isValid = false;
      }

      // Validate State
      if (state === "") {
        document.getElementById('state_error').style.display = 'block';
        isValid = false;
      }

      // Validate City
      if (city === "") {
        document.getElementById('city_error').style.display = 'block';
        isValid = false;
      }

      // Validate Who Are You Completing for
      if (whoAreYou === "") {
        document.getElementById('who_are_you_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid)
      {
        $('.steep1').slideUp(100);
        $('.steep2').slideDown(100);
        // $('.steep1').hide(".next_hide");
        
      }
      
    })
    $('.steep2_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Get the checkbox group
      const snoreYes = document.getElementById('snore_yes').checked;
      const snoreNo = document.getElementById('snore_no').checked;
      const snoreDontKnow = document.getElementById('snore_dont_know').checked;

      // Validate the checkbox group (at least one must be selected)
      if (!snoreYes && !snoreNo && !snoreDontKnow) {
        document.getElementById('snore_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid)
      {
        $('.steep2').slideUp(100);
        $('.steep3').slideDown(100);
      }
    })
    $('.steep3_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "How often do you snore"
      const snoreDaily = document.getElementById('snore_daily').checked;
      const snoreWeekly = document.getElementById('snore_weekly').checked;
      const snoreFewWeekly = document.getElementById('snore_few_weekly').checked;
      const snoreMonthly = document.getElementById('snore_monthly').checked;
      const snoreNever = document.getElementById('snore_never').checked;

      if (!snoreDaily && !snoreWeekly && !snoreFewWeekly && !snoreMonthly && !snoreNever) {
        document.getElementById('how_often_snore_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) {
        $('.steep3').slideUp(100);
        $('.steep4').slideDown(100);
      }
    })
    $('.steep4_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Has your snoring ever bothered other people"
      const snoreBotherYes = document.getElementById('snore_bother_yes').checked;
      const snoreBotherNo = document.getElementById('snore_bother_no').checked;
      const snoreBotherDontKnow = document.getElementById('snore_bother_dont_know').checked;

      if (!snoreBotherYes && !snoreBotherNo && !snoreBotherDontKnow) {
        document.getElementById('has_your_snoring_evar_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep4').slideUp(100);
        $('.steep5').slideDown(100);
      }
    })
    $('.steep5_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Has anyone noticed that you gasped for breath during your sleep"
      const checkboxes = document.querySelectorAll('input[name="has_any_one_noticed[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('has_any_one_noticed_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep5').slideUp(100);
        $('.steep6').slideDown(100);  // Proceed to the next step
      }
    })
    $('.steep6_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "How often do you feel tired or fatigued after you sleep"
      const checkboxes = document.querySelectorAll('input[name="how_often_do_you_feel[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('how_often_do_you_feel_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep6').slideUp(100);
        $('.steep7').slideDown(100);  // Example action: proceed to next step
      }
    })
    $('.steep7_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Have you ever nodded off or fallen asleep while driving a vehicle"
      const checkboxes = document.querySelectorAll('input[name="hao_you_evar_nodded_off[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('hao_you_evar_nodded_off_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep7').slideUp(100);
        $('.steep8').slideDown(100);  // Example action: proceed to next step
      }
    })
    $('.steep8_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Do you have high blood pressure"
      const checkboxes = document.querySelectorAll('input[name="do_you_have_hign_blood_pressure[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('do_you_have_hign_blood_pressure_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep8').slideUp(100);
        $('.steep9').slideDown(100);  // Example action
      }
    })
    $('.steep9_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Do you have high blood sugar"
      const checkboxes = document.querySelectorAll('input[name="do_you_have_hign_blood_sugar[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('do_you_have_hign_blood_sugar_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep9').slideUp(100);
        $('.steep10').slideDown(100);  // Example action
      }
    })
    $('.steep10_btn').click(function () 
    {
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Do you Smoke"
      const checkboxes = document.querySelectorAll('input[name="do_you_have_smoke[]"]:checked');
      if (checkboxes.length === 0) {
        document.getElementById('do_you_have_smoke_error').style.display = 'block';
        isValid = false;
      }

      // If all fields are valid, proceed
      if (isValid) 
      {
        $('.steep10').slideUp(100);
        $('.steep11').slideDown(100);  // Example action
      }
    })
    // $('.steep11_btn').click(function () {
    //   $('.steep11').slideUp(100);
    //   $('.steep15').slideDown(100);
    // })
    // $('.steep12_btn').click(function () {
    //   $('.steep12').slideUp(100);
    //   $('.steep13').slideDown(100);
    // })
    // $('.steep13_btn').click(function () {
    //   $('.steep13').slideUp(100);
    //   $('.steep14').slideDown(100);
    // })
    $('.steep14_btn').click(function () 
    {
      event.preventDefault(); // Prevent form submission until validation passes
      let isValid = true;

      // Hide all error messages initially
      document.querySelectorAll('.text-danger').forEach(function(el) {
        el.style.display = 'none';
      });

      // Validate checkbox group for "Do you drink alcohol?"
      const alcoholCheckboxes = document.querySelectorAll('input[name="do_you_have_drink_alcohol[]"]:checked');
      if (alcoholCheckboxes.length === 0) {
        document.getElementById('do_you_have_drink_alcohol_error').style.display = 'block';
        isValid = false;
      }

      // Add additional validation for other fields here if needed
      // Example: Validate another checkbox group

      // Proceed if the form is valid
      if (isValid) 
      {
        document.getElementById('sleepForm').submit();
      }
    })
    $('.steep1_btn').click(function () {
      $('.next_hide').hide();
    //   $('.steep16').slideDown(100);
    })

function scrollNav() {
    $('a.color_btn').click(function () {
        //Toggle Class
        $(".active").removeClass("active");
        $(this).closest('li').addClass("active");
        var theClass = $(this).attr("class");
        $('.' + theClass).parent('li').addClass('active');
        //Animate
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top - 160
        }, 800);
        return false;
    });
    $('.scrollTop a').scrollTop();
}
scrollNav();
  </script>
</body>

</html>
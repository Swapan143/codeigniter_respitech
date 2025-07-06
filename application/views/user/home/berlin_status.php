<?php
$currentURL = current_url();
$_SESSION['pro_url']=$currentURL;
?>
<style>
.carousel-control     		 { width:  4%; }
.carousel-control.left,.carousel-control.right {margin-left:15px;background-image:none;}
a.home_product_text h4 {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px 0px;
    font-size: 20px;
}
.save-money-content{
    margin:0!important;
}
@media (max-width: 767px) {
	.carousel-inner .active.left { left: -100%; }
	.carousel-inner .next        { left:  100%; }
	.carousel-inner .prev		 { left: -100%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }

}
@media (min-width: 767px) and (max-width: 992px ) {
	.carousel-inner .active.left { left: -50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		 { left: -50%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }
	.active > div:first-child + div { display:block; }
}
@media (min-width: 992px ) {
	.carousel-inner .active.left { left: -16.7%; }
	.carousel-inner .next        { left:  16.7%; }
	.carousel-inner .prev		 { left: -16.7%; }	
}

  
@media only screen and (max-width: 2000px) and (min-width: 1100px) {
   .cat_row{
       display:flex;
       justify-content:center;
   }
   

}

@media only screen and (max-width: 400px) and (min-width: 300px) {
   /*.col_xs{*/
   /*    margin-left:70px;*/
   /*}*/
   

}
@media only screen and (max-width: 500px) and (min-width: 400px) {
   .col_xs{
       /*margin-left:90px;*/
   }
   

}
@media only screen and (max-width: 600px) and (min-width: 500px) {
   .col_xs{
       /*margin-left:160px;*/
   }
   

}
@media only screen and (max-width: 1050px) and (min-width: 1000px) {
   .col-sm-4{
     margin-right:30px;
   }
   

}



  </style>

<body>



<div class="brand-logo-area">
    <div class="container p-5">
       <p>Thank you for your test : </b><?=@$b_status?></b></p>
    </div>
</div>

<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/path/to/cdn/bootstrap.bundle.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>
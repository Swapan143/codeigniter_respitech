 $(document).ready(function(){
            $("#wizard").steps();
            $("#form1").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                 if (currentIndex === 3){
                         
                        if($("#invoice_details").val()==1){
                            
                            $(".current").addClass("error");
                            form.validate().settings.ignore = ":disabled";
                            return form.valid();
                        }
                        if($("#success_payment").val()==1){
                            
                            $(".current").addClass("error");
                            form.validate().settings.ignore = ":disabled";
                            return form.valid();
                        }
                        if($("#success_discount").val()==1){
                            
                            $(".current").addClass("error");
                            form.validate().settings.ignore = ":disabled";
                            
                            return form.valid();

                        }
                        
                    }
                    if (currentIndex === 2){
                        
                        if($('#vehicle_name').val()!=''){
                        $('#vehicle_quantity').addClass('required');
                         
                         $('#vehicle_quantity').attr('data-msg-required','Please select quantity'); 
                       
                      
                        }else{
                            $('#vehicle_quantity').removeClass('required');
                            
                         $('#vehicle_quantity').removeAttr('data-msg-required');
                        }

                        if($('#vehicle_name').val()=='' && $('#vehicle_quantity').val()!='' ){
                            $('#vehicle_name').addClass('required');
                            $('#vehicle_name').attr('data-msg-required','Please select Vehicle');
                        }else{
                            $('#vehicle_name').removeClass('required');
                            $('#vehicle_name').removeAttr('data-msg-required');
                        }
                        
                    }


                    var form = $(this);

                   
                    if (currentIndex < newIndex)
                    {
                        
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    
                    form.validate().settings.ignore = ":disabled,:hidden";

                    
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                   

                    if (currentIndex < 4 )  {

                       var discout=$('#dis_amount').val();
                       var dis_res=$("#discount_reason").val();
                       if(dis_res=='N/A'){
                        dis_res='';
                       }
                       
                       if(discout > 0){
                        window.setTimeout(function(){
                            $('.show1').val( discout);
                            
                            document.getElementById('discount_reason').value=dis_res;

                            
                            $("#discount_reason_box").show("100");

                           
                        },
                        500) ;
                       }
                       else{
                           $("#discount_reason").val(dis_res);


                        $("#discount_reason_box").show("100");
                       }
                    }
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("Save & Continue");
                    }

                    
                    
                   
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("Back");
                    }
                   


                    if (currentIndex === 4){

                        
                        confirm_details(); 
                        $(".excelbtn").css("display", "block");
                    }else{
                        $(".excelbtn").css("display", "none");
                    }
                    
                     if(currentIndex===1){
                        var get_total_pass_count = []
                        $("input[name='get_total_pass_count[]']").each(function (){
                            get_total_pass_count.push(String($(this).val()));
                        });
                        

                    }

                   
                     if(currentIndex==1){
                        if(get_total_pass_count.length>1){
                           
                        }

                    }else{
                    
                    }


                    if(currentIndex==4){


                        $('a[href="#finish"]').text('Confirm');
                       
                        if( parseInt($("#dis_amount").val()) > 0)
                        {
                        var reason = $("#discount_reason").val();
                        
                       
                       window.setTimeout(function(){
                        $('#before_append').html("<label><strong>Discount Reason: </strong></label><div><span id='show_less1_span3' style='cursor: pointer;' onclick='show_more3(\""+reason+"\")' >"+reason.substring(0,20)+"<span class='data-more'><br><b style='color:blue'>more</b></span></span><span style='display: none; cursor: pointer;' id='show_full1_span3' onclick='show_less3(\""+reason+"\")'><span class='data-more'>"+reason+"<br><b style='color: blue'>less</b></span></span> </div><br>");
                        },500);                     

                        }else{
                            $("#discount_reason").val('N/A');

                            $("#discount_reason_box").hide("100");
                            

                        }



                    }
                    if(currentIndex===3){
                        $('.decimal').keypress(function(event) {    

                            var $this = $(this);
                            if ($this.val().length == 0 && event.which == 48 ){
                              return false;
                           }else{
                            if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                               ((event.which < 48 || event.which > 57) &&
                               (event.which != 0 && event.which != 8))) {
                                   event.preventDefault();
                            }

                            var text = $(this).val();
                            if ((event.which == 46) && (text.indexOf('.') == -1)) {
                                setTimeout(function() {
                                    if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                                        $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                                    }
                                }, 1);
                            }

                            if ((text.indexOf('.') != -1) &&
                                (text.substring(text.indexOf('.')).length > 2) &&
                                (event.which != 0 && event.which != 8) &&
                                ($(this)[0].selectionStart >= text.length - 2)) {
                                    event.preventDefault();
                            }   
                           }   
                        });

                        $('.decimal').bind("paste", function(e) {
                        var text = e.originalEvent.clipboardData.getData('Text');
                        if ($.isNumeric(text)) {
                            if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
                                e.preventDefault();
                                $(this).val(text.substring(0, text.indexOf('.') + 3));
                           }
                        }
                        else {
                                e.preventDefault();
                             }
                        });
                        var add_on_transid=null;
                        if($("#add_on_0").is(":checked")){
                            var add_on_transid=$("#add_on_0").val();
                        }
                        if($("#add_on_1").is(":checked")){
                            var add_on_transid=$("#add_on_1").val();
                        }
                       fare_details(add_on_transid);
                       if(typeof dis_amount=='undefined'){
                        dis_amount=0;
                       }
                       discount_amount(dis_amount);                       

                    }                    
                    if(currentIndex==2){
                        get_bed();
                    }
              
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    
                    form.validate().settings.ignore = ":disabled";

                    
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                   
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },                        

                    });
       });


        $(document).ready(function() {            
            
            var elems = document.querySelectorAll('.js-switch');                
            for (var i = 0; i < elems.length; i++) {
               
                var switchery = new Switchery(elems[i], { color: '#1AB394', secondaryColor: '#ED5565', jackColor: '#ffffff', jackSecondaryColor: '#ffffff' });
            }                        

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            


        }); 
       
$(function () {                
    $("#form").validationEngine();
    $("#add_package_category").validationEngine();
    $("#validation_data").validationEngine();
    $("#category_data").validationEngine();
    $("#subcategory_data").validationEngine();
    $("#about_data").validationEngine();    
    $("#add_banner").validationEngine();
    $("#validate").validationEngine();

});

$(document).ready(function(){
    $('.dataTables-example').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
           
        ]

    });

});

    
        function show_more1(transid) {

        $('#show_full1_span').show();
        $('#show_less1_span').hide();
        }
        function show_less1(transid) {
        $('#show_full1_span').hide();
        $('#show_less1_span').show();
        }

        function show_more2(transid) {

        $('#show_full1_span2').show();
        $('#show_less1_span2').hide();
        }
        function show_less2(transid) {
        $('#show_full1_span2').hide();
        $('#show_less1_span2').show();
        }
        function show_more3(transid) {

        $('#show_full1_span3').show();
        $('#show_less1_span3').hide();
        $("#before_append").css('overflow-x','scroll');
        }
        function show_less3(transid) {
        $('#show_full1_span3').hide();
        $('#show_less1_span3').show();
        $("#before_append").css('overflow','hidden');
        }
        
    
    
    function show_button(value) {

    $('#check_all_filed').prop('checked', false);       

   var check = []
            
    $("input[name='check_delete[]']:checked").each(function ()
    {
        check.push(String($(this).val()));
     });
        
    if(check.length>0){
        $('#show_delete').show();
    }else{
        $('#show_delete').hide();
    }
}
function check_all(){        

        if($('#check_all_filed').is(':checked')){
            
            $('.check_class').prop('checked', true);
            
        }else{
            $('.check_class').prop('checked', false);        }

        var check = []
            
        $("input[name='check_delete[]']:checked").each(function ()
        {
            check.push(String($(this).val()));
         });
            
        if(check.length>0){
            $('#show_delete').show();
        }else{
            $('#show_delete').hide();
        }
}


    
   /* $("#flight_name").keypress(function(event) {        
      var inputValue = event.charCode;  
      if (!(inputValue >= 65 && inputValue <= 90) && !(inputValue >= 97 && inputValue <= 122) && (inputValue != 32 && inputValue != 0) && (inputValue!=46)) {
          event.preventDefault();
      }  
    });*/
    $('#flight_name').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
    $(".only_character").keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }

            e.preventDefault();
            return false;
        });
    $(function() {
  
        $("[name='from_date']").datepicker({
            defaultDate: "",
            dateFormat: "yy-mm-dd",
            minDate: 0,            
            changeMonth: true,        
            changeYear: true,
            numberOfMonths: 1,        
            onClose: function( selectedDate ) {
             $("[name='to_date']").datepicker( "option", "minDate", selectedDate );    
              
            }
          });
          $("[name='to_date']").datepicker({
            defaultDate: "",
            dateFormat: "yy-mm-dd",
            minDate: 0,
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
             
              
            }
          });
    
     });
         
    $(function() {
         
        $("#date").datepicker({
            defaultDate: "",
            dateFormat: "yy-mm-dd",
                 

            changeMonth: true,        
            changeYear: true,
            numberOfMonths: 1,                    
          });
      
    
  });

     $(function() {
      var currentYear = (new Date).getFullYear();
      // var currentYear=currentYear-16;

        $(".date_picker").datepicker({
            //defaultDate: currentYear,
            dateFormat: "yy-mm-dd",
            // maxDate: currentYear,     
            yearRange: "-70:currentYear",
            changeMonth: true,        
            changeYear: true,
            numberOfMonths: 1,

          });
        $(".date_picker").datepicker(
            'option','maxDate','-16y'
            );
      
    
  });

    $(function() {
        var pkg_date=$("#package_date").val();
  
        $("#date1").datepicker({
            defaultDate: "",
            dateFormat: "yy-mm-dd",
            //minDate: 1,
            maxDate: pkg_date,
            changeMonth: true,        
            changeYear: true,
            numberOfMonths: 1,                    
          });
      
    
  });

$('.decimal').keypress(function(event) {    

    var $this = $(this);
    if ($this.val().length == 0 && event.which == 48 ){
      return false;
   }else{
    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
       ((event.which < 48 || event.which > 57) &&
       (event.which != 0 && event.which != 8))) {
           event.preventDefault();
    }

    var text = $(this).val();
    if ((event.which == 46) && (text.indexOf('.') == -1)) {
        setTimeout(function() {
            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
            }
        }, 1);
    }

    if ((text.indexOf('.') != -1) &&
        (text.substring(text.indexOf('.')).length > 2) &&
        (event.which != 0 && event.which != 8) &&
        ($(this)[0].selectionStart >= text.length - 2)) {
            event.preventDefault();
    }   
   }   
});

$('.decimal').bind("paste", function(e) {
var text = e.originalEvent.clipboardData.getData('Text');
if ($.isNumeric(text)) {
    if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
        e.preventDefault();
        $(this).val(text.substring(0, text.indexOf('.') + 3));
   }
}
else {
        e.preventDefault();
     }
});
$(function () {                
    $('.timepicker').wickedpicker();
});
$(function () {                
    $('.travel_duration_timepicker').wickedpicker({
        twentyFour: true,        
        now: "00:00"
    });
});
   function get_action(transid) {
       var transid=transid;
       var value=$("#get_action_val_"+transid).val();
        if(value=='Edit'){           
           $("#get_action_val_"+transid).val('');
            edit_data(transid);        
        }else{
            $("#get_action_val_"+transid).val('');
            var r= confirm('Do you want to delete this?');
            if(r==true){ 
                 window.location = value;
            }        
            
        }
   }
function get_action1(uniqcode) { 
    
       var uniqcode=uniqcode;
       var value=$("#uniqcode"+uniqcode).val();
        if(value=='Edit'){           
           $("#uniqcode"+uniqcode).val('');
           var url=$("#get_edit_select_"+uniqcode).attr('redirect_url');
           window.location = url; // redirect
        }else{
            $("#get_action_val_"+uniqcode).val('');
            var r= confirm('Do you want to delete this?');
            if(r==true){ 
                 window.location = value;
            }        
            
        }
   }

    function char_check() {
        
        var pass_val=$('#password').val();
        
            var count=$("#password").val().length;
            if(count < 8){
                $("#password").removeClass('success_cls');
                $("#password").addClass('error_cls');
                $('#show_pass1').text('Minimum 8 characters required');
                $('#show_pass1').show('');
            }else{
                $('#show_pass1').hide();
            }
            if(count >= 8){
                var pwd=pass_val.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)
                if(pwd==null){
                    $("#password").removeClass('success_cls');
                    $("#password").addClass('error_cls');
                    $('#show_pass').text('The password must be contain an uppercase a lowercase and a digit');
                    $('#show_pass').show('');
                    
                    $("#validation_data").submit(function(e){
                        e.preventDefault();
                    });
                    
                }else{
                    $("#password").removeClass('error_cls');
                    $("#password").addClass('success_cls');
                    $('#show_pass').text('');
                    $('#show_pass').hide();
                    

                   // $("#form").submit();
                }
            }       
    }
    $("#description").keyup(function(){    
          $("#count1").text("Characters left: " + (200 - $(this).val().length));
    });
     $(document).ready(function () {
            $(".i-checks").iCheck({
                checkboxClass: "icheckbox_square-green",
                radioClass: "iradio_square-green", 
                
            });            

        });

 function get_package_details(transid) {
      var current_url=$('#current_url').val()                                                
      $("#package_tid").val(transid);
    
     $.ajax({
        type:'POST',
        url:current_url+'/package_details',
        data: {
            transid: transid
        },
        
        success:function(data){    
        
        //$("#get_desctiotion").show();

            //get_pkg_description();
            $("#get_package_details").html(data);

        }
     });   
 }

 function get_passenger_details(count) {

     get_bed();

      var current_url=$('#current_url').val()                                                
    
            if($("#package_amount_front").val()!=0){
                var pacakge_amount=$("#package_amount_front").val();
            }else{
                var pacakge_amount=$("#package_amount").val();
            }

        var append_data = []
        $("input[name='get_total_pass_count[]']").each(function(){
                append_data.push(String($(this).val()));

          }); 
         
        var package_tid=$("#package_tid").val();
           


        var appen_data_count=append_data.length;
       var count= parseInt(count);
        
        if(appen_data_count > count){

            for(i=1; i<appen_data_count; i++){
                var zzz= ((count) + (i));
                $("#pass_details_"+zzz+"").remove();
            }
        }
        var total_amount=pacakge_amount*count;    
        
        
         
         var add_on_transid=null;
         fare_details(add_on_transid);

     $.ajax({
        type:'POST',
        url:current_url+'/get_passenger',
        data: {
            count: count,
            appen_data_count: appen_data_count,
            package_tid:package_tid
        },
        
        success:function(data){
            
            $("#package_cost").text(($.number(total_amount,2)));
            $("#get_passenger").append(data);
        }
     });   
 }
 function get_state(country_id) {
     
       var current_url=$('#current_url').val()   
    
         $.ajax({
            type:'POST',
            url:current_url+'/get_state',
            data: {
                country_id: country_id
            },
            
            success:function(data){
                $("#state").html(data);
            }
         });      
 }
 function get_state_multiple(country_id, append_state_id) {
     
       var current_url=$('#current_url').val()   
    
         $.ajax({
            type:'POST',
            url:current_url+'/get_state',
            data: {
                country_id: country_id
            },
            
            success:function(data){
                $("#state_"+append_state_id).html(data);
            }
         });      
 }
 $(".only_integer").keypress(function(event) {
  var inputValue = event.charCode;  
  if (!(inputValue >= 48 && inputValue <= 57)) {
    event.preventDefault();
  }  
});
 function date_search(select_val) {

  var departure =select_val;
var current_url=$('#current_url').val()
  // alert(transid);exit;
  $.ajax({
    type : "POST",
    url:current_url+'/departure_date_search',
    dataType : "text",
    data : {
        departure:departure,
        pkg_guctomer:$("#pkg_guctomer1").val(),
    },
    
    success: function(data){
         
      $('#fetch_data').html(data);
  
    }
  });
 
    
}

$(document).ready(function(){

  // Search all columns
 
  // Search on name column only
  $('#pkg_guctomer').keyup(function(){
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;
    var len4 = $('table tbody tr:not(.notfound) td:nth-child(3):contains("'+search+'")').length;

    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
         $(this).closest('tr').show();
      });
    }else{
      if(len4 > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
         $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
      }
    }

    

    

  });

});

// Case-insensitive searching (Note - remove the below script for Case sensitive search )
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
   return function( elem ) {
     return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
   };
});

function get_action_customer(transid,booking_tid) {
       
        var transid=transid;
       var value=$("#get_action_val_customer_"+transid).val();
       //alert(value);exit;
        if(value=='collact_payment'){
               $("#get_action_val_customer_"+transid).val('');
                payment_details(transid);        
        }else if(value=='add_pax'){                
                $("#add_extra_pax_"+transid).submit();


        }else{
           
            var r= confirm('Do you want to cancel booking?');
            if(r==true){ 
                  window.location = value;                 
            }       
        }
   }


    function printDiv() 
    {      

      var divToPrint=document.getElementById("confirm_section");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }
 $(document).ready(function(){
        var doc = new jsPDF();
        var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#confirm_section').html(), 10, 10, {
            'width': 110,
                'elementHandlers': specialElementHandlers
        });
        doc.save('booking.pdf');
    });
});        

$("#password").blur(function(){
        // alert();
        var newpass= $('#password').val();
        var current_pass= $('#current_password').val();
        if(newpass==current_pass){
           $('#show_error_msg').show();
           $('#change_password').attr('type', 'button');
        }else{

            $('#show_error_msg').hide();
            $('#change_password').attr('type', 'submit');
        }    
   
    
 });

$(".number_character").keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z  0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });




 function show_less(transid) {
  
 $('#more_'+transid).show();
 $('#less_'+transid).hide();
}
function show_more(transid) {
    
 $('#more_'+transid).hide();
 $('#less_'+transid).show();
}



$('#password').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});






///Bongtech
 ///////*** bongbazar Superadmin manage_subcategory apurbo das 7/24/2020***////////

function common_status_change(transid) 
{  
        var uniqcode=transid;
        // alert(uniqcode);
        var uniqcode = uniqcode.replace(/ /g,'');
        var current_url=$('#current_url').val()
         $.ajax({                
            type:'post',                
            url:current_url+'/status',
            data: {                    
                uniqcode: uniqcode,                    
            },                
            success:function(data){                                                                 
            }

         });   
    }
  
function checkfile()
{
if( document.getElementById("logo_input_upload").files.length == 0 )
{
$('html, body').animate({scrollTop: 0}, 'slow');
$("#image_required").show();
$(".save_submit").attr('type','button');
return false;
}
else
{

$("#image_required").hide();
$(".save_submit").attr('type','submit');
return true;
}
}



function show_end_banner() {
if($("#check_banner").prop('checked') == true){
 $("#to_date").val('Lifetime');
    $('#to_date').attr('class','form-control validate[required] dis_click');
}else{
    if($todate==null){
         // $('#to_date').prop('disabled', true);
        $("#to_date").val('');
    $('#to_date').attr('class','form-control validate[required]');

        // $('#to_date').prop('disabled', true);
    }
    else{
    $('#to_date').attr('class','form-control validate[required]');

        $("#to_date").val($todate);
        // $('#to_date').prop('disabled', true);
    }
}
}
function get_banner_date_add(value) {
//$("#banner_end_date_add").val("");
//$("#active_days_add").val("");
$todate=$("#to_date").val();
if(value==''){
$('#to_date').prop('disabled', false);
}else{
$('#to_date').prop('disabled', false);
}
}

function get_banner() {
    $("#input_upload_banner").trigger("click"); 
    }

    function show_photo_banner(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
     var FileSize = input.files[0].size / 1024 / 1024; // in MB
        var FileType = input.files[0].type;
        var ext = $('#input_upload_banner').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['JPEG','PNG','JPG','png','jpg','jpeg']) == -1) {
            alert('invalid extension!');
            $("#input_upload_banner").val('');
        }else{
        
    if(FileSize < 1){
    reader.onload = function (e) {
    $('#upload_photo_banner')
    .attr('src', e.target.result)
    .width(100)
    .height(100);
    };
    reader.readAsDataURL(input.files[0]);
    }else{
        alert('Maximum file size 1MB can be upload');
        $(input).val('');
    }
    }
    }
    }
        function edit_banner(transid) {

             $('#edit-category').modal('show');
             var current_url=$('#current_url').val();

              $.ajax({
                type:'POST',
                url:current_url+'/edit-banner',
                data: {
                    transid : transid,
                },
                
                success:function(data){             
          
                    $("#edit_banner").html(data);
                }
             });

        }


 



  






    
    












   













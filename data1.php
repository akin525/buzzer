<?php include "sidebar.php"; ?>
<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3.css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/css">

<link rel="stylesheet" href="Buy Data _ MobileNig_files/jquery-ui.css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/style.css">
<script type="text/javascript" async="" src="Buy Data _ MobileNig_files/analytics.js.download"></script><script src="Buy Data _ MobileNig_files/jquery-1.12.4.js.download"></script>
<script src="Buy Data _ MobileNig_files/jquery-ui.js.download"></script>
<script src="Buy Data _ MobileNig_files/jquery.min.js.download"></script>

<script>
    $(document).ready(function(){
        $("#send").click(function(){
            var vnetwork = $('#slct1').val();
            var vamount = $('#slct2').val();
            var sponsor = $('#sponsor').val();
            ktVal = $(this).val();

            var phone = $('#phone_number').val();
            var phone =  phone.replace(/[^a-zA-Z0-9]/g, '');

            if(phone.length != 11){alert("Invalid beneficiary "+phone+", please use a right format."); location.reload(true); return false;}
            if(phone=="09060007260"){alert("DECLINED: Your sponsor number cannot be $sponsor_number. Please dial *229*9# to check your sponsor number. Leave empty if no sponsor number"); location.reload(true); return false;}

            if(vnetwork == "ETISALAT"){
                $("input:checkbox[name=kt]:checked").each(function () {
                    ktVal = $(this).val();
                    if(confirm("Please note that unused data will be wiped off, as our 9mobile Data doesn't roll over. \nWe'll advise you proceed with this request only if previous data has been exhausted")){
                    } else {alert("Order Canceled"); location.reload(true); return false;}
                });

            } else if(vnetwork == "GLO"){
                var res = phone.substring(0, 4);
                if(res != '0705' && res != '0805'  && res != '0807'  && res != '0811' && res != '0815' && res != '0905'){
                    if(confirm("Oops! "+phone+" does not look like a Glo number. Pls note that glo data ordered on a wrong number will be sent and cannot be reversed \n\rDo you want to continue this order?")){
                    }else{alert("Order Canceled"); location.reload(true); return false;}
                }
            }

            if(confirm("Confirm "+vnetwork+" Data request of #"+vamount+ " on "+phone)){
                $.post('dataprocess',{
                    slct1:vnetwork,slct2:vamount,phone_number:phone,sponsor_number:sponsor,kt:ktVal
                }, function(data){
                    alert(data); location.reload(true);
                });

            }   else    {
                alert("Request cancelled"); location.reload(true);
            }

        });
    });


    $( function() {
        $("#content" ).accordion({icons:{"header": "ui-icon-plus", "activeHeader": "ui-icon-minus"},
            collapsible:true, active: false
        });
    } );

    function yesnoCheck(that) {

    }


    function populate(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if (s1.value == "MTN"){
            var optionArray = [
                , "140|MTN 500MB = #140 "  , "250|MTN 1GB = #250 "  , "500|MTN 2GB = #500 "  , "1250|MTN 5GB = #1250 "  		  		];


        }else if(s1.value == "MTN_DIRECT"){
            var optionArray = ["|Select",
                "|MTN 1GB = #",
                "|MTN 5GB = #",
            ];

        } else if (s1.value == "E_GIFTING"){

            var optionArray = ["|Select", //"|10MB = #",
                "|1GB = #", "|1.5gb = #"
                , "|2.5gb = #", "|4gb = #", "|5.5gb = #", "|11.5gb = #",
                "|15gb = #", "|27.5gb = #"];
        } else if (s1.value == "ETISALAT"){

            var optionArray = [
                "250|9mobile 250MB = #250 "  , "350|9mobile 500MB = #350 "   , "650|9mobile 1GB = #650 "   , "1000|9mobile 1.5GB = #1000 "   , "1250|9mobile 2GB = #1250 "   , "1900|9mobile 3GB = #1900 "   , "2500|9mobile 4GB = #2500 "   , "3100|9mobile 5GB = #3100 "   , "3700|9mobile 6GB = #3700 "   , "4300|9mobile 7GB = #4300 "   , "4900|9mobile 8GB = #4900 "   , "6100|9mobile 10GB = #6100 "   , "7000|9mobile 11.5GB = #7000 "   , "8850|9mobile 15GB = #8850 "   , "11500|9mobile 20GB = #11500 "   		    ];
        } else if (s1.value == "GLO"){

            var optionArray = [
                "900|Glo 1.6GB or 2GB = #900 "  , "1800|Glo 3.65GB or 4.5GB = #1800 "   , "2250|Glo 5.75GB or 7.2GB = #2250 "   , "2700|Glo 7GB or 8.25GB = #2700 "   , "3600|Glo 10GB or 12.5GB = #3600 "   , "4500|Glo 12.5GB or 15.6GB = #4500 "   , "7200|Glo 20GB or 25GB = #7200 "   , "9000|Glo 26GB or 32.5GB = #9000 "   , "13500|Glo 42GB or 52.5GB = #13500 "
            ];
        }

        for (var option in optionArray){
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
    }

</script>
<style>

    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
</style><script type="text/javascript" src="chrome-extension://ljhlidglcgcgjnhloklpphkialnknbgc/inject.js"></script>

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(1).css">

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(2).css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/font-awesome.min.css">
<link href="Buy Data _ MobileNig_files/icon" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="./Buy Data _ MobileNig_files/js"></script>
<!-- !PAGE CONTENT! -->
<!--<div class="w3-main" style="margin-left:340px;margin-right:40px">-->

    <!-- Header -->
    <div class="w3-container" style="margin-top:10px" id="showcase">
        <div class="w3-container" id="buy_data" style="margin-top:50px">
            <h1 class="w3-xxxlarge w3-text-green"><b>Buy Data</b></h1>
            <hr style="width:50px;border:5px solid green" class="w3-round">

            <!--Wallet-->
            <div class="w3-container">
                <div class="w3-panel w3-yellow w3-round-xlarge">
                    <h4 class="w3-text-green"><b>Wallet : NGN <?php echo number_format(intval($balance *1),2);?> &nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="https://mobilenig.com/fund_wallet">Fund Wallet</a>
                        </b></h4>  	</div>
            </div>


            <div class="col">
                <div class="alert alert-danger">
                    <strong>ACCOUNT STATUS: ACTIVE</strong> Your Referral Link: https://mobilenig.com/?ref=108814 <a href="https://mobilenig.com/commission">Click Here for How it works</a>.
                </div></div>


            <!--<div class="w3-panel w3-pale-green w3-leftbar w3-border-blue">-->
            <!--   	<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">x</span>-->
            <!--   	<p><span style='color:blue'><b>**NEW**</b></span>&nbsp Own a MobileNig retailer website and retail DATA, AIRTIME and BILLS Payment. <a class='w3-btn w3-blue w3-border w3-round-large' href='retailer_website.php'>Click Here</a></p>-->
            <!--</div>-->

            <br>
            <ul class="w3-ul w3-border">
                <li><b>Network status</b></li>
                <li class="w3-btn-group" style="align:center">
                    <div class="w3-btn w3-padding w3-yellow w3-quarter">MTN: EXCELLENT</div>
                    <div class="w3-btn w3-padding w3-dark-grey w3-quarter">9MOBILE: EXCELLENT</div>
                    <div class="w3-btn w3-padding w3-green w3-quarter">GLO: EXCELLENT</div>
                    <div class="w3-btn w3-padding w3-blue-grey w3-quarter">9MOBILE(Gift): EXCELLENT</div>
                </li>
            </ul>



            <div class="w3-group w3-half w3-panel">
                <label>Choose Network:</label>
                <select id="slct1" name="slct1" class="w3-input w3-border" onchange="populate(this.id,&#39;slct2&#39;)" required="">
                    <option value="">Select</option>
                    <option value="MTN">MTN</option>
                    <!--option value = "MTN_DIRECT">MTN DIRECT</option-->
                    <!--option value = "E_GIFTING">9MOBILE(Gift)</option-->
                    <option value="ETISALAT">9MOBILE</option>
                    <option value="GLO">GLO</option>
                </select>
            </div>

            <div class="w3-group w3-half w3-panel">
                <label>Choose Data Plan: <i><b>(Click this box to reorder for 9mobile data)</b>
                        <input id="kt" class="" type="checkbox" name="kt" value="yes" title="Please note that 9mobile do not rollover, we&#39;ll advise you to exhaust the current data before check this box"></i>
                    <select id="slct2" name="slct2" class="w3-input w3-border" required=""></select>
                </label></div>

            <div class="w3-group w3-half w3-panel">
                <label>Phone Number:</label>
                <input class="w3-input w3-border" type="text" name="phone_number" id="phone_number" maxlength="11" minlength="11" required="">
            </div>

            <div class="w3-group w3-half w3-panel">
                <label><b>Sponsor number:</b> (If 9mobile)</label>
                <input class="w3-input w3-border" type="text" id="sponsor" name="sponsor_number" maxlength="11" minlength="11" placeholder="Leave empty if no number is seen">
            </div>

            <button type="submit" class="w3-blue-grey w3-btn w3-padding-large w3-block w3-panel" onclick="myFunction()" id="send">Buy Data</button>
            <button class="w3-red w3-btn w3-padding-large w3-block " id="load" style="visibility:hidden;" disabled=""><i class="fa fa-spinner"></i></button>

            <script>
                function myFunction(){
                    document.getElementById("send").disabled = true;
                    document.getElementById('send').innerHTML = document.getElementById('load').innerHTML;
                }
            </script>

            <!--Buy without Data-->
            <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                <span onclick="this.parentElement.style.display=&#39;none&#39;" class="w3-closebtn">x</span>
                <p><b>BUY DATA WITHOUT DATA:</b> Do you need to order for data on this website but have no data to log in? You can now purchase data plan without visiting our website. <a class="w3-btn w3-green w3-border w3-round-large" href="https://mobilenig.com/buy_without_data.php">Learn How</a></p>
            </div>  <br>



        </div><br><br><br>

        <script>
            // Script to open and close sidenav
            function w3_open() {
                document.getElementById("mySidenav").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidenav").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }

            // Modal Image Gallery
            function onClick(element) {
                document.getElementById("img01").src = element.src;
                document.getElementById("modal01").style.display = "block";
                var captionText = document.getElementById("caption");
                captionText.innerHTML = element.alt;
            }
        </script>

        <!--End of Tawk.to Script-->

        <div class="w3-hide-large">
    <span class=" w3-bottom" style="margin-bottom: 1%; margin-right: 50%;"><a href="https://wa.me/2349060007260">
    <img src="./Buy Data _ MobileNig_files/whatsapp-logo2.png" alt="Whatsapp" height="42" width="80"></a></span>
        </div>


    </div></div><div id="qtm_inject_cartdata" hidden="hidden"></div><div id="qtm_inject" hidden="hidden"></div></body></html>
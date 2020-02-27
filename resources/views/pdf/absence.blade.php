<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Grading PDF</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
        }
        body
        {
            padding: 20px 50px;
        }
        .page-break 
        {
            page-break-after: always;
        }
        .text-center
        {
            text-align: center;
        }
        .float_left
        {
            margin-top: 40px;
            height: 150px;
        }
        .float_right
        {
            float: right;
        }
        .clear
        {
            clear:both;
        }
        .fontsmall
        {
            font-size: 9px;
        }
        table, td, th 
        {  
            border: 1px solid #000;
            text-align: left;
        }

        table 
        {
            border-collapse: collapse;
            width: 100%;
        }

        th, td 
        {
            padding: 15px;
        }
        .myan 
        { 
            position: relative; 
            top: 10px; 
            border: none; 
            height: 6px; 
            width: 340px;
            background: black; 
            margin-bottom: 50px;
            margin:auto; 
        } 
        .content_rowone h2{
            border: 10px dotted black;
            padding: 2px;
            background: #0f1012;
            color: white;
        }

        .type
        {
            position: relative;  
            border: none; 
            height: 3px; 
            width: 135px;
            background: black; 
            
        }

        .column {
          float: left;
          width: 160px;
          padding: 35px;
           /* Should be removed. Only for demonstration */
        }
        .checkbox {
          display: inline-block;
          padding-top: 3px;
          width: 160px;
          float: left;
          padding-left: 20px;
          position: relative;
          margin-left: 45px;
        }

        .checkbox input {
          position: absolute;
          left: 0;
          top: 0;
        }

        .exp{
            position: relative;  
            border: none; 
            height: 3px; 
            width: 595px;
            background: #808080; 
            margin-left: 100px;
        }

        .exp1{
            position: relative;  
            border: none; 
            height: 3px; 
            background: #808080; 
        }

        li{
            margin-left: 30px;
        }

        .hrtrain .train{
          float: left;
          width: 200px;
          padding: 0px;
          margin-top: 40px;
           /* Should be removed. Only for demonstration */
        }

        .hrtrain .certi{
            float: right;
            width: 200px;
            padding: 0px;
            margin-top: 40px;
        }

        .hrtrain .trainp{
            margin-top: 5px;
        }

        .hrtrain .certip{
            margin-left: 400px;
        }

        .hremployee .employee{
            float: left;
          width: 200px;
          padding: 0px;
          margin-top: 35px;
        }

        .hremployee .name{
           margin-left: 230px;
          width: 200px;
          padding: 0px;
         
        }

        .hremployee .employeedate{
          margin-left: 460px;
          width: 200px;
          
        }

        .hremployee1 .name1{
            margin-left: 140px;
        }

        .hremployee1 .employeedate1{
            margin-left: 160px;
        }

        
    </style>
</head>
<body>
    
    
    <div class="studentone page-break">
        <div id="header" style="margin-bottom: 10px;">
            <h1 class="text-center">Myanmar IT Consulting</h1>
            <hr class="myan">
            <div class="clear"></div>       
        </div>
        
        

        <div id="content" style="margin-top: 25px; margin-bottom: 50px;">
            <div class="content_rowone">
                <h2 class="text-center">Absence Information</h2>
                <p class="text-center" style="margin-top: 7px;"> <i>  </i> </p>
                <p class="text-center" style="margin-top: 20px;">  </p>
            </div>

            <div class="content_rowtwo" style="margin-top: 2px;">
               
                 <p style="margin: 10px 0;">
                    <span style="width: 150px; display: inline-block;"> Name of Applicant </span>
                    <span> : </span>
                    <span>{{$studentname}}</span>
                </p>

                <p style="margin: 10px 0;">
                    <span style="width: 150px; display: inline-block;"> Date of Absence </span>
                    <span> : </span>
                    <span> {{$absencedate}} </span>
                </p>

                <p style="margin: 10px 0;">
                    <span style="width: 150px; display: inline-block;"> Campus </span>
                    <span> : </span>
                    <span> {{$coursename}} </span>
                </p>

                <p style="margin: 10px 0;">
                    <span style="width: 150px; display: inline-block;"> Batch </span>
                    <span> : </span>
                    <span> {{$batchname}} </span>
                </p>
            </div>

            <div class="content_rowthree" style="margin-top: 30px;">
               <h3>Type of Absence</h3>
               <hr class="type">

               <div class="row">
                  <div class="column">
                    <input type="radio" name="fullday" style="vertical-align: middle; margin: 0px;">
                    Full Day
                  </div>
                  <div class="column">
                    <input type="radio" name="moringhalf" style="vertical-align: middle; margin: 0px;">
                    Morning Half Day
                  </div>
                  <div class="column">
                   <input type="radio" name="eveninghalf" style="vertical-align: middle; margin: 0px;">
                    Evening Half Day
                  </div>
                </div>
                <div class="clear"></div>

                <div class="row">
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Sick
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Personal Discretionary
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Bereavement
                    </label>
                  
                </div>
                <div class="clear"></div>
                <div class="row">
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Sick Family
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Vacation
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Graduation
                    </label>
                  
                </div>

                 <div class="clear"></div>
                <div class="row">
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Injury
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Religious Reason
                    </label>
                    <label class="checkbox ">
                        <input class="input-checkbox " name="checkbox" id="checkbox" value="1" type="checkbox">
                        Others
                    </label>
                  
                </div>
                <div class="clear"></div>
                
            </div>

            <div class="content_rowfive" style="margin-top: 20px">
                <label>Explanation: <hr class="exp"></label>
                <hr class="exp1" style="margin-top: 20px">
                <hr class="exp1" style="margin-top: 20px">
            </div>

            <div class="content_rowsix" style="margin-top: 20px">
                <h3>သင်တန်းစည်းကမ်းချက်များ</h3>
                <p class="mm-font">Myanmar IT Consulting သင်တန်းေကျာင်း၏ ရည်ရွယ ချက်မ ာ C သင်တန်းတစ်ခ သာ တက်ေရာက်Fပီး အလEပ်တန်းဝင်L ငိE ေစရန် ြဖစ်ပါသည်။ ထိ ရည်ရွယ ချက်အတိ ငး ် လည်း သင်တန်းမC တာဝန်ယS သင်Tကားေပးသလေကျာင်းသားဘက်မ လည်း VကိWးစားရန်လ အပ်ပါသည်။</p>
                <li>သင်တန်း ပျက်ရက် (၂) ရက်ထက် မေကျာ်ေစရန် ဂ\Eတစိ က် တက်ေရာက်ရပါမည်။</li>
                <li>အေTကာင်းအထSး]CိေသာေTကာင ် ့ သင်တန်းပျက်က ကပါကလည်း VကိWတင် ဖEန း ် ဆက် အေTကာင်းTကားရမည်။</li>
                <li>ကျန်းမာေရး ၊ မိသားစE အေရးမC လွ မC သင်တန်းပျက်ရက် ( ၂ ) ရက်ေကျာ်ပါက Certificate ေပးအပ်မညမဟEတ ပ
                ါ။</li>
                
            </div>
            <div class="hrtrain">
                <hr class="train">
                
            </div>
            <div class="hrtrain">
                <hr class="certi">
                
            </div>
            <div class="clear"></div>
            <div class="hrtrain" >
                <span class="trainp">Signature Of Student</span>  
                <span class="certip">Date</span>  
            </div>

            <div class="clear"></div>

            <div class="content_rowfour">
                <div class="float_left" style="border: 1px solid #000; padding: 15px;">
                    <h3> <b>For Office Use Only: </b> </h3>
                    <p  style="margin-top:5px;margin-left: 30px;"> Approve / Endorse </p>
                    <p style="margin-top:5px;margin-left: 30px;">Disapprove / Not Endrose</p>
                    
                    <div class="hremployee">
                        <hr class="employee">
                        <hr class="name">
                         <hr class="employeedate">
                    </div>

                    <div class="hremployee1" style="margin-top: 10px;">
                        <span class="employee1">Employee Name</span>
                        <span class="name1">Employee Signature</span>
                        <span class="employeedate1">Date</span>
                    </div>
            
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div>

    </div>

    
    
</body>
</html>
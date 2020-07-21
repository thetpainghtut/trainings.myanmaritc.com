<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Grading PDF</title>
    <style>
        @import url('https://mmwebfonts.comquas.com/fonts/?font=padauk');

        @import url('https://mmwebfonts.comquas.com/fonts/?font=mon3');
        *
        {
            margin: 0;
            padding: 0;
        }
        body
        {

            padding: 20px 50px;
        }
        .mmfont
        {
            font-family: 'padauk' !important;
        }

        .mmfontold
        {
            font-family:padauk,Yunghkio,Myanmar3,'Masterpiece Uni Sans'  , sans-serif !important;
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
            margin-top: 25px;
            height: 120px;
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
            height: 1px; 
            width: 135px;
            background: black; 
            
        }

        .column {
          float: left;
          width: 160px;
          padding-top: 10px;
          padding-left: 35px;
          padding-right: 35px;
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
          margin-top: 20px;
           /* Should be removed. Only for demonstration */
        }

        .hrtrain .certi{
            float: right;
            width: 200px;
            padding: 0px;
            margin-top: 20px;
        }

        .hrtrain .trainp{
            margin-top: 2px;
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
                    <span> {{$totaldate}} </span>
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

            <div class="content_rowthree" style="margin-top: 20px;">
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
                <img src="absence_mm.png" style="width: 100%;">
                
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

                    <div class="hremployee1" style="margin-top: 1px;">
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
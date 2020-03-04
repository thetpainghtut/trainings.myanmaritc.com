<!DOCTYPE html>
<html>
<head>
	<title>Inquire Print</title>
	<meta charset="UTF-8">
	<!-- <link href="https://fonts.googleapis.com/css?family=Padauk&display=swap" rel="stylesheet"> -->


	<style>

		/*@font-face 
		{
		  font-family:'Unicode';
		  src: url('https://cdn.rawgit.com/LeonarAung/MyanmarFont/6cf1262f/mon3.woff') format('woff'), url('https://cdn.rawgit.com/LeonarAung/MyanmarFont/6cf1262f/mon3.ttf') format('ttf');
		}

		@font-face 
		{
		  font-family:'Pyidaungsu';
		  src: url("{{asset('Pyidaungsu.ttf')}}");
		}*/

		*
		{
			margin: 0;
			padding: 0;
			font-style: italic;
			font-family: 'Myanmar3';
			/*font-family: 'Padauk-Regular';*/
		}
		body
		{
			padding: 70px 70px;
			margin-top: 20px;
		}
		.header_one
		{
			float: left;
			margin-right: 50px;
			font-size: 25px;
		}
		.receive
		{
			float: left;
			margin-right: 0px;
			font-size: 25px;

		}
		.receiveno
		{
			font-size: 20px;
			margin-top: 8px;
			text-align: center;
		}
		.clear
		{
			clear: both;
		}
		.header_two
		{
			float: left;
			margin-right: 50px;

		}
		.date
		{
			float: left;
		}
		.header_three
		{
			float: left;
			margin-right:150px;
		}
		.invoice
		{
			float: left;
			margin-right: 50px;
		}
		.phone
		{
			float: left;
			margin-right: 50px;
		}
		.for
		{
			float: left;
		}
		#image
		{
			float: right;
		}
		.table
		{
			width: 650px;
		}


		/*.mmfont
		{
			font-family: 'Unicode';
		}*/

		.time
		{
			float: left;
			margin-right: 50px;
		}

		.paid
		{
			float: right;
			width: 140px;
			border-style: solid;
			text-align: center;
		}
		.footer
		{
			margin-left: 70px;
		}



	</style>
</head>
<body class="mmfont">
	<div class="header">
		<h3 class="header_one">Myanmar IT Consulting</h3>
		<h3 class="receive" style="color:#42c8f5;">Receive</h3>
		<p class="receiveno">{{$inquire->receiveno}}</p>
	</div>
	<div class="clear"></div>

	<div class="header">
		<p class="header_two">
		Myanmar IT Consulting, Room No 8-A,
		</p>
		<p class="date">DATE:</p>
		
	</div>
	<div class="clear"></div>

	<div class="header">
		<p class="header_three">MTP Condo, Insein Rd</p>
		<p class="invoice">INVOICE#</p>
		<p class="course_name" style="text-align: center;">{{$course_name}}</p>
	</div>
	<div class="clear"></div>
	<br> <br>
	<div class="header">
		<div class="phone">
			<p ></p><br>
			<p >Phone 09 772753242 / 097727506 03 / <br>
			 09 772750604 / 09 450675999</p>
			 <br>
			 <p>Email: info@myanmaritc.com</p>
		</div>
		<p class="for">FOR:</p>
		<img src="mmit_receivelogo_one.png" style="width: 150px; height: 150px" alt="" id="image">
		
	</div>
	<div class="clear"></div>	
	<br>
	<div class="header">
		<table class="" border="1" cellspacing="0">
			<tr>
				<th style="width: 325px; background: #42c8f5;">DESCRIPTION</th>
				<th style="width: 325px; background: #42c8f5;">AMOUNT</th>
			</tr>
			<tr>
				<td style="text-align: center;">Training Fees {{$inquire->name}}</td>
				<td> &nbsp; &nbsp; &nbsp;{{$course_fees}} Kyats</td>
			</tr>
			<tr>
				<td style="text-align: center;">Paid Amount ( {{ date('d-m-Y', strtotime($preinstallment_date)) }} )</td>
				<td> &nbsp; &nbsp; &nbsp; &nbsp;{{$preinstallment_amount}} Kyats</td>
			</tr>
			<tr>
				<td style="text-align: center;">Second Paid Amount ( {{date('d-m-Y',strtotime($payment_date))}} )</td>
				<td>&nbsp; &nbsp; &nbsp;{{$need_amount}} Kyats</td>
			</tr>
			<tr>
				<td style="text-align: center;">Due</td>
				<td>&nbsp; &nbsp; &nbsp;0</td>
			</tr>
		</table>
	</div>
	<br>
	<div class="remark">
		<p> <i style="font-family:'Myanmar3'"> မှတ်ချက် - သင်တန်းအပ်ပြီး ပြန်ထွက်လျှင် သင်တန်းကြေး ပြန်မပေးပါ။ </i> </p>
		
	</div>
	<br><br>
	<div class="header">
		<div class="time">
			<p>Training start Date : {{$batch->startdate}}
				<br> Time : ( {{$batch->time}} )</p>
		</div>
		<div class="paid">
			<p >PAID</p>
		</div>
	</div>
	<div class="clear"></div>
	<br><br>
	<div class="footer">
		<p>Bank Account Information :</p>
		<br>
		<p>CB Bank ATM Card Accountant  &nbsp;- &nbsp;&nbsp;0002 6001 0011 0329</p>
		<br>
		<p>AYA Bank ATM Card Accountant  &nbsp;- &nbsp;&nbsp;0063 2010 1000 9409</p>
		<br>
		<p>KBZ Bank ATM Card Accountant  &nbsp;- &nbsp;&nbsp;999 307 999 2846 6801</p>
		<br>
		<p>Account Holder Name : U Yan Myoe Aung</p>
		<br>
		<h2>THANK YOU FOR YOUR BUSINESS!</h2>
	</div>


</body>
</html>
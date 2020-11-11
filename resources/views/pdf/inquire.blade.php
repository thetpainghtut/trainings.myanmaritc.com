<!DOCTYPE html>
<html>
<head>
	<title>Inquire Print</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<meta charset="utf-8">
	<style>
		*
		{
			margin: 0;
			padding: 0;
			font-style: italic;
		}

		body
		{
			padding: 70px 70px;
			margin-top: 20px;
		}

		.mmfont
		{
			font-family: 'Zawgyi_One';
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

		.inquire
		{
			float: left;
			margin-right: 0px;
			font-size: 25px;

		}
		.inquireno
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
		.date1
		{
			margin-right: 50px; 
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
<body>
	<div class="header">
		<h3 class="header_one">Myanmar IT Consulting</h3>
		<h3 class="receive" style="color:#42c8f5;">Receive</h3>
		<p class="receiveno">{{ $data['receiveno'] }}</p>
	</div>
	<div class="clear"></div>

	<div class="header">
		<p class="header_two">
		Myanmar IT Consulting, Room No 8-A,
		</p>
		<p class="date">DATE:</p>
		<p class="date1">{{ $data['todaydate'] }}</p>
	</div>
	<div class="clear"></div>

	<div class="header">
		<p class="header_three">MTP Condo, Insein Rd</p>
		<p class="invoice">INVOICE#</p>
		<p class="course_name" style="text-align: center;">{{ $data['coursename'] }}</p>
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
			 <br>
			 <h3 class="inquire" style="color:#42c8f5;">Inquire No:</h3>
			 <p class="inquireno" style="color:#42c8f5;">{{ $data['inquireno'] }}</p>
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
				<td style="text-align: center;">Training Fees {{ $data['studentname'] }}</td>
				<td> &nbsp; &nbsp; &nbsp;{{ number_format($data['coursefees']) }} Kyats</td>
			</tr>
			@php $pay_amount =0; @endphp
			@foreach($data['paidamounts'] as $paidamount)
				@php
					$amount = $paidamount->amount;
					$paiddate = $paidamount->paiddate;
					$type = $paidamount->type;
					$courseFees = $data['coursefees'];
                    $symbol = $paidamount->symbol;

					$pay_amount += $amount;


					if ($symbol ==1) {
                        if ($courseFees == $pay_amount) {
                            $installmentTitle = 'Full Installment';
                        }
                        else{
                            $installmentTitle = 'First Installment';
                        }
                    }
                    else if ($symbol ==2) {
                        if ($courseFees == $pay_amount) {
                            $installmentTitle = 'Last Installment';
                        }
                        else{
                            $installmentTitle = 'Second Installment';
                        }
                    }
                    else if ($symbol ==3) {
                        if ($courseFees == $pay_amount) {
                            $installmentTitle = 'Last Installment';
                        }
                        else{
                            $installmentTitle = 'Third Installment';
                        }
                    }
                    else {
                        if ($courseFees == $pay_amount) {
                            $installmentTitle = 'Full Installment';
                        }
                        else{
                            $installmentTitle = 'Last Installment';
                        }
                    }

				@endphp
				<tr>
					<td style="text-align: center;"> {{ $installmentTitle }} ( {{ $paiddate }} )</td>
					<td> &nbsp; &nbsp; &nbsp; &nbsp;{{ number_format($amount)}} Kyats</td>
				</tr>

			@endforeach

			@php 
			$due_amount = $data['coursefees'] - $pay_amount;

			@endphp

			<tr>
				<td style="text-align: center;">Due</td>
				<td>&nbsp; &nbsp; &nbsp;{{ number_format($due_amount) }} Kyats</td>
			</tr>
		</table>
	</div>
	<br>
	<div class="remark">

		<p class="mmfont">
			မွတ္ခ်က္ - သင္တန္းအပ္ၿပီး ျပန္ထြက္လွ်င္ သင္တန္းေၾကး ျပန္မေပးပါ။
		</p>
		
	</div>
	<br><br>
	<div class="header">
		<div class="time">
			<p>Training start Date : {{ $data['batchdate'] }}
				<br> Time : ( {{ $data['batchtime'] }} )</p>
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
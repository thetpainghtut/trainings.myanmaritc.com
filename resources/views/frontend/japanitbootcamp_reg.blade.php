@extends('registertemplate')

@section('content')

	<div class="card o-hidden border-0 shadow-lg my-5" id="termsandcondition">
	    <div class="card-body p-0">
	        <!-- Nested Row within Card Body -->
	        <div class="row">
	          	<div class="col-lg-12 p-5">
		            <h3> Japanese and IT Bootcamp <span class="mmfont"> စည်းကမ်းချက်များ </span> </h3>

		            <div class="mt-4">
	              		<ol>
	                		<li class="mt-3">  Myanmar IT Consulting Japanese and IT Bootcamp <span class="mmfont"> သင်တန်း၏ရည်ရွယ်ချက်မှာ နည်းပညာတက္ကသိုလ်မှ ဘွဲ့ရများကို ဂျပန်နိုင်ငံတွင် အိုင်တီပညာရှင်အနေဖြင့် အလုပ် လုပ်ကိုင်နိုင်စေရန် လေ့ကျင့်သင်ကြားပေးပြီး အင်တာဗျူးချိတ်ဆက်ပေးကာ </span> Work Visa <span class="mmfont"> ရရှိသည်အထိ ကူညီပေးရန် ဖြစ်ပါသည်။ ထိုရည်ရွယ်ချက်အတိုင်း သင်တန်းမှ စခန်းသွင်းလေ့ကျင့် သင်ကြားပေးသလို ကျောင်းသားဘက်မှ လည်း အချိန်ပြည့် ကြိုးစားအားထုတ်မှူလိုအပ်ပါသည်။</span> </li>
	                		
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းကာလ အတွင်း လစဉ် စုစုပေါင်း သင်တန်းတက်ရက် ၇၅% အနည်းဆုံးပြည့်မှီရန် လိုအပ်ပြီး ပျက် မှူအား သင်တန်းမှ ပြန်လည်သင်ကြားပေးမည် မဟုတ်ပါ။ ၂၅% အထက်ပျက်ကွက်ပါကလည်း သင်တန်းမှ ထုတ်ပယ်ခြင်းကို ခံရမည်ဖြစ်ပြီး သင်တန်းကြေးပြန်လည် ထုတ်ပေးမည် မဟုတ်ပါ။ </span>
	                		</li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းသားများ အရည်အချင်းတိုးတက်စေရန် နေ့စဉ်အပတ်စဉ် လစဉ် စာမေးပွဲများ ဖြေဆိုရခြင်း </span> ၊ Assignment <span class="mmfont"> များ ပြုလုပ်ရခြင်းများကို မပျက်ကွက်စေရန် သင်တန်းသားဘက်မှ တာဝန်ယူရပါမည်။ </span>
	                		</li>
	                		
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းချိန်အတွင်း ဖုန်းအသုံးပြုခြင်းကို တားမြစ်ထားပြီး သင်ကြားမှူလိုအပ်ချက်အရ ဆရာ၏ ခွင့်ပြုချက် ရမှသာ သုံးခွင့်ရှိပါသည်။ သင်တန်းချိန်အတွင်း ဖုန်း </span> silent <span class="mmfont">  လုပ်ထားရပါမည်။ </span>
	                		</li>

	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းသားအားလုံးကို သင်တန်းကာလတွင် ဂျပန်စာ </span> JLPT N3 <span class="mmfont"> အောင်မြင်စေရန် နှင့် အိုင်တီလုပ်ငန်းခွင် အင်တာဗျူးများ ဖြေဆိုနိုင်စေရန် စာပေ သင်ကြားရေးသာမက ဗဟုသုတ နှင့် ယဉ်ကျေးမှူ ၊ လုပ်ငန်းခွင် တွင်း ပြုမှူပြောဆိုပုံများကိုပါ ဂရုတစိုက် သင်ကြားပေးမည်။ ဂျပန် အိုင်တိလုပ်ငန်းခွင်တွင် ဝင်ရောက်လုပ်ကိုင်ရန် ဂျပန်စာကျွမ်းကျင်မှူ အနေဖြင့် အနည်းဆုံး </span> JLPT N3 Level <span class="mmfont"> အောင်မြင်ရန်လိုအပ်ပါသည်။ သင်တန်းမှလည်း </span> N3 Level <span class="mmfont"> အောင်မြင်မှသာ အလုပ်ရှာဖွေပေးမည်ဖြစ်ပါသည်။
	                  		</span>
	                		</li>
	                
	                		<li class="mt-3"> 
	                  		<span class="mmfont"> စာမေးပွဲဖြေဆိုရာတွင် </span>  JLPT <span class="mmfont"> စာမေးပွဲကြေးများကို သင်တန်းမှ တစ်ကြိမ်ကျခံပေးမည် ဖြစ်ပြီး စာမေးပွဲ မအောင်မြင်ပါက သင်တန်းသားဘက်မှ စာမေးပွဲကြေးထပ်မံကျခံပြီး ဖြေဆိုရပါမည်။ သင်တန်းဘက်မှ </span> N3 <span class="mmfont">မအောင်မချင်း လေ့ကျင့်သင်ကြားပေးမည်။ </span>
	                		</li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> အလုပ်ရှာဖွေပေးသည့်အစီအစဉ်ကို </span> N3 <span class="mmfont"> ဖြေဆိုပြီးသည့်အခါတွင် စတင်မည်ဖြစ်ပြီး အင်တာဗျူးချိန်းဆို မှူများ ဖြေဆိုရမည်။ ကျောင်းသား၏ထူးချွန်မှူပေါ်မူတည်ပြီး အခါအားလျော်စွာ </span> N4 <span class="mmfont"> ဖြေဆိုပြီးချိန် တွင်လည်း အင်တာဗျူးများရှိနိုင်သည်။ </span>
	                		</li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းသား၏ လစဉ်တိုးတက်မှူ </span> Report <span class="mmfont"> ကို အုပ်ထိန်းသူထံ လစဉ်ပေးပို့သွားမည်ဖြစ်ပြီး အားနည်းချက်များ လိုအပ်ချက်များရှိပါက အုပ်ထိန်းသူထံ အချိန်နှင့်တပြေးညီ အကြောင်းကြားဆွေးနွေးပေးသွားမည်ဖြစ်ပါသည်။
	                  		</span>
	                		</li>

	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းတက်ရောက်နေစဉ် အဆင်မပြေမှူများရှိပါက သင်တန်းတာဝန်ခံဖုန်းနံပါ ၀၉၇၇၂၇၅၀၅၀၂ ၊ ၀၉၇၇၂၇၅၀၅၀၃ ၊ ၀၉၇၇၂၇၅၀၅၀၄ ကို ဆက်သွယ်အကြောင်းကြားနိုင်ပြီး သင်တန်းမှ အဆင်ပြေစေရန် လိုအပ်သလို ဆွေးနွေးညှိ နှိူင်းဖြေရှင်းပေးမည် ဖြစ်ပါသည်။
	                  		</span>
	                		</li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းသား၏ကျွမ်းကျင်မှူ အားနည်းချက် ၊ အင်တာဗျူးဖြေဆိုရာတွင် အားနည်းချက်များ ရှိခြင်းကြောင့် သင်တန်းသားအနေဖြင့် အင်တာဗျူးမအောင်မြင်သော ကိစ္စများလည်း ဖြစ်ပေါ်နိုင်ပါသည်။ ထိုပြဿနာ များမှာ သင်တန်းသား၏ အားနည်းချက် နှင့်သာ သက်ဆိုင်ပါကြောင်း ကြိုတင်သိစေအပ်ပါသည်။
	                  		</span>
	                		</li>
	                
	                		<li class="mt-3">
			                Myanmar IT Consulting  <span class="mmfont">သင်တန်းကျောင်းသည် တာဝန်ယူမှူ တာဝန်ခံမှူနှင့် အတူ သင်တန်းသားများ အားလုံးကို ဂရုတစိုက် သင်ကြားပေးရန် တာဝန်ယူမည်ဖြစ်ပြီး သင်တန်းသားဘက်မှ အစွမ်းကုန် ကြိုးစားလေ့ကျင့် သင်ယူစေရန် တာဝန်ယူရမည်။ </span>
			                </li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းသားဘက်မှ အကြောင်းအမျိုးမျိုးကြောင့် သင်တန်းဆက်မတက်လိုပါက သင်တန်းကြေးကို ပြန်လည်ထုတ်ပေးမည် မဟုတ်ပါ။ </span>
	                		</li>
	              		</ol>

	              		<div class="form-group form-check-inline mt-5 ml-3">
	                		<input type="checkbox" class="form-check-input" id="exampleCheck1">
	                		<label class="form-check-label mmfont" for="exampleCheck1"> အထက်ပါစည်းကမ်းချက်များကို သိရှိနားလည်လက်ခံပြီး သင်တန်းအပ်နှံပါသည်။ </label>
	              		</div>
	            	</div> 
	          	</div>
	          
	        </div>
	    </div>
    </div>

    <div class="card o-hidden border-0 shadow-lg my-5" id="inquireform">
	    <div class="card-body p-0">
	        <div class="row">
		        <div class="col-lg-12 py-5">
		            <div class="p-5">
			            <div class="text-center">
			                <h1 class="h4 text-gray-900 mb-4"> Welcome to MMIT </h1>
			            </div>
		              
		              	<form class="user" action="{{route('frontend.student.register')}}" method="POST">
		              		@csrf

		              		@php
							$status_session=session('status');
							@endphp

							@if(session('status'))
					          	<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
					            	<strong>{{ session('status') }}</strong>
					            	
					            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					              		<span aria-hidden="true">&times;</span>
					            	</button>
					          	</div>
					        @endif


			                <div class="form-group">
			                  	<input type="number" class="form-control form-control-user" name="inquire_no" id="inquire_no" placeholder="Enter Your Receive Number">
			                </div>

			                <div class="form-group">
			                	<label> <u> Student Admission Requirements </u> </label>

			                	<div class="form-check">
									<input class="form-check-input" type="radio" name="studenttype" id="Freshmen" value="0">
								  	<label class="form-check-label" for="Freshmen">
								    	Freshmen
								    	<small class="mmfont ml-3"> ( ကျောင်းသားအသစ် ) </small>
								  	</label>
								  	
								</div>

								<div class="form-check">
									<input class="form-check-input" type="radio" name="studenttype" id="transfer" value="1">
								  	<label class="form-check-label" for="transfer">
								    	Transfer Stduent
								    	<small class="mmfont ml-3"> ( ကျောင်းသားအဟောင်း ) </small>
								  	</label>
								  	

								</div>

								<div class="form-check">
								  	<input class="form-check-input" type="radio" name="studenttype" id="senior" value="1">
								  	<label class="form-check-label" for="senior">
								    	Senior and Higher Level Student
								    	<small class="mmfont ml-3"> ( ကျောင်းသားအဟောင်း ) </small>
								  	</label>
								</div>

								<div id="checkMail">
									<hr>
									<div class="form-group" id="mailDiv">
			                			<label class="mmfont"> သင်တန်းတွင် register လုပ်ဘူးသော Email ကို ထည့်ပေးပါ </label>

					                  	<input type="email" class="form-control form-control-user" name="old_email" id="old_email" placeholder="Enter Your Email">
					                  	<i class="fas fa-spinner fa-spin iconInput fa-lg loading"></i>
					                  	<i class="fas fa-check-circle text-success iconInput fa-lg successed"></i>
					                  	<div id="successDiv" class="ml-2 text-success">
											You are our old student. Keep Going!
										</div>

										<div id="failDiv" class="ml-2 text-danger">
											You're email doesn't exist. Please Keep Going!
										</div>
					                </div>
					            </div>

			                </div>

			                <button type="submit" class="btn btn-facebook btn-user btn-block">
			                	Keep Going
			                </button>
		              	</form>
		              
		            </div>
		        </div>
	        </div>
	    </div>
    </div>

@endsection

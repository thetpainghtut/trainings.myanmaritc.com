@extends('registertemplate')

@section('content')

	<div class="card o-hidden border-0 shadow-lg my-5" id="termsandcondition">
	    <div class="card-body p-0">
	        <!-- Nested Row within Card Body -->
	        <div class="row">
	          	<div class="col-lg-12 p-5">
		            <h3> Python Training <span class="mmfont"> စည်းကမ်းချက်များ </span> </h3>

		            <div class="mt-4">
	              		<ol>
	                		<li class="mt-3">  Myanmar IT Consulting <span class="mmfont"> သင်တန်းကျောင်း၏ ရည်ရွယ်ချက်မှာ သင်တန်းတစ်ခုသာ တက်ရောက်ပြီး အလုပ်တန်းဝင်နိုင်စေရန် ဖြစ်ပါသည်။ ထိုရည်ရွယ်ချက်အတိုင်းလည်း သင်တန်းမှ တာဝန်ယူ သင်ကြားပေးသလို ကျောင်းသားဘက်မှလည်း ကြိုးစားရန် လိုအပ်ပါသည်။ </li>
	                		
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းပျက်ရက် ( ၂ ) ရက်ထက် မကျော်စေရန် ဂရုစိုက်တက်ရောက်ရပါမည်။ အကြောင်းထူးရှိသောကြောင့် သင်တန်းပျက်ကွက်လိုပါကလည်း ကြိုတင် ဖုန်းဆက် အကြောင်းကြားရမည်။ ကျန်းမာရေး ၊ မိးသားစု အရေးမှ လွဲမှ သင်တန်းပျက်ရက် ( ၂ ) ရက်ကျော်ပါက </span>  Certificate <span class="mmfont"> ပေးအပ်မည်မဟုတ်ပါ။ အလုပ်လည်း ရှာပေးမည်မဟုတ်ပါ။  သင်တန်းမှ ထုတ်ပယ်ခြင်းကို ခံရမည်ဖြစ်ပြီး သင်တန်းကြေးပြန်လည် ထုတ်ပေးမည် မဟုတ်ပါ။  </span>
	                		</li>
	                
	                		<li class="mt-3">
	                  		<span class="mmfont"> သင်တန်းချိန်အတွင်း ဖုန်းအသုံးပြုခြင်းကို တားမြစ်ထားပြီး သင်ကြားမှူလိုအပ်ချက်အရ ဆရာ၏ ခွင့်ပြုချက် ရမှသာ သုံးခွင့်ရှိပါသည်။ သင်တန်းချိန်အတွင်း ဖုန်း </span> silent <span class="mmfont"> လုပ်ထားရပါမည်။
	                  		</span>
	                		</li>
	                
	                		<li class="mt-3"> 
	                  		<span class="mmfont"> သင်တန်းတက်ရောက်နေစဉ် အဆင်မပြေမှူများရှိပါက သင်တန်းတာဝန်ခံ ဖုန်း ၀၉၇၇၂၇၅၀၅၀၂ ၊ ၀၉၇၇၂၇၅၀၅၀၃ သို့ ဆက်သွယ်အကြောင်းကြားနိုင်ပြီး သင်တန်းမှ အဆင်ပြေစေရန် အကောင်းဆုံးဖြေရှင်း ပေးမည် ဖြစ်ပါသည်။ </span>
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

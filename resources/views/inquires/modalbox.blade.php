    @isset($batch)
    
    <div class="modal detail_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquire Deatail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-5 offset-md-1">Inquire NO:</label>
                        <div class="col-md-6">
                            <p class="inquire_no"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Receive No:</label>
                        <div class="col-md-6">
                            <p class="receive_no"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Name:</label>
                        <div class="col-md-6">
                            <p class="inquire_name"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Gender:</label>
                        <div class="col-md-6">
                            <p class="inquire_gender"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Phone:</label>
                        <div class="col-md-6">
                            <p class="inquire_phone"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Installment Date:</label>
                        <div class="col-md-6">
                            <p class="installment_date"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Installment Amount:</label>
                        <div class="col-md-6">
                            <p class="installment_amount"></p>
                        </div>
                    </div>
          
                    <div class="row">
                        <label class="col-md-5 offset-md-1">Knowledge:</label>
                        <div class="col-md-6">
                            <p class="knowledge"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Camp:</label>
                        <div class="col-md-6">
                            <p class="inquire_camp"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Education:</label>
                        <div class="col-md-6">
                            <p class="education"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Accepted year:</label>
                        <div class="col-md-6">
                            <p class="acceptedyear"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Batch:</label>
                        <div class="col-md-6">
                            <p class="inquire_batch"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Message:</label>
                        <div class="col-md-6">
                            <p class="message"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal install_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Installment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <form id="First_Installment">
                    @csrf
                        <input type="hidden" name="id" id="install_id">
                        <div class="modal-body">

                            <div class="row my-3">
                                <label class="col-md-4 offset-md-1" for="installment">{{ $batch->course->name }} - </label>
                                <div class="col-md-7">
                                    <p> {{ number_format($batch->course->fees) }} Ks </p>
                                </div>
                            </div>

                            <div class="row my-3">
                                <label class="col-md-4 offset-md-1 mmfont" for="installment">ပေးရန်ကျန်ငွေ - </label>
                                <div class="col-md-7">
                                    <span id="edit_install_balance" class="d-none"></span>

                                    <p id="edit_install_fees" class="d-none"> {{ number_format($batch->course->fees) }} Ks </p>

                                </div>
                            </div>


                            <div class="row my-3">
                                <label class="col-md-4 offset-md-1" for="installment_date"> Payment Method </label>
                                <div class="col-md-7 mb-3" id="form-group-installment_date">
                                    <select class="form-control js-example-basic-single" name="payment" id="paymentMethod">
                                        <option>Choose Bank</option>
                                        <option data-img_src="{{ asset('payment/cash.jpg') }}" value="Cash Money"> Cash Money </option>
                                        <option data-img_src="{{ asset('payment/aya_bank.png') }}" value="AYA"> AYA Bank </option>
                                        <option data-img_src="{{ asset('payment/cb_bank.png') }}" value="CB">CB Bank</option>
                                        <option data-img_src="{{ asset('payment/kbz_bank.png') }}" value="KBZ"> KBZ Bank </option>
                                        <option data-img_src="{{ asset('payment/k_pay.png') }}" value="KBZ Pay"> K Pay </option>
                                        <option data-img_src="{{ asset('payment/wavemoney.png') }}" value="Wave Money"> Wave Money </option>
                                        <option data-img_src="{{ asset('payment/wavepay.png') }}" value="Wave Pay"> Wave Pay </option>

                                        <option data-img_src="{{ asset('payment/mab_bank.png') }}" value="MAB Bank"> MAB Bank </option>

                                        <option data-img_src="{{ asset('payment/yoma_bank.png') }}" value="Yoma Bank"> Yoma Bank </option>

                                        <option data-img_src="{{ asset('payment/agd_bank.png') }}" value="AGD Bank"> AGD Bank </option>

                                        <option data-img_src="{{ asset('payment/onepay.png') }}" value="One Pay"> One Pay </option>

                                        <option data-img_src="{{ asset('payment/mpt_money.jpg') }}" value="MPT Money"> MPT Money </option>

                                        <option data-img_src="{{ asset('payment/truemoney.png') }}" value="True Money"> True Money </option>

                                        <option data-img_src="{{ asset('payment/visa.png') }}" value="Visa"> Visa </option>

                                        <option data-img_src="{{ asset('payment/master.png') }}" value="Master"> Master </option>

                                        <option data-img_src="{{ asset('payment/paypal.png') }}" value="PayPal"> PayPal </option>

                                        <option data-img_src="{{ asset('payment/jcb.png') }}" value="JCB"> JCB </option>
                                    </select>
                                    <span class="text-danger show-error"></span>
                                </div>
                            </div>
                            
                            @php
                                $date = date('Y-m-d');
                            @endphp

                            <div class="row my-3">
                                <label class="col-md-4 offset-md-1" for="installment_date">Installment Date </label>
                                <div class="col-md-7" id="form-group-installment_date">
                                    <input type="date" class="form-control" id="installment_date" name="installment_date" value="{!! $date !!}">
                                    <span class="text-danger show-error"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 offset-md-1" for="installment_amount">Installment Amount</label>
                                <div class="col-md-7" id="form-group-installment_amount">
                                    <input type="number" class="form-control" id="installment_amount" name="installment_amount">
                                    <span class="text-danger show-error"></span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal paymenthistory_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <span id="paymenthistory_sname"></span> 's Payment History </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <div class="modal-body">
                    
       
                    <div class="row" id="installmentDiv">
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> OK </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal postpone_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Postpone </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <form id="post_pone_insert">
                    @csrf
                        <input type="hidden" name="id" id="postpone_id">
                        <div class="modal-body">
                
                            <div class="row my-3">
                                <div class="col-md-10 offset-1" id="form-group-postpone">
                                    <label for="postpone">Postpone Message</label>
                               
                                    <textarea type="text" class="form-control" id="postpone" name="postpone" ></textarea>
                                    <span class="text-danger show-error"></span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    @endif


@section('script')
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:30px;height:30px;\"/><p style=\"font-weight: 700;display:inline;margin-left:10px;\">" + text + "</p></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
            // allowClear: true,
            theme: 'bootstrap4',
        }
        $('.js-example-basic-single').select2(options);
        // $('.select2-container--default .select2-selection--single').css({'height': '220px'});


            function showValidationErrors(name, error) {
                var group = $("#form-group-" + name);
                group.addClass('has-error');
                group.find('.show-error').text(error);
            }

            function clearValidationError(name) {
                console.log(name);
                var group = $("#form-group-" + name);
                group.removeClass('has-error');
                group.find('.show-error').text('');
            }

            $("#installment_date").on('change', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $("#installment_amount").on('keyup', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $("#postpone").on('keyup', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('tbody').on('click','.inquire_detail',function(){
                var inquireno = $(this).data('inquireno');
                var receiveno = $(this).data('receiveno');
                var name = $(this).data('name');
                var gender = $(this).data('gender');
                var phone = $(this).data('phone');
                var installmentdate = $(this).data('installmentdate');
                var installmentamount = $(this).data('installmentamount');
                var knowledge = $(this).data('knowledge');
                var camp = $(this).data('camp');
                var education = $(this).data('education');
                var acceptedyear = $(this).data('acceptedyear');
                var batch = $(this).data('batch');
                var message = $(this).data('message');
                
                $('.inquire_no').text(inquireno);
                $('.receive_no').text(receiveno);
                $('.inquire_name').text(name);
                $('.inquire_gender').text(gender);
                $('.inquire_phone').text(phone);
                $('.installment_date').text(installmentdate);
                $('.installment_amount').text(installmentamount);
                $('.knowledge').text(knowledge);
                $('.inquire_camp').text(camp);
                $('.education').text(education);
                $('.acceptedyear').text(acceptedyear);
                $('.inquire_batch').text(batch);
                $('.message').text(message);
                $('.detail_modal').modal('show');
            })

            $('#First_Installment').submit(function(event){
                event.preventDefault();
                var install_data = new FormData(this);

                console.log("payment");

                $.ajax({
                    type:'POST',
                    url:'{{ route('firstpayment')}}',
                    data:install_data,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if(data){
                            $('.install_modal').modal('hide');
                            location.reload();
                        }
                    },
                    error: function(error) {
                        if(error.status == 422){
                            var errors = error.responseJSON;
                            var data = errors.errors;
                
                            $.each(data,function(i,v){
                                showValidationErrors(i,v);
                            })
                            $('.install_modal').modal('show');
                        }
              
                    }
                })
            })
        
            $('tbody').on('click','.edit_install',function(){

                var id = $(this).data('id');
                var balance = $(this).data('balance');

                console.log(balance);

                $('#install_id').val(id);
          
                $('.install_modal').modal('show');

                if (balance == 0) {
                    $('#edit_install_fees').removeClass('d-none');
                    $('#edit_install_fees').addClass('d-block');

                    $('#edit_install_balance').removeClass('d-block');
                    $('#edit_install_balance').addClass('d-none');

                }
                else{
                    $('#edit_install_balance').removeClass('d-none');
                    $('#edit_install_balance').addClass('d-block');

                    $('#edit_install_fees').removeClass('d-block');
                    $('#edit_install_fees').addClass('d-none');

                    $("#edit_install_balance").html('<span>'+CommaFormatted(balance.toString())+' Ks</span>');

                }
                
            });

            $('tbody').on('click','.payment_history',function(){

                var id = $(this).data('id');
                var name = $(this).data('name');

                paymenthistoryFn(id);

                $('#paymenthistory_sname').text(name);
                
          
                $('.paymenthistory_modal').modal('show');
            });

            

            $('tbody').on('click','.postpone',function(){
                var id = $(this).data('id');
                $('#postpone_id').val(id);
                $('.postpone_modal').modal('show');
            })

            $('#post_pone_insert').submit(function(event){
                event.preventDefault();
                var postpone_data = new FormData(this);

                $.ajax({
                    url:"{{route('postpone.store')}}",
                    data:postpone_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                        if(data){
                            $('.postpone_modal').modal('hide');
                            location.reload();
                        }
                    },
                    error: function(error) {
                        if(error.status == 422){
                            var errors = error.responseJSON;
                            var data = errors.errors;
                
                            $.each(data,function(i,v){
                                showValidationErrors(i,v);
                            })
                            $('.postpone_modal').modal('show');
                        }
              
                    }
                })
            });

            function CommaFormatted(amount) 
            {
                var delimiter = ","; // replace comma if desired
                var a = amount.split('.',2)
                var i = parseInt(a[0]);
                
                if(isNaN(i)) 
                {
                    return ''; 
                }
                
                var minus = '';
                
                if(i < 0) 
                {
                    minus = '-'; 
                }
                
                i = Math.abs(i);
                var n = new String(i);

                var a = [];
                
                while(n.length > 3) {
                    var nn = n.substr(n.length-3);
                    a.unshift(nn);
                    n = n.substr(0,n.length-3);
                }

                if(n.length > 0) 
                { 
                    a.unshift(n); 
                }
                n = a.join(delimiter);

                amount = minus + amount;

                // console.log(n);

                return n;

            }
        })
    </script>
@endsection
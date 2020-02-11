@extends('backendtemplate')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Income / Expense Report</h4>
                </div>
                <div class="card-body">
                    <form class="mb-4">
                        <div class="form-row">
                            <div class="col-md-4">
                              <select class="form-control" name="month" id="month">
                                <option disabled value="">Please Select Month</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="year" id="year">
                                    <option disabled value="">Please Select Year</option>
                                    @foreach($years as $year)
                                      <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-1">
                              <input type="button" class="btn btn-primary" value="Search"  onclick="Search()">
                            </div>
                        </div>
                    </form>

                    <table class="table table-sm table-bordered my-3">
                        <tbody>
                            <tr>
                                <td class="table-dark">Admin Name:</td>
                                <td>Yin Min Ei</td>
                                <td class="table-dark">Dept:</td>
                                <td>YGN - MPT Office</td>
                            </tr>
                            <tr>
                                <td class="table-dark">Email:</td>
                                <td>yinmin@gmail.com</td>
                                <td class="table-dark">Month:</td>
                                <td id="monthly"></td>
                            </tr>
                            <tr>
                                <td class="table-dark">Phone No:</td>
                                <td>09876543</td>
                                <td class="table-dark">Year:</td>
                                <td id="yearly"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-sm table-bordered">
                        
                    </table>
                </div>
            </div>

             <div class="card-body" id="reportcard">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Expense</th>
                          </tr>
                        </thead>
                        <tbody id="detailexport">
                          
                        
                        </tbody>
                        
                      </table>
                    </div>
                  </div>

        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function Search()
  {
    var month = $('#month').val();
    var year = $('#year').val();
    $('#monthly').text(month);
    $('#yearly').text(year);

     $.ajax({
      url: "detailsearch",
      type: "post",
      data: { month : month,year:year },
      success: function(data){
        var j=1; var html=""; var sum = 0; let sum1=0;  let sub = 0;
        $.each(data.result,function(i,v){
          var type = v.type;
          var description = v.description;
          var date = v.date;
          var amount = v.amount;
           sum += parseInt(amount);
          html+= `<tr><td class="resultid">${j++}</td><td class="resultid">${type}</td><td class="resultid">${description}</td><td class="resultid">${date}</td><td class="resultid">${amount}</td></tr>`;
        })
        html+=`<tr><th colspan="4" class="resultid">Total Expense</th><td class="resultid">${sum}</td></tr>`;

        $.each(data.iresult,function(i,v){
          sum1 += (parseFloat(v.amount));
        })
        html+=`<tr><th colspan="4" class="resultid">Total Income</th><td class="resultid">${sum1}</td></tr>`;
        sub = sum1-sum;
        html+=`<tr><th colspan="4" class="resultid">Balance</th><td class="resultid">${sub}</td></tr>`;
        if(data.result.length>0){
          html+=`<tr><td colspan="5" align="center"><input type="button" value="Report" class="btn btn-primary report"></td></tr>`;
        }
        $('#detailexport').html(html);
      }
    });

  }

  $('#detailexport').on('click','.report',function(){
    var month = $('#month').val();
    var year = $('#year').val();
    window.location.href="/export/" + month + '/' + year;
  })

</script>
@endsection

<style type="text/css">
#total{
    margin-left:835px;
}
#income{
    margin-left:835px;
}
#reportbutton{
    margin-left:900px;
}
.resultid{
    text-align:center;
}

</style>

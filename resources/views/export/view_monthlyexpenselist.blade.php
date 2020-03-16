<table>
    <thead> 
    <tr>
      <th colspan="4" style="text-align: center; font-size: 12px; background-color: #A8D08D">{{$month}}-{{$year}}(Income-Expense)</th>
    </tr>
  </thead>
</table>

@if($generalcount > 0)
<table>
    <thead> 
    <tr>
      <th colspan="4" style="font-size: 12px;background-color: #f2f2f2">For General</th>
    </tr>
    <tr>
        <th style="text-align: center;color: #ff0000">No.</th>
        <th style="text-align: center;color: #ff0000">Expense Description</th>
        <th style="text-align: center;color: #ff0000">Expense Date</th>
        <th style="text-align: center;color: #ff0000">Expense Amount</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      ?>
   @foreach ($generals as $general)
        <tr>
          <td style="text-align: center;">{{$i}}</td>
          <td>{{$general->edescription}}</td>
          <td>{{ $general->edate }}</td>
          <td>{{ $general->eamount }}</td>
        </tr>
        <?php
        $i++;
        ?>
    @endforeach
     <tr>
      <th colspan="3" style="text-align:center; font-size: 12px; color: #000000">General Expense</th>
      <td>{{$generaltotal}}</td>
    </tr>
    </tbody>
</table>
@endif


@if($hrcount > 0) 
<table>
    <thead>
    <tr>
      <th colspan="4" style="font-size: 12px;background-color: #f2f2f2">For HR</th>
    </tr>  
    <tr>
        <th style="text-align: center;color: #ff0000">No.</th>
        <th style="text-align: center;color: #ff0000">Expense Description</th>
        <th style="text-align: center;color: #ff0000">Expense Date</th>
        <th style="text-align: center;color: #ff0000">Expense Amount</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      ?>
   @foreach ($hrs as $hr)
        <tr>
          <td style="text-align: center;">{{$i}}</td>
          <td>{{$hr->edescription}}</td>
          <td>{{ $hr->edate }}</td>
          <td>{{ $hr->eamount }}</td>
        </tr>
        <?php
        $i++;
        ?>
    @endforeach
     <tr>
      <th colspan="3" style="text-align:center; font-size: 12px;color: #000000">HR Expense</th>
      <td>{{$hrtotal}}</td>
    </tr>
    </tbody>
</table>
@endif


@if($recruitmentcount > 0)
<table>
    <thead>  
    <tr>
      <th colspan="4" style="font-size: 12px;background-color: #f2f2f2">For Recruitment</th>
    </tr> 
    <tr>
        <th style="text-align: center;color: #ff0000">No.</th>
        <th style="text-align: center;color: #ff0000">Expense Description</th>
        <th style="text-align: center;color: #ff0000">Expense Date</th>
        <th style="text-align: center;color: #ff0000">Expense Amount</th>
    </tr> 
    </thead>
    <tbody>
      <?php
      $i=1;
      ?>
   @foreach ($recruitments as $recruitment)
        <tr>
          <td style="text-align: center;">{{$i}}</td>
          <td>{{$recruitment->edescription}}</td>
          <td>{{ $recruitment->edate }}</td>
          <td>{{ $recruitment->eamount }}</td>
        </tr>
        <?php
        $i++;
        ?>
    @endforeach
    <tr>
      <th colspan="3" style="text-align:center; font-size: 12px;color: #000000">Recruitment Expense</th>
      <td>{{$recruitmenttotal}}</td>
    </tr>
    </tbody>
</table>
@endif


@if($phpcount > 0)
<table>
    <thead>
    <tr>
      <th colspan="4" style="font-size: 12px;background-color: #f2f2f2">For PHP</th>
    </tr>
    <tr>
        <th style="text-align: center;color: #ff0000">No.</th>
        <th style="text-align: center;color: #ff0000">Expense Description</th>
        <th style="text-align: center;color: #ff0000">Expense Date</th>
        <th style="text-align: center;color: #ff0000">Expense Amount</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      ?>
   @foreach ($phps as $php)
        <tr>
          <td style="text-align: center;">{{$i}}</td>
          <td>{{$php->edescription}}</td>
          <td>{{ $php->edate }}</td>
          <td>{{ $php->eamount }}</td>
        </tr>
        <?php
        $i++;
        ?>
    @endforeach
     <tr>
      <th colspan="3" style="text-align:center; font-size: 12px;color: #000000">PHP Expense</th>
      <td>{{$phptotal}}</td>
    </tr>
    </tbody>
</table>
 @endif

<table>
    <thead>
    <tr>
      <th colspan="4" style="font-size: 12px;background-color: #f2f2f2">For Income</th>
    </tr>
    <tr>
        <th style="text-align: center;color: #ff0000">No.</th>
        <th style="text-align: center;color: #ff0000">Income Description</th>
        <th style="text-align: center;color: #ff0000">Income Date</th>
        <th style="text-align: center;color: #ff0000">Income Amount</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      ?>
   @foreach ($incomeresults as $incomeresult)
        <tr>
          <td style="text-align: center;">{{$i}}</td>
          <td>{{$incomeresult->idescription}}</td>
          <td>{{ $incomeresult->idate }}</td>
          <td>{{ $incomeresult->iamount }}</td>
        </tr>
        <?php
        $i++;
        ?>
    @endforeach
     <tr>
      <th colspan="3" style="text-align:center; font-size: 12px;color: #000000">Total Received:</th>
      <td>{{$incomeexpense}}</td>
    </tr>
    </tbody>
</table>

<table>
  <thead>
    <tr>
      <th colspan="3" style="text-align: center; font-size: 12px;color: #000000">Total Expense:</th>
      <td>{{$totalexpense}}</td>
    </tr>
    <tr>
      <th colspan="3" style="text-align: center; font-size: 12px;color: #000000">Change:</th>
      <td>{{$change}}</td>
    </tr>
  </thead>
</table>

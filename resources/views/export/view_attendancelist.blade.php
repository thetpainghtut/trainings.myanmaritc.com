
<table class="table table-hover my-3">      
  <tbody>
  <?php if(count($ggcountt)=='7'){?>
      <tr>
        <td class="table-secondary" colspan="8" style="text-align: center">
          {{$name}}
        </td>
      </tr>
      <?php
}else{?>
    <tr>
        <td class="table-secondary" colspan="7" style="text-align: center">
          {{$name}}
        </td>
      </tr>
      <?php
}?>
      <tr>
        <td width="10"></td>
    
    
     
    @foreach($groups as $group)
       <?php
       $ggroup[]=$group;
       ?>
        <td style="text-align: center;" width="25" height="15">{{ $group->sname }}</td>
      
       @endforeach
      
      </tr>

      <?php
      if(count($ggroup)=='7'){
      $weekends=[];
      foreach ($Date as $key => $value) {

        if ($value->format('N') >= 6) {
          $weekends[$value->format('Y-m-d')] = $value->format('D');
          ?>
          <tr>
            <td style="text-align: center; background-color: #ffad33" colspan="8">{{$value->format('Y-m-d')}}</td>
            </tr><?php
          }
          else{
            ?>
            <tr><td style="text-align: center;">{{$value->format('Y-m-d')}}</td></tr>
            <?php
          }

        }
      }
  else{
      $weekends=[];
      foreach ($Date as $key => $value) {

        if ($value->format('N') >= 6) {
          $weekends[$value->format('Y-m-d')] = $value->format('D');
          ?>
          <tr>
            <td style="text-align: center; background-color: #ffad33" colspan="7">{{$value->format('Y-m-d')}}</td>
            </tr><?php
          }
          else{
            ?>
            <tr><td style="text-align: center;">{{$value->format('Y-m-d')}}</td></tr>
            <?php
          }

        }
  }
        
    # code...
        ?>
  
  
  
  </tbody>
</table>


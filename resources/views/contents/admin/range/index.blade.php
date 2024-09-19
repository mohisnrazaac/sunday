@extends('layouts.admin')

@section('content')

<div class="container px-5">  

    <div class="main-container mt-5">
        <span class="cyber_range_heading_bg">Cyber Range / <span class="primary-color">Systems</span></span>
    </div>
        
        
      <div class="main_announcement container ">
         
          <div style="margin-bottom: 1px">
            <label class="cyber_range_bg" for="editor"><i>&nbsp;</i></label> 
          </div>   
          
      
     
     
    
          
           <table id="rc_table" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>System Name</th>
                    <th>Team Assigned</th>
                    <th>IP Address</th>  
                    <th style="text-align: right">User Action</th> 
                </tr>
            </thead>
            <tbody> 
            <?php $randomDesc = array("Graduate Student", "Test Conducted for PDS", "PD New", "Test Conducted for PDPDTest-1", "PD New");
            $arrayLength = count($randomDesc);
    
    
                    for ($x = 0; $x <= 50; $x++)  { 
                        $randomIndex = rand(0, $arrayLength - 1);
                    ?>
                <tr>
                    <td><?php     echo $randomDesc[$randomIndex]; ?></td> 
                    <td>Red Team</td> 
                    <td><?php echo generatePhoneNumber(); ?></td>
                    <td> 
    
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('range.view_range') }}" type="submit" class=" mx-2  rc-btn button-green">Enter System</a> 
                    </div>
    
    
                    </td> 
                </tr> 
            <?php } ?>
            </tbody> 
        </table>
     
       
     
     
          
          <div class="d-flex flex-row-reverse">
          <button type="submit" class="rc-btn button-green">Submit</button>
          </div>  
         
      </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
 
    new DataTable('#rc_table');
</script> 



<?php 

function generatePhoneNumber() {
  $phoneNumber = ''; // Assuming US country code
  for ($i = 0; $i < 10; $i++) {
      $phoneNumber .= mt_rand(0, 9); // Append random digits
      if ($i == 2 || $i == 5) {
          $phoneNumber .= '.'; // Add dashes at appropriate positions
      }
  }
  return $phoneNumber;
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>

    ::-webkit-scrollbar {
  display: none;
}
          table.scrolldown { 
            width: 100%;
            border-spacing: 0; 
            border: 5px solid black; 
        }
        table.scrolldown tbody, table.scrolldown thead { 
            display: block; 
        }  
         thead tr th { 
            width: 200px;  
        }           
        table.scrolldown tbody {                
            width:100%; 
            height:240px;
            overflow-y: scroll;   
        }  
        td { 
          width: 200px; 
          text-align:center; 
        } 
</style>

<div class="card">
<div class="container">
    <h3 class="card-title">Timestamp alarm list</h3>
    <div class="table-responsive-sm table table-hover">
        <table class="scrolldown">
            <thead>
              <tr>
                <th style="text-align:center" class="table-dark">Timestamp</th>
                <th style="text-align:center" class="table-dark">Component</th>
                <th style="text-align:center" class="table-dark">Reason for alarm</th>
                <th style="text-align:center" class="table-dark">Nature</th>
                <th style="text-align:center" class="table-dark">Sensor type</th>
                <th style="text-align:center" class="table-dark">range</th>
                <th style="text-align:center" class="table-dark">Alarm type</th>              
              </tr>
            </thead>
<tbody>
<?Php 
$f = fopen("copy.csv", "r");
$fr = fread($f, filesize("copy.csv"));
fclose($f);
$lines = array();
$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 

for($i=count($lines)-2;$i>=count($lines)-7;$i--)
{
    
    $cells = array(); 
    $cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
    echo "<tr>";
    for($k=0;$k<count($cells);$k++)
    {
      if($k!=1 && $k!=7) 
      echo "<td>".$cells[$k]."</td>";
      if($k==7) 
      echo "<td bgcolor='".$cells[1]."'>".$cells[$k]."</td>";
    }
    // for k end
    echo "</tr>";
}
// for i end
/* echo "</table></body></html>"; */
?> 

</tbody> 
          </table>
      </div>
     </div> 


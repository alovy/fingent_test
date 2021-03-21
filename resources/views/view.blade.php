<!DOCTYPE html> 
<html> 
  
<head> 
    <!-- Import bootstrap cdn -->
    <link rel="stylesheet" href= 
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity= 
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"> 
  
    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity= 
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"> 
    </script> 
      
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
        integrity= 
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
        crossorigin="anonymous"> 
    </script> 
</head> 
  
<body> 
    <div class="container mt-2 ml-2"> 
        <div class="col-sm-10"> 
            <div class="row">
                <div class="col-md-6">
                    <h3>Invoice Lists</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('create') }}">Generate Invoice</a>
                </div>
            </div>
                
            <div class="form-group row"> 
                <?php if(empty($data)){ ?>
                <h4>No Data Available </h4>
                <?php }else{ ?>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($data as $item) { ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->customer_name; ?></td>
                        <td><?php echo $item->total; ?></td>
                        <td><a href="{{ url('preview/'.$item->id) }}">Preview</a></td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
       
</body>
  
</html> 
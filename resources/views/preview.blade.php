<!DOCTYPE html> 
<html> 
  
<head> 
    <!-- Import bootstrap cdn -->
    <link rel="stylesheet" href= 
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity= 
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"> 
      
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
        integrity= 
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
        crossorigin="anonymous"> 
    </script> 
</head> 
  
<body> 
    <div class="container col-md-8"> 
        <div class="row" style="background:#fff; margin:auto;box-shadow: 3px -11px 71px -7px rgba(0,0,0,0.31); padding:20px 15px;">
            <table style="width:100%">
               
                <tr >
                    <td  style="font-family: SegoeUI;">Contact Details:<br>
                        <span style="font-size: 15px;">
                            <b style="font-family: SegoeUI; ">{{ $invoice->customer_name }}</b> 
                        </span> <br>
                        
                        <span style="font-family: SegoeUI; font-size: 14px; padding-top: 10px; display: block;">
                            {{ $invoice->customer_contact }}
                            <br>
                            {{ $invoice->customer_email }}
                        </span>
                    </td>
                    <td colspan="2" align="right">
                        <table style="width:100%;margin-top: 10px;">
                            <tr>
                                <td style="text-align: right; font-family: SegoeUI; padding: 10px 0px; font-size: 14px" align="right"><b>Invoice Date: </b></td>
                                <td style="text-align: right; font-family: SegoeUI; padding: 10px 0px; font-size: 14px" align="right">{{@date($invoice->created_at)}}</td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
            </table> 
            <table style="width:100%;margin-top: 10px;">
                <tr style="background: #2975c1;">
               
                    <th align="left" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff;  width: 20%;">Item Name</th>
                    
                    <th align="left" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff; width: 10%; ">Quantity</th>
                    <th align="right" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff;  width: 20%;text-align: right;">Unit Price</th>
                    
                    <th align="right" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff;  width: 20%;text-align: right;">Amount</th>
                    
                    <th align="left" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff; width: 10%; text-align: right;">Tax Percentage</th>
              
                    <th align="right" style="padding: 10px 5px; font-size: 14px; font-family: SegoeUI; color: #fff;  width: 20%;text-align: right;">Total</th>
                </tr>
    
                @foreach($invoice->items as $item)
                  <tr>
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px;">{{ $item->item_name }}</td>
              
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px; text-align: right;">{{ $item->quantity }}</td>
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px; text-align: right;">{{ $item->unit_price }}</td>
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px; text-align: right;">{{ $item->amount }}</td>
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px; text-align: right;">{{ $item->tax_percent }}</td>
                        <td style="padding: 10px 5px;  font-family: SegoeUI; font-size: 14px; text-align:right;">{{ $item->total }}</td>
                  </tr>
                  
                @endforeach
            </table> 
            <table style="width:100%;margin-top: 10px;">
                    <tr >   
                        <td align="right" style="width: 50%; padding: 10px 5px;"></td>
                        <td align="right" style="width: 30%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">Sub Total</td>
             
                        <td align="right" style="width: 20%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">{{ $invoice->sub_total}}</td>
                    </tr>
                    <tr >   
                        <td align="right" style="width: 50%; padding: 10px 5px;"></td>
                        <td align="right" style="width: 30%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">Sub Total without Tax</td>
             
                        <td align="right" style="width: 20%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">{{ $invoice->amount}}</td>
                    </tr>

                    <tr >   
                        <td align="right" style="width: 50%; padding: 10px 5px;"></td>
                        <td align="right" style="width: 30%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">Discount Type</td>
             
                        <td align="right" style="width: 20%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">{{ ($invoice->discount_type == 'P') ? 'Percentage' : 'Amount'}}</td>
                    </tr>
                    <tr >   
                        <td align="right" style="width: 50%; padding: 10px 5px;"></td>
                        <td align="right" style="width: 30%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">Grant Total</td>
             
                        <td align="right" style="width: 20%; padding: 10px 5px; font-family: SegoeUI; font-size: 14px;">{{ $invoice->total }}</td>
                    </tr>

                <tr>
                    <td style="width: 50%; padding: 10px 5px;"></td>
                    <td colspan="2" style="width: 20%; padding: 10px 5px;font-family: SegoeUI; font-size: 14px; text-align:right; " align="right"><small >Note: Amount is displayed in $</small></td>
                </tr>
               
            </table>

            <table width="100" style="width: 100%; text-align:right" align="right">
                <tr>
                    <td style=" text-align: right;padding: 70px 200px 10px 0px; font-family: SegoeUI; font-size: 13px"align="right">Authorised Signature: </td>
                </tr>
            </table> 
       
        </div>
    </div>
</body>
  
</html> 
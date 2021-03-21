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
    <form action="store" method="post">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="form-group row"> 
            <div class="col-sm-10"> 
                <div class="form-group row"> 
                    <label for="description" 
                        class="col-sm-5 col-form-label"> 
                        Customer Name 
                    </label> 
                    <div class="col-sm-7"> 
                        <input type="text" name="customer_name" 
                            class="form-control"> 
                            
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label for="description" 
                        class="col-sm-5 col-form-label"> 
                        Customer Contact 
                    </label> 
                    <div class="col-sm-7"> 
                        <input type="text" name="customer_contact" 
                            class="form-control"> 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label for="description" 
                        class="col-sm-5 col-form-label"> 
                        Customer Email 
                    </label> 
                    <div class="col-sm-7"> 
                        <input type="text" name="customer_email" 
                            class="form-control"> 
                    </div> 
                </div> 
               
                <h2>Items</h2>
                <div class="form-group row">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Amount</th>
                            <th>Tax rate</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                        <td><input type="text" name="items[0][item_name]" 
                            class="form-control" > </td>
                            <td><input type="text" name="items[0][quantity]" 
                            class="form-control quantity" onchange="sum(this);"> </td>
                            <td><input type="text" name="items[0][unit_price]" 
                            class="form-control unit_price" onchange="calcPrice(this);"> </td>
                            <td><input type="text" name="items[0][amount]" 
                                class="form-control amount"> </td>
                            <td><select name="items[0][tax_percent]" class="form-control tax" onchange="calcTax(this);">
                            <option value="" selected>Tax</option>
                                    <?php foreach ($tax['taxes'] as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="text" name="items[0][total]" 
                            class="form-control total"> </td>
                        
                        </tr>
                        <tr>
                            <td><input type="text" name="items[1][item_name]" 
                            class="form-control"> </td>
                            <td><input type="text" name="items[1][quantity]" 
                            class="form-control quantity"  onchange="sum(this);"> </td>
                            <td><input type="text" name="items[1][unit_price]" 
                            class="form-control unit_price" onchange="calcPrice(this);"> </td>
                            <td><input type="text" name="items[1][amount]" 
                                class="form-control amount"> </td>
                            <td><select name="items[1][tax_percent]" class="form-control tax" onchange="calcTax(this);">
                                    <option value="" selected>Tax</option>
                                    <?php foreach ($tax['taxes'] as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="text" name="items[1][total]" 
                            class="form-control total"> </td>
                        
                        </tr>
                        
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="3">
                                <table>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td><input type="text" name="sub_total" 
                                        class="form-control" id="subtotalTax"> </td>
                                    </tr>
                                    <tr>
                                        <td>Sub Total without Tax</td>
                                        <td><input type="text" name="amount" 
                                        class="form-control" id="subtotal"> </td>
                                    </tr>
                                    <tr>
                                        <td>Discount Type</td>
                                        <td><select name="discount_type" class="form-control" id="discountType">
                                            <option value="P" selected>Percentage</option>
                                            <option value="A">Amount</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td><input type="text" name="discount" 
                                        class="form-control" id="discount" onchange="subTotal()"> </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Grant Total</td>
                                        <td><input type="text" name="total" 
                                        class="form-control" id="grantTotal"> </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="row"> 
                    <div class="col-sm-5"></div> 
                    <div class="col-sm-7"> 
                        <button type="submit" 
                            class="btn btn-success btn-md"> 
                            Save 
                        </button> 
                    </div> 
                </div> 
            </div> 
        </div> 
        </form>
    </div> 
    <script>
        function sum(obj) {
            var qty = $(obj).val();
            var unit_price = $(obj).parent().next().find('.unit_price').val();
            var tax = $(obj).parent().next().next().next().find('.tax').val() || 0;
            if (unit_price !== undefined && unit_price != "") {
                var total = qty * unit_price * (100 - tax) / 100;  
                var amount = qty * unit_price;
                $(obj).parent().next().next().next().next().find(".total").val(total);
                $(obj).parent().next().next().find(".amount").val(amount);
            }
            subTotal();
        }
        function calcTax(obj){
            var qty = $(obj).parent().prev().prev().prev().find('.quantity');
            sum(qty);
        }

        function calcPrice(obj){
            var qty = $(obj).parent().prev().find('.quantity');
            sum(qty);
        }
        
        function subTotal(){
            var subTotal = 0;
            var amountTotal = 0;
            $(".total").each(function() {
                subTotal += parseFloat( $( this ).val() || 0 );
            });
            $(".amount").each(function() {
                amountTotal += parseFloat( $( this ).val() || 0 );
            });
            $("#subtotalTax").val(subTotal);
            $("#subtotal").val(amountTotal);
            var discountType = $("#discountType").val()
            var discount = $("#discount").val() || 0;
            if( discountType == 'P' ){
                var grantTotal = subTotal * (100 - discount)/100;
            } else {
                var grantTotal = subTotal  - discount;
            }
            
            $("#grantTotal").val(grantTotal);
            
        }
    </script>
</body> 
  
</html> 
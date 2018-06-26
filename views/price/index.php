<div class="container" style="margin-top: 50px">
    <h2>Car Insurance Calculation</h2>

    <form id="price-form" method="post" action="" role="form">

        <div class="alert alert-info">
            <span style="display:none" id="now">
            </span>
            <p>Base % from car value: 11%<br>
                <span style="font-size:14px;">(Fridays at 15-20 o&rsquo;clock&nbsp;- 13%)</span><br>
                Currently: <span style="font-size:14px;" id="base"></span>%
            </p>
        </div>

        <div class="controls">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price">Estimated value of the car: </label>
                        <input type="text" id="carprice" name="carprice" oninput="objCal.validate();" value="<?php echo $data['carprice']; ?>" class="form-control" placeholder="Please enter price of the car *" required="required" data-error="Price is required.">
                        <input type="hidden" id="baseprice" name="baseprice"/> 
                        <input type="hidden" id="commission" name="commission" value="<?php echo $data['commision']; ?>"/> 
                        <div class="help-block with-errors" id="error-carprice"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tax">Tax percentage (%):</label>
                        <input id="tax" type="number" min="1" max="100" name="tax" oninput="objCal.validate();" value="<?php echo $data['tax']; ?>" class="form-control" placeholder="Please enter tax *" required="required" data-error="Tax is required.">
                        <div class="help-block with-errors" id="error-tax"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="instalments"> Number of instalments (1-12):</label>
                        <input id="instalments" type="number" min="1" max="12" oninput="objCal.validate();" value="<?php echo $data['instalments']; ?>"  name="instalments" class="form-control" placeholder="Please enter  instalments*" required="required" data-error="Instalments is required.">
                        <div class="help-block with-errors" id="error-inst"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="margin-top: 20px;">

                        <button id="button"class="btn btn-success btn-send"  onclick="objCal.submitForm();return false;" value="calculate" disabled>Calculate</button>

                    </div>
                </div>
            </div>
        </div>



    </form>

    <div class="container" style="<?php echo $data['displayTable']; ?>"> 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Instalment</th>
                    <th>Base premium</th>
                    <th>Tax</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                <?php for ($i = 0; $i < $data['instalments']; $i++) { ?>

                    <tr>
                        <td><?php echo $i+1;?></td>
                        <td><?php printf("%.2f", $data['basepremium']); ?></td>
                        <td><?php printf("%.2f", $data['commisionvalue']); ?></td>
                        <td><?php printf("%.2f", $data['taxValue']); ?></td>
                        <td><?php printf("%.2f", $data['termtotal']); ?></td>
                    </tr>

                <?php } ?>
                    
                 <tr class="table-active">
                        <td>Grand Total:</td>
                        <td><?php printf("%.2f", $data['baseTotal']); ?></td>
                        <td><?php printf("%.2f", $data['commissionTotal']); ?></td>
                        <td><?php printf("%.2f", $data['taxTotal']); ?></td>
                        <td><?php printf("%.2f", $data['total']); ?></td>
                    </tr>


            </tbody>
        </table>

    </div>

</div> 

<script>
    var settings = {
        'baseprice':<?php echo $data['baseprice'];?>,
        'custprice':<?php echo $data['custprice'];?>,
        'custday':<?php echo $data['custday'];?>,
        'custminHR':<?php echo $data['custminHR'];?>,
        'custmaxHR':<?php echo $data['custmaxHR'];?>,
        'priceMin':<?php echo $data['priceMin'];?>,
        'priceMax':<?php echo $data['priceMax'];?>,
        'taxMin':<?php echo $data['taxMin'];?>,
        'taxMax':<?php echo $data['taxMax'];?>
        }
    var objCal = new Calculator(settings);
    objCal.getBasePrice();
</script>
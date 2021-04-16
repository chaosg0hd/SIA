<?php include 'db_connect.php' ?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<h5><b><small>Table No. : 1</b></h5>
		<p>Order Date : 2021-4-16</p>
		<p>Order Time : 9:00 AM</p>
		<p>Order Status : Pending</p>
	</div>
    <div class="table-responsive">
		<table class="table invoice-items">
			<thead>
                <tr class="h4 text-dark">
                    <th id="cell-id"     class="text-semibold">#</th>
                    <th id="cell-item"   class="text-semibold">Item Name</th>
                    <th id="cell-price"  class="text-left text-semibold">Price</th>
                    <th id="cell-qty"    class="text-center text-semibold">Quantity</th>
                    <th id="cell-total"  class="text-center text-semibold">Subtotal</th>
                </tr>
			</thead>
			<tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-semibold text-dark">Fried Chicken</td>
                        <td>₱80</td>
                        <td class="text-center">2</td>
                        <td class="text-center">₱160</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="text-semibold text-dark">Fried Rice</td>
                        <td>₱45</td>
                        <td class="text-center">2</td>
                        <td class="text-center">₱90</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-semibold text-dark">Blueberry Cheesecake</td>
                        <td>₱180</td>
                        <td class="text-center">2</td>
                        <td class="text-center">₱360</td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="invoice-summary">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <table class="table h5 text-dark">
                    <tbody>
                        <tr class="h4">
                            <td colspan="2">Grand Total</td>
                            <td class="text-left">₱610</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>
<style type="text/css">

</style>
<script>

</script>
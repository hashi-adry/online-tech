<?php include('includes/header.php'); ?>
<php session_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4>Mpesa Payment Requests</h4>
                    <hr>
                    <form action="MpesaProcessor.php" method="GET">
                        <div class="row">
                            <div class="col">
                            <input type="text" name="amount" id="amount" placeholder="Enter the amount i.e. 20" class="form-control">
                            </div>
                            <div class="col">
                                <input type="text" name="number" id="number" placeholder="Enter the phone number i.e. 2547xxxxxxxx" class="form-control">
                            </div>
                        </div>
                        <div>&nbsp;</div>
                        <input type="submit" value="Request Payment" name="request_payment" id="request_payment" class="btn btn-outline-success  btn-sm">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
    
<?php require_once './includes/header.php'; ?>

<h1 class="center page-title"> <?= $title; ?> </h1>
	<!-- Row: Payment Form -->
	<div class="row">
            <form name="donate_form" action="thanks.php" method="post" class="form-horizontal col-sm-10 col-sm-offset-1">
               
                <!-- Name -->
                    <div class="form-group">
                        <label for="first_name" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="first_name" class="form-control" maxlength="20" size="20">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="last_name" class="form-control" maxlength="20" size="20">
                        </div>
                    </div>

                <!-- Credit Card -->
                <div class="form-group">
                    <label for="credit" class="col-sm-2 col-sm-offset-1 control-label">Credit Card #</label>
                    <div class="col-sm-6">
                        <input type="text" name="credit" class="form-control" maxlength="16" size="16">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exp" class="col-sm-2 col-sm-offset-1 control-label">Expiration</label>
                    <div class="col-sm-2">
                        <input type="text" name="exp" class="form-control">
                    </div>
                    <label for="ccv" class="col-sm-2 control-label">CCV</label>
                    <div class="col-sm-2">
                        <input type="text" name="ccv" class="form-control">
                    </div>
                </div> <!-- end form group -->

                <h5 style="text-align:center;">or</h5>


                <!-- Swiss Bank Account -->
                <div class="form-group">
                    <label for="account" class="col-sm-2 col-sm-offset-1 control-label">Swiss Bank Account #</label>
                    <div class="col-sm-6">
                        <input type="text" name="account" class="form-control" maxlength="16" size="16">
                    </div>
                </div>
                <br>
                <br>
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                    <button type="submit" name="btn_donate" class="btn btn-primary btn-lg btn-block" style="text-align:center;">Donate</button>
                </div>
            </form>
            <br>
	</div>

<?php require_once './includes/footer.php'; 
<footer class="footer">

 	<div class="container">
 	<p>&copy; BubblegumCombo 2020</p>

 	</div>

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-danger" id="loginAlert"> </div>
        <form>
        	<input type="hidden" id="loginActive" name="loginActive" value="1">
  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email address">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
		</form>
      </div>

            <div class="modal-footer">

      		<a button type="button" id="toggleLogin"> Sign up </a> 
      		



        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- this will go into js later -->
<script type="text/javascript">
	
	$("#toggleLogin").click(function() {

		if ($("#loginActive").val() == "1") {

			$("#loginActive").val("0");
			$("#loginModalTitle").html("Sign Up");
			$("#loginSignupButton").html("Sign Up");
			$("#toggleLogin").html("Login");
		} else {

			$("#loginActive").val("1");
			$("#loginModalTitle").html("Login");
			$("#loginSignupButton").html("Login");
			$("#toggleLogin").html("Sign up");
		}
	})

	$("#loginSignupButton").click(function() {

		$.ajax({
			type: "POST",
			url: "actions.php?action=loginSignup",
			data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
					success: function (result) {
						if (result == "1") {

							window.location.assign("http://localhost/stuff/turnip/index.php");
						} else {

							$("#loginAlert").html(result).show();

						}
					}

		})
	})
    
    // this shit right here fucks up. you'll see a red 1 then you have to go back to reload
    $("#postPriceButton").click(function() {
    
    $.ajax({
			type: "POST",
			url: "actions.php?action=postPrice",
			data: "turnipContent=" + $("#turnipContent").val(),
					success: function (result) {
						if (result == "1") {
                            
                            $("#tweetSucess").show();
                            $("#tweetFail").hide();
                            
                        } else if (result !=""){
                            
                            $("#priceFail").html(result).show();
                            $("#priceSuccess").hide();
                        }
					}

		})
})

</script>


  </body>
</html>
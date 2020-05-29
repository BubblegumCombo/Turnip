<footer class="footer">

 	<div class="container">
 	<p>&copy; BubblegumCombo 2020</p>

 	</div>

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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

      		<a id="toggleLogin"> Sign up </a> <!-- not working --> 
      		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- this will go into js later -->
<script type="text/javascript">
	
	$("toggleLogin").click(function() {

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
						alert(result);
					}

		})
	})

</script>


  </body>
</html>
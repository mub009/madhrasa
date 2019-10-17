<div class="modal-body">
	<div class="portlet light form-fit bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-social-dribbble font-green"></i>
				<span class="caption-subject font-green bold uppercase">Mahal Register</span>
			</div>
			<div class="actions">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" method="post" class="form-horizontal form-bordered" id="InsertForm" enctype="multipart/form-data">
				<div class="form-body">







					<div class="form-group" id="validation_Mahal_number_insert">
						<label class="control-label col-md-5 " style=" text-align:left;">Mahal Mobile Number <span class="required" aria-required="true"> * </span></label>
						<div class="col-md-7">
							<input type="text" class="form-control" id="Mahal_number" name="Mahal_number" maxlength="<?=$userinfo['TotalMobileNumberDigits']?>" placeholder="Enter Mahal Mobile Number"
							 autocomplete="off">
						</div>

					</div>

				</div>


		</div>
	</div>



</div>
<div class="modal-footer">
	<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
	<input type="submit" class="btn green" name='submit' id="insert" value="Save changes">
</div>
</form>




				<script>
					$("#insert").click(function (e) {

						e.preventDefault();

						var base_url = '<?=base_url()?>';

						var post_data = $("#InsertForm").serialize();

                       
					// console.log(post_data);
                    var flag;
						//has-error var me = $(this);
                        var me = $(this);
if (me.data('requestRunning')) {
    alert('Please Wait Your request is processing');
    return;
}
me.data('requestRunning', true);



						$.ajax({
							url: base_url + 'backend/admin/user/mahal/mahal/insert',
							type: 'POST',
							dataType: "json",
                            async: false,
							data: post_data + "&submit=true",
							success: function (data) {

                              if(data.statusCode==200)
							  {


							  }
							  else if(data.statusCode==400)
							  {

								  
						if (typeof data.data.Mahal_number != 'undefined') {

							$("#validation_Mahal_number_insert").addClass("has-error");

							$('#error_Mahal_number_insert').remove();

							$('#validation_Mahal_number_insert .col-md-7').append(
								"<span class='help-block' id='error_Mahal_number_insert'>" + data.data.Mahal_number + "</span>");
							} else {
							$("#validation_Mahal_number_insert").removeClass("has-error");

							$('#error_Mahal_number_insert').remove();

							$("#validation_Mahal_number_insert").addClass("has-success");


							}


							flag=false;

							  }

							},
							error: function (jqXhr) {

								var json = $.parseJSON(jqXhr.responseText);

								console.log(json);

                               flag=true;
                               me.data('requestRunning', false);
							},
                            
                           
             complete: function() {

			if(flag)
			{
				me.data('requestRunning', false);
			}
			else
			{
				me.data('requestRunning', true);
			}


     }
						});


					});
</script>





<div class="modal-body">
	<div class="portlet light form-fit bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-social-dribbble font-green"></i>
				<span class="caption-subject font-green bold uppercase">Update Dealer</span>
			</div>
			<div class="actions">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="" id="UpdateForm" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" class="form-control" name="id" id="edit_dealer_id">
				<div class="form-body">



					<div class="form-group" id="validation_dealer_number_update">
						<label class="control-label col-md-5" style=" text-align:left;">Dealer Mobile Number</label>
						<div class="col-md-7">

							<input type="text" class="form-control" id="edit_dealer_number" name="dealer_number" placeholder="Enter Dealer Mobile Number"
							 autocomplete="off" readonly>
						</div>
					</div>



					<div class="form-group" id="validation_dealer_status_update">
						<label class="control-label col-md-5" style=" text-align:left;">Dealer Status</label>
						<div class="col-md-7">

							<select name='dealer_status' id="editStatusList" class="form-control">

								<?php

foreach ($status as $row) {
    ?>
								<option value="<?=$row['Id']?>">
									<?=$row['Name']?>
								</option>
								<?php

}

?>
							</select>
						</div>
					</div>

					<!-- END FORM-->
				</div>
		</div>
	</div>


</div>
<div class="modal-footer">
	<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
	<input type="submit" class="btn green" name='update' id="update" value="Save changes">
</div>
</form>




<script>
	$("#update").click(function (e) {

		e.preventDefault();

		var base_url = '<?=base_url()?>';

		var post_data = $("#UpdateForm").serialize();

		//console.log(post_data);

		//has-error

		$.ajax({
			url: base_url + 'backend/admin/user/dealer/dealer/update',
			type: 'POST',
			dataType: "json",
            async: false,
			data: post_data + "&update=true",
			success: function (data) {

				location.reload();

			},
			error: function (jqXhr) {

				var json = $.parseJSON(jqXhr.responseText);

				console.log(jqXhr);


				if (json.dealer_status == 'undefined') {

					$("#validation_dealer_status_update").addClass("has-error");

					$('#error_dealer_status_update').remove();

					$('#validation_dealer_status_update .col-md-7').append(
						"<span class='help-block' id='error_dealer_status_update'>" + json.dealer_status + "</span>");
				} else {
					$("#validation_dealer_status_update").removeClass("has-error");

					$('#error_dealer_status_update').remove();

					$("#validation_dealer_status_update").addClass("has-success");


				}

				if (typeof json.dealer_number != 'undefined') {


					$("#validation_dealer_number_update").addClass("has-error");

					$('#error_dealer_number_update').remove();

					$('#validation_dealer_number_update .col-md-7').append(
						"<span class='help-block' id='error_dealer_number_update'>" + json.dealer_number + "</span>");

				} else {
					$("#validation_dealer_number_update").removeClass("has-error");

					$('#error_dealer_number_update').remove();

					$("#validation_dealer_number_update").addClass("has-success");


				}




			}
		});


	});


	//alert('active open');

	function editFunc(id) {

		var base_url = '<?=base_url()?>';

		$.ajax({
			url: base_url + 'backend/admin/user/dealer/dealer/details/' + id,
			type: 'get',
			dataType: 'json',
            async: false,
			success: function (response) {

				console.log(response);

				$("#edit_dealer_number").val(response[0].MobileNo);


				$("#edit_dealer_id").val(response[0].UserId);


	            $("#editStatusList").children('[value="' + response[0].StatusId + '"]').attr('selected', true);

				//edit_dealer_id

				// $("#editCountryList").children('[value="' + response[0].CountryId + '"]').attr('selected', true);

				// $("#edit_dealer_status").val(response.txt_attribute_notice);
			}

		});


	}


	editFunc("<?=$id?>");

</script>

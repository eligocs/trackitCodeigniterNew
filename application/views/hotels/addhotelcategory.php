<style>
	.input-large {
		width: 400px !important;
	}
</style>
<div class="page-container customer_content">
	<div class="page-content-wrapper">
		<div class="page-content">

			<?php $message = $this->session->flashdata('error');
			if ($message) {
				echo '<span class="help-block help-block-error1 red">' . $message . '</span>';
			} ?>

			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<?php
						if (!empty($category)) {
						?>
						<i class=""></i>Edit Hotel Category
						<?php
						} else {
						?>
						<i class="icon-plus"></i>Add Hotel Category
						<?php
						} ?>
					</div>
					<a class="btn btn-success" href="<?php echo site_url("hotelcategory"); ?>" title="Back">Back</a>
				</div>
			</div>
			<form role="form" id="addSeason" method="post"
				action="<?php echo site_url("hotelcategory/saveHotelCategory"); ?>">
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Category Name*</label>
								<input type="hidden" name="id" value="<?= !empty($category) ? $category->id : '' ?>" />
								<input type="text" required placeholder="Category Name. eg: 2 Star etc."
									name="hotel_category" class="form-control"
									value="<?= !empty($category) ? $category->hotel_category_name : '' ?>" />
							</div>
						</div>
					</div> <!-- row -->
					<div class="clearfix"></div>
					<hr>
					<div class="margiv-top-10">
						<button type="submit"
							class="btn green uppercase add_roomcategory"><?= !empty($category) ? 'Edit Category' : 'Add Category'; ?></button>
					</div>
			</form>
		</div><!-- portlet body -->
	</div> <!-- portlet -->
</div>
</div> 
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$("#addSeason").validate();
	});
</script>
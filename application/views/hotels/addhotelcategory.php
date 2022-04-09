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
				<div class="portlet-body custom_card">
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="form-group">
								<label class="control-label">Category Name*</label>
								<input type="hidden" name="id" value="<?= !empty($category) ? $category->id : '' ?>" />
								<input type="text" required placeholder="Category Name. eg: 2 Star etc." name="hotel_category" class="form-control" value="<?= !empty($category) ? $category->hotel_category_name : '' ?>" />
							</div>
						</div>
						<div class="col-md-12 my-2">
						   <button type="submit" class="btn green uppercase add_roomcategory"><?= !empty($category) ? 'Edit Category' : 'Add Category'; ?>
							</button>
						</div>
					</div> <!-- row -->
				</div><!-- portlet body -->
			</form>
		</div> <!-- portlet -->
	</div>
</div> 
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$("#addSeason").validate();
	});
</script>
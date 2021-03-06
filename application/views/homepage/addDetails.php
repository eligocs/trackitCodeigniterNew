<link href="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.min.js" type="text/javascript">
</script>
<script src="<?php echo base_url();?>site/assets/js/components-editors.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>site/assets/css/croppie.css">
<script src="<?php echo base_url(); ?>site/assets/js/croppie.js"></script>

<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                        <?php $message = $this->session->flashdata('success'); if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }									?>
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" class="form-horizontal form-bordered" method="post"
                                                    action="<?php echo base_url('homepage/update_Info') ?>">
                                                    <div class="row">
                                                    <!-- <div class="col-md-6"> -->
                                                        <h4>Hompage Info: </h4>
                                                        <?php $val=$data[0]; //dump($val);die; ?>
                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Logo Update:</label>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <input type="text" readonly class="form-control"
                                                                        name="logo_url"
                                                                        value="<?php if(isset($val->logo_url) && !empty($val->logo_url)){echo $val->logo_url; } ?>" />
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a class="btn btn-success"
                                                                        data-toggle="modal" href="#draggable">
                                                                        <i class="fa-solid fa-plus"></i> Add Logo
                                                                    </a>
                                                                </div>
                                                            </div>
                                                                <input type="hidden" class="form-control" name="id"
                                                                    value="<?php if(isset($val->id) && !empty($val->id)){echo $val->id; } ?>" />

                                                        </div>
                                                        
                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Fav icon Update:</label>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <input type="text" readonly class="form-control"
                                                                    name="favicon"
                                                                    value="<?php if(isset($val->favicon) && !empty($val->favicon)){echo $val->favicon; } ?>" />
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a class="btn btn-success"
                                                                    data-toggle="modal" href="#draggable1"><i class="fa-solid fa-plus"></i> Add Icon
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" class="form-control" name="id"
                                                            value="<?php if(isset($val->id) && !empty($val->id)){echo $val->id; } ?>" />
                                                            
                                                        </div>
                                                    
                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Video url*:</label>
                                                                <input type="text" class="form-control" name="video_url"
                                                                value="<?php if(isset($val->video_url) && !empty($val->video_url)){echo $val->video_url; } ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Review Api
                                                            Key:</label>
                                                                <input type="text" class="form-control" name="api_key"
                                                                value="<?php if(isset($val->api_key) && !empty($val->api_key)){echo $val->api_key; } ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Address:</label>
                                                                <input type="text" class="form-control" name="address"
                                                                value="<?php if(isset($val->address) && !empty($val->address)){echo $val->address; } ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Contact No:</label>
                                                                <input type="text" class="form-control" name="contact_no" value="<?php if(isset($val->contact_no) && !empty($val->contact_no)){echo $val->contact_no; } ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Website:</label>
                                                                <input type="text" class="form-control" name="website"
                                                                    value="<?php if(isset($val->website) && !empty($val->website)){echo $val->website; } ?>" />
                                                        </div>

                                                        <?php $counter= !empty($val->counter) ?  unserialize($val->counter) : '' ;  ?>
                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Counter1:</label>
                                                                <input type="text" class="form-control"
                                                                name="counter[count1]"
                                                                value="<?php if(isset($counter['count1']) && !empty($counter['count1'])){echo $counter['count1'];} ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Counter2:</label>
                                                                <input type="text" class="form-control"
                                                                name="counter[count2]"
                                                                value="<?php if(isset($counter['count2']) && !empty($counter['count2'])){echo $counter['count2'];} ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Counter3:</label>
                                                                <input type="text" class="form-control"
                                                                name="counter[count3]"
                                                                value="<?php if(isset($counter['count3']) && !empty($counter['count3'])){echo $counter['count3'];} ?>" />
                                                        </div>

                                                        <div class="form-group col-md-6 my-2">
                                                            <label class="control-label">Counter4:</label>
                                                                <input type="text" class="form-control"
                                                                name="counter[count4]"
                                                                value="<?php if(isset($counter['count4']) && !empty($counter['count4'])){echo $counter['count4'];} ?>" />
                                                        </div>
                                                    </div>
                                                        <div class="form-group my-2">
                                                            <div class="col-md-9">
                                                                <input type="submit" class="btn btn-primary" value="Save" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                                <div id="res_cmp"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PROFILE CONTENT -->
            <div class="modal fade draggable-modal ui-draggable in" id="draggable" tabindex="-1" role="basic"
                aria-hidden="true" style="display: none; padding-right: 17px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ui-draggable-handle">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">UpLoad Logo</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="addSlide" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Upload Image*</label>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div id="upload-demo" style="width:400px;"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-newa"> Click here to upload image </span>
                                                        <span class="fileinput-existss"> </span>
                                                        <input required id="image_url" type="file" name="image_url">
                                                    </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists"
                                                        data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>&nbsp;&nbsp;&nbsp;
                                                <span class='red'> Image size not bigger then 2 MB and dimensions(300px
                                                    X 60px).</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="button" class=" upload-result btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="modal fade draggable-modal ui-draggable in" id="draggable1" tabindex="-1" role="basic"
                aria-hidden="true" style="display: none; padding-right: 17px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ui-draggable-handle">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">UpLoad img</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" id="addSlide" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="fav" class="fav" name="fav">

                                    <div class="col-md-12">
                                        <label class="control-label">Upload Image*</label>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div id="upload-demo1" style="width:400px;"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-newa"> Click here to upload image </span>
                                                        <span class="fileinput-existss"> </span>
                                                        <input required id="image_url1" type="file" name="image_url1">
                                                    </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists"
                                                        data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                <span class="label label-danger">NOTE! </span>&nbsp;&nbsp;&nbsp;
                                                <span class='red'> Image size not bigger then 2 MB and dimensions(300px
                                                    X 60px).</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="button" class="upload-result1 btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>

</div>
<!-- END CONTENT BODY -->

<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 60,
        type: 'rectangle'
    },
    boundary: {
        width: 400,
        height: 150,
    }
});


$('#image_url').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});


$uploadCrop1 = $('#upload-demo1').croppie({
    enableExif: true,
    viewport: {
        width: 100,
        height: 40,
        type: 'rectangle'
    },
    boundary: {
        width: 400,
        height: 150,
    }
});

$('#image_url1').on('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        $uploadCrop1.croppie('bind', {
            url: e.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function(ev) {
    ev.preventDefault();
    var res = $("#addresEd"),
        ajaxReq;
    var name = $('#name').val();
    var id = $('#id').val();
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(resp) {
        $.ajax({
            url: "<?php echo base_url('homepage/do_upload'); ?>",
            type: "POST",
            data: {
                "image": resp,
                'name': name,
                'id': id
            },
            success: function(data) {
                console.log(data);
                if (data == "success") {
                    res.html(
                        '<div class="alert alert-success"><strong>Success: </strong> Logo successfully uploaded!</div>'
                        );
                    window.location.href = "<?php echo site_url("settings/homepage");?>";
                } else {
                    res.html(data);
                }
            },
            error: function(e) {
                //console.log(e);
                res.html(
                    '<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>'
                    );
            }
        });
    });
});


$('.upload-result1').on('click', function(ev) {
    ev.preventDefault();
    var res = $("#addresEd"),
	ajaxReq;
    var name = $('#name').val();
    var type = $(".fav").val();
    var id = $('#id').val();
    $uploadCrop1.croppie('result', {
		type: 'canvas',
        size: 'viewport'
    }).then(function(resp) {
		// console.log(resp);
        $.ajax({
            url: "<?php echo base_url('homepage/do_upload'); ?>",
            type: "POST",
            data: {
                "image": resp,
                'name': name,
                'id': id,
                'type':type
            },
            success: function(data) {
                console.log(data);
                if (data == "success") {
                    res.html(
                        '<div class="alert alert-success"><strong>Success: </strong> Logo successfully uploaded!</div>'
                        );
                    window.location.href = "<?php echo site_url("settings/homepage");?>";
                } else {
                    res.html(data);
                }
            },
            error: function(e) {
                //console.log(e);
                res.html(
                    '<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>'
                    );
            }
        });
    });
});
</script>
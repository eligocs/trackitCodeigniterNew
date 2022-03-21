var ComponentsEditors = function () {
    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    var handleSummernote = function () {
        $('#summernote_1').summernote({height: 300});
        $('#summernote_2').summernote({height: 300});
        $('#summernote_3').summernote({height: 300});
        $('#summernote_4').summernote({height: 300});
        $('#summernote_5').summernote({height: 300});
        $('#summernote_11').summernote({height: 300});
        $('#summernote_12').summernote({height: 300});
        $('#template').summernote({height: 500});
        //API:
        //var sHTML = $('#summernote_1').code(); // get code
        //$('#summernote_1').destroy(); // destroy
    }


    return {
        //main function to initiate the module
        init: function () {
            handleWysihtml5();
            handleSummernote();
          
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsEditors.init(); 
});
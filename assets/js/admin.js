jQuery(document).ready(function ($) {
	
	$(document).on("click","#acfCustomBtn",function(e){
        e.preventDefault();
        var formId = $("form#post");
        var formData = 'action=my_ajax_save_option&' + formId.serialize();
        //formId.trigger("submit");
        $.ajax({
            type : "post",
            dataType : "json",
            url : ajaxParams.ajaxUrl,
            data : formData,
            success: function(response) {
                if(response.success) {
                	var successMsg = '<div class="acf-admin-notice notice notice-success is-dismissible"><p>Options Updated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
                	var currentURL = window.location.href;
                	var newURL = currentURL + '&message=1';
                	$("#msgDiv").html(successMsg);
                    //location.replace(newURL);
                } 
            },
            complete:function(){
            	$(document).on("click","#msgDiv button.notice-dismiss",function(){
            		$("#msgDiv").html("");
            	});
            },
            error: function (xhr, ajaxOptions, thrownError) {
            	var errorMsg = '<div style="border:1px solid red; padding:5px;"><p>'+xhr.status+'</p><p>'+thrownError+'</p></div>';
            	$("#wpbody-content").append(errorMsg);
			}
        });

    });


});
//admin registration
$('#adminregister-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.status').Loader('Registering...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
           window.location = resp.url;
        }else{
           //window.location = resp.url;
        }
    }
});

//student reg by admin
$('#student-verification-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.status').Loader('Registering...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});

//student reg by themselves
$('#studentregister-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.student-reg-status').Loader('Registering...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.student-reg-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            // window.location = resp.url;
        }
    }
});

//org registration
$('#orgregister-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.org-reg-status').Loader('Registering...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.org-reg-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});

//posting attachments
$('#post-attachment-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.org-attach-status').Loader('Submitting...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.org-attach-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});

//sending application from
$('#apply-attachment-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.apply-attach-status').Loader('Submitting...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.apply-attach-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});

//showing you've been attached
$('#show-attached-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.show-attach-status').Loader('Submitting...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.show-attach-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});
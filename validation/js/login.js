//admin login
$('#adminlogin-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.status').Loader('Logging In...');
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

//student login
$('#studentlogin-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.student-login-status').Loader('Logging In...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.student-login-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});

//org login
$('#orglogin-frm').validationEngine('attach').ajaxForm({
    dataType: 'json',
    resetForm: true,
    'beforeSubmit' : function (){
        // Show loader
        $('.org-login-status').Loader('Logging In...');
    },
    'success' : function (resp){
        // Show message and/or redirect to url!
        $('.org-login-status').CheckinAlert(resp.status || false ? 'info' : 'danger', resp.msg || 'Something went wrong');
        if(resp.status){
            window.location = resp.url;
        }else{
            //window.location = resp.url;
        }
    }
});
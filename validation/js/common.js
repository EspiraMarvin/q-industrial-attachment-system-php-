// create an fn function for a loader...
$.fn.Loader = function(txt) {
    txt = typeof txt === 'undefined' ? '' : txt;
    var img = $('<img />', {
        src : "validation/ajax-loader.gif"
    }),
        span = $('<span />', {
        id : 'loader-span'
    });
    if (this.find('span#loader-span').length === 0) {
        var content = $(span).html(txt).append(img);

        // Content should be appended only into a div or a span
        if ($(this).is('div') || $(this).is('span')) {
            // Add content 
            $(this).html(content);
        }

        // In case the parent is not visible, show it!
        if (!this.is(':visible')) {
            this.show();
        }
    }
    return this;
};


// Create fn for adding an alert to the content!
$.fn.CheckinAlert = function() {
    var type = arguments[0] || 'info',
        div = $('<div>', {
        'class' : 'alert alert-dismissable alert-' + type,
        'html' : arguments[1] || 'Information'
    }).append($('<button>', {
        'class' : 'close',
        'data-dismiss' : 'alert',
        'aria-hidden' : true,
        'html' : '&times;'
    }));
    // Remove a loader, if any!
    $(this).RemoveLoader();
    // Add what we have to the parent, bt first, we need to remove an alert; if
    // originally present!
    $('.alert .close').trigger('click');
    return arguments[2] || false ? $(this).prepend(div) : $(this).append(div);
};

//remove loader
$.fn.RemoveLoader = function() {
    this.find('span#loader-span').fadeOut('fast', function() {
        this.remove();
    });
    return this;
};

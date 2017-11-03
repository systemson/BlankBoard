<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" >
// jQuery no Conflict
jQuery.noConflict()

// Bootstrap show selected tab on reload
jQuery(function() {
    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab
        localStorage.setItem('lastTab', jQuery(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        jQuery('[href="' + lastTab + '"]').tab('show');
    }
});

// Chosen Plugin
jQuery(document).ready(function(){
    jQuery(".chosen-select").chosen({width: "100%"})
});
</script>
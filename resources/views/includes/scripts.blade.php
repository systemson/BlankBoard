<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" >
jQuery.noConflict()
jQuery(document).ready(function(){
    jQuery(".chosen-select").chosen({width: "100%"})
});
</script>
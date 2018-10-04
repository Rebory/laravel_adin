<div class="slim-footer mg-t-0">
    <div class="container-fluid">
        <p>Copyright 2018 &copy; All Rights Reserved. My Web Deal</p>
        <p>Designed by: <a target="_blank" href="http://mywebdeal.in">My Web Deal</a></p>
    </div>
    <!-- container-fluid -->
</div>
<!-- slim-footer -->
</div>
<!-- slim-mainpanel -->
</div>
<!-- slim-body -->
<script src="{{asset('backend_lib/jquery/js/jquery.js')}}"></script>
<script src="{{asset('backend_lib/popper.js/js/popper.js')}}"></script>
<script src="{{asset('backend_lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('backend_lib/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script src="{{asset('backend_lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{asset('backend_lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('backend_lib/parsleyjs/js/parsley.js')}}"></script>
<script src="{{asset('js/backend_js/slim.js') }}"></script>
<script src="{{asset('js/backend_js/custom.js') }}"></script>
<script src="{{asset('backend_lib/moment/js/moment.js')}}"></script>
<script src="{{asset('backend_lib/jquery-ui/js/jquery-ui.js')}}"></script>

   

  



<script>
$(function(){
'use strict';
$('.select2').select2({
minimumResultsForSearch: Infinity
});
$('#selectForm').parsley();
$('#selectForm2').parsley();
});
</script>
</body>
</html>
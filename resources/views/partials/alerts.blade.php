@if (session('success'))
    <div class="alert alert-success  alert-dismissible fade show" id="alert" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert">x</button>
        <li>
            {{ session('success') }}
        </li>
    </div>
@endif

@if (session('failure'))
    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert">x</button>
       <li>
           {{ session('failure') }}
       </li>
    </div>
@endif


<script>
    setTimeout("document.getElementById(\"close\").click()", 5000);
</script>

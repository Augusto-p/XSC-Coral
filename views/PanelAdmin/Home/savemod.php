
<script>alert("Canbios Guardados")</script>

<input type="hidden" id="URL" value="<?php echo constant('URL'); ?>">
<script>
    a = document.createElement("a");
    a.href = document.getElementById("URL").value;
    a.click()
</script>

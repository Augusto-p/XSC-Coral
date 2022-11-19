<input type="hidden" id="From" value="<?=$this->from;?>">
<script>
    a = document.createElement("a");
    a.href =document.getElementById("From").value;
    a.click()
</script>
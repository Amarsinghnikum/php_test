<div id="wrap">
  <div class="my_box">
    <div class="field_box"><input type="textbox" name="name" id="name"></div>
    <div class="button_box"><input type="button" name="submit" id="submit" value="Add More"
    onclick="add_more()"></div>
  </div>
</div>
<input type="textbox" id="box_count" value="1">
<style>
#wrap{width:20%;}
.my_box{width:100%; padding-bottom:36px;}
.field_box{float:left;width:80%;}
.button_box{float:left;width:20%;}
</style>

<script src="jquery-3.6.0.min.js"></script>
<script>
  function add_more(){
    jQuery("#wrap").append('<div class="my_box"><div class="field_box"><input type="textbox"
    name="name" id="name"></div><div class="button_box"><input type="button" name="submit"
    id="submit" value="Remove" onclick="add_more()"></div></div>');
    var box_count=jQuery("#box_count").val(box_count);
    box_count++;
  }
function remove_more(){
  
}
</script>
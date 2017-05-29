<html>
<head>

</head>
<body>
 <select id="category" name="prod_cat">
        <option value="">-- bioskop --</option>
        <?php foreach($bioskop->result() as $b){ ?>
        <option value="<?php echo $b->id_bioskop; ?>"><?php echo $b->nama_bioskop; ?></option>
        <?php } ?>
    </select>
    <br><br>

    <br><br>
	<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.category').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>Movie/getSub",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".subcat option:gt(0)").remove();  
      $('.subcat').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.subcat').find("option:eq(0)").html("Select Subcategory");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.subcat').append(option);
         });  
          /*ends */
        }
      });
    });
  });
</script>
</body>
</html>
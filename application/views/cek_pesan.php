<a href="<?php echo base_url('admin/all_ide');?>"><span id="notifikasi"></span></a>
<script>
var x = 1;

function cek(){
    $.ajax({
        url: "<?php echo base_url('web/cek');?>",
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
        }
    });
    var waktu = setTimeout("cek()",2000);
}

$(document).ready(function(){
    cek();
	$("#notif").click(function(){
        $.ajax({
        url: "<?php echo base_url('web/update_notif');?>",
    });

    });
});
</script>
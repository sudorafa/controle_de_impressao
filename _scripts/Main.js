
function ajaxCall(){

	$.ajax({ url: '/readJson.php',
        success: function(e){
            alert(e);
        }
    });
}
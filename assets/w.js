alert("saz");
function get_guide()
{

    var dataset = {
        keycode: "get_guide"
		
    }
    $.ajax({
        type: 'post',
        url: 'core.php',
        data: {query: dataset},
        success: function(result) 
        {

            document.getElementById("UserCaptchaCode").placeholder = result;
        }
    });
 
}

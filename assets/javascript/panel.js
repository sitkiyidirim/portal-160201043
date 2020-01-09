
function deleteJob()
{

    var dataset = {

        keycode: "job_delete"
		
    }
    $.ajax({
        type: 'post',
        url: 'core.php',
        data: {query: dataset},
        success: function(response) 
        {

            updateUI(response);
         
           
          
        }
    });
 
}

function addJob()
{

}




function showEditModal()
{








}


function editJob()
{

}







function updateUI(response)
{
    JobTable = document.getElementById("JobTable");
  
    if(response)
    {
        

        JobTable.innerHTML = "nul";
    }
    else
    {
        print_errorMessage();
    }



 



}


function print_errorMessage()
{
    Container = document.getElementsByClassName("grid-container")[0];
    Container.innerHTML += `
    <div class="alert alert-danger" style="margin-top: 2%;" "role="alert">
    Veri Tabanı İşlemi Başarısız. <a href="mailto:umit@aksoylu.space" class="alert-link">Lütfen sistem yöneticisi ile iletişim kurun</a> veya <a href="./AirCron" class="alert-link">tekrar deneyin.</a>
    </div>`;
}



function addJob()
{

}


//### << INIT & LISTENERS ###

$(document).ready(function() { 

  

    $( ".btn-danger" ).click(function() {
        
        clickedId = $(this).parent().parent().siblings('th').first().html();
        setSelectedModalIndex(clickedId);

        var thObject = $("th:contains('"+clickedId+"')");

        var tdPage = thObject.siblings()[1];
        var tdDate = thObject.siblings()[2];
        
    
        var modalBody = $(".modal-body");
    
        modalBody.text
        (`
            "<br>
            id: `+ index +`<br>
            sayfa: `+ tdPage +`<br>
            tarih/aralık: `+ tdDate +`<br>
            "
        `);

    });



    $( ".btn-warning" ).click(function() {deleteModal_Invoke()});
    $( ".btn-dark" ).click(function() {deleteModal_Cancel()});
    $( ".btn-primary" ).click(function() {addModal_Invoke()});
    $( ".btn-secondary" ).click(function() {addModal_Cancel()});


    $( "td" ).dblclick(function() {
        
        if($(this).children().length > 0)
            return;


        var jobIndex  = $(this).siblings().first().html();   
        var columnIndex = $(this).index();
        
        
        
        existValue = $(this).html();
        $(this).html("");
        editInput =$(this).append("<input type='text' value='"+ existValue+"'></input>");
       



        editInput.focusin();

        
        editInput.focusout(function() {exitEditMode(this,editInput,columnIndex,jobIndex)});



    });




});

function exitEditMode(td,inp,columnIndex,jobIndex)
{

    var lastValue = $(inp).children("input").val();
    inp.children("input").remove();
    inp.append(lastValue);
    editJob(jobIndex, columnIndex,lastValue)
}


//### >> INIT & LISTENERS ###


//### << GET-SET METODS

//GET-SET METODS FOR "EDIT" ACTION





//GET-SET METODS FOR "DELETE" ACTION

var selectedModalIndex = -1;

function setSelectedModalIndex(index)
{
    selectedModalIndex = index;

}
function getSelectedModalIndex()
{
    return selectedModalIndex;
}


//GET-SET METODS FOR "ADD" ACTION




//### >> GET-SET METODS ###


//### << MODAL CONTROLS ###

function deleteModal_Invoke()
{
   
    var index = getSelectedModalIndex();
    setSelectedModalIndex(0);
    
    var thObject = $("th:contains('"+index+"')");


    if(deleteJob())
    {
         
         thObject.parent().remove();
    }
    else
    {
         updateUI(null);
    }
}

function deleteModal_Cancel()
{
    //Do Nothing
}

function addModal_Invoke()
{
    //get all modal variables

    if(addJob())
    {

    }
    else
    {
        updateUI(null);
    }


}

function addModal_Cancel()
{

}


//### >> MODAL CONTROLS ###

function deleteJob()
{
    return true;//or false
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


function editJob(jobIndex, columnIndex,lastValue)
{
    alert(jobIndex+" "+ +columnIndex+" "+lastValue)
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

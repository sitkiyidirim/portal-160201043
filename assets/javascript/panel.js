
//### << INIT & LISTENERS ###

$(document).ready(function() { 

  

    $( ".btn-danger" ).click(function() {
        
        clickedId = $(this).parent().parent().siblings('th').first().html();
        setSelectedModalIndex(clickedId);

        var thObject = $("th:contains('"+clickedId+"')");

        var tdPage = thObject.siblings()[1];
        var tdDate = thObject.siblings()[2];
        
  

    });



    $( ".btn-warning" ).click(function() {deleteModal_Invoke()});
    $( ".btn-dark" ).click(function() {deleteModal_Cancel()});
    $( ".btn-primary" ).click(function() {addModal_Invoke()});
    $( ".btn-secondary" ).click(function() {addModal_Cancel()});
    $( ".btn-logs" ).click(function() {logsModal_Create()});

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

function logsModal_Create()
{  
   getLogs();
   
}

function deleteModal_Invoke()
{
   
    var index = getSelectedModalIndex();
    setSelectedModalIndex(0);
    
    var thObject = $("th:contains('"+index+"')");


    deleteJob(index);
    
         
         thObject.parent().remove();
   
}

function deleteModal_Cancel()
{
    //Do Nothing
}

function addModal_Invoke()
{

    //get all modal variables
    var modal_route = $("#html_yonlendirme").val();
    var modal_time = $("#html_tarih").val();
    var modal_postdata = $("#html_postdata").val();


    addJob(modal_route,modal_time,modal_postdata);
    
        var thObject = $("tbody");
        var lastIDContainer = $("tbody").children().last().children().first();

       
        var lastid = lastIDContainer.text();

     

        lastid++;
      
        thObject.append( `

            <tr>
            <th scope="row">`+lastid +`</th>
            <td>`+ modal_route+`</td>
            <td>`+modal_time+`</td>
            <td>`+modal_postdata+`</td>
            <td><center><Button class="btn btn-danger" data-toggle="modal" data-target="#DeleteCronModal"> Delete </button></center></td>
          </tr>
          `);


}

function addModal_Cancel()
{
    // Do Nothing
}


//### >> MODAL CONTROLS ###

function deleteJob(jobIndex)
{
    var dataset = {

        keycode: "job_delete",
        jobID: jobIndex
      
		
    }
    $.ajax({
        type: 'post',
        url: 'AirCron/api',
        data: {query: dataset},
        success: function(response) 
        {
      
        }
    });

   
}



function addJob(route,time,data)
{

    var dataset = {

        keycode: "job_add",
        page : route,
        interval : time,
        postdata : data
		
    }
    $.ajax({
        type: 'post',
        url: 'AirCron/api',
        data: {query: dataset},
        success: function(response) 
        {
            
        }
    });
 

}
//<<>>

function getLogs()
{
    var response = "";
  
    var dataset = {

       
		
    }
    $.ajax({
        type: 'get',
        url: 'AirCron/api?logs',
        data: {query: dataset},
        success: function(ret) 
        {
            if(ret == "")
            {
                updateUI();
            }   
            else
            {
                $("#modal-body-showlogsmodal").html(ret);
            }
          
         
          
        }
    });
    
}

function editJob(jobIndex, columnIndex,lastValue)
{
  
    var dataset = {

        keycode: "job_edit",
        jobID: jobIndex,
        columndID : columnIndex,
        newvalue : lastValue
		
    }
    $.ajax({
        type: 'post',
        url: 'AirCron/api',
        data: {query: dataset},
        success: function(response) 
        {

          
        }
    });



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


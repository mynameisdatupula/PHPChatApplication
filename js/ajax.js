
//var xmlObject = createXMLHttpRequest();


    $(document).ready(function()
    {
        $(document).keypress(function(evt)
                  {
                      if(evt.which == 13 || evt.keyCode == 13)
                      {
                          //alert("enter");
                          sendRequestToTheServer();
                      }
                  });
     });

            
 

function createXMLHttpRequest()
{
    if(window.ActiveXObject)
        return ActiveXObject("Microsoft.XMLHTTP");
    
    return XMLHttpRequest();
    
}

function sendRequestToTheServer()
{
  var xmlHttp = createXMLHttpRequest();


  xmlHttp.onreadystatechange = function()
  {
    if(xmlHttp.readyState == 4 || xmlHttp.status == 200)
    {
      document.getElementById("changingDiv").innerHTML = xmlHttp.responseText;
    }
  }

  xmlHttp.open("POST", "../request.php",true);
  xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlHttp.send("message="+document.getElementById("message").value);
}

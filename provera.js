var xmlHttp
function proveri(str)
{
	// Kreiranje XMLHttpRequest objekta i provera da li browser podrzava ajax
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	}

	var url="provera.php"
	url=url+"?korisnicko_ime="+str
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged(){ 
    /* Holds the status of the XMLHttpRequest. Changes from 0 to 4: 
       0: request not initialized 
       1: server connection established
       2: request received 
       3: processing request 
       4: request finished and response is ready*/
	if (xmlHttp.readyState==4){

		if (xmlHttp.responseText=="0"){
			document.getElementById("user").innerHTML="Već postoji taj korisnik.";
			document.getElementById("ime").focus();
		} else {
			document.getElementById("user").innerHTML="Korisnicko ime je slobodno.";
		}

	}
}
function GetXmlHttpObject(){
	var xmlHttp=null;
	try {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
} catch (e) {
 //Internet Explorer
 try {

 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
 	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
}

return xmlHttp;
}

function ponudaAjax(){
    var sortiraj = $("#cena").val();
        

       $("#ponuda").html("");

		
		$.post( "ucitajPonudu.php", {cena: sortiraj}, function( data ) {
  $( "#ponuda" ).html( data );
});
 $('html, body').animate({
        scrollTop: $("#ponuda").offset().top
    }, 2000);
    
    
    
}
function izmeniPonudu(id){
       $("#ponuda").html("");

		$.post( "izmeniPonudu.php", {id: id}, function( data ) {
  $( "#ponuda" ).html( data );
});
 $('html, body').animate({
        scrollTop: $("#ponuda").offset().top
    }, 2000);
    
    
    
}
function izbrisiPonudu(id){
       $("#ponuda").html("");

		$.post( "izbrisiPonudu.php", {id: id}, function( data ) {
  $( "#ponuda" ).html( data );
});
 $('html, body').animate({
        scrollTop: $("#ponuda").offset().top
    }, 2000);
    
    
    
}

function rezervisiPonudu(id){
       $("#ponuda").html("");

		$.post( "rezervisiPonudu.php", {id: id}, function( data ) {
  $( "#ponuda" ).html( data );
});
 $('html, body').animate({
        scrollTop: $("#ponuda").offset().top
    }, 2000);
    
    
    
}
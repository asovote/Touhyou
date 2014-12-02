function chktext(){

  var votes = document.changeV.elements[0].value;
  
  if ( votes == "" )
  {
    document.changeV.elements[0].disabled = true;
  }else{
    document.changeV.elements[0].disabled = false;
  }
}

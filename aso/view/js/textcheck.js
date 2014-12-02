function chktext(){

  var votes = document.changeV.elements[0].value;
  
  if ( votes == "" )
  {
    document.changeV.elements[1].disabled = true;
    document.changeV.elements[2].disabled = true;
  }else{
    document.changeV.elements[1].disabled = false;
    document.changeV.elements[2].disabled = false;
  }
}

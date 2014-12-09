function onlyNumeric() {
　　var k = event.keyCode;
　　( k == 9 || k == 13 || ( k >= 48 && k <= 57 )) return;
　　event.returnValue = false;
}
function replaceNum(txt) {
　　txt.value = txt.value.replace(/\D/g,"");
}
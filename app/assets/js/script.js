
function addNumber(number){
    var btn = "btn"+number;
    document.getElementById(btn).disabled = true;
    document.getElementById("collection").value += ' ' + number;
    console.log(number);
}

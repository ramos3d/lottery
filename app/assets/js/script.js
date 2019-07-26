
function addNumber(number){
    var btn = "btn"+number;
    document.getElementById(btn).disabled = true;

    document.getElementById("collection").value += ' ' + number;
    console.log(number);
}
//console.log("ready!");
//document.write(pad2(1));
// $(document).ready(function(){
//     console.log("ready!");
// });


var count_mob=0;
var count=0;
var temp=0;
var i=0;
var i2=0;
var count2=0;
function validate() {
if (Number.isInteger(parseInt($('#sans').val()))) {
alert('Enter Answer in Correct Fornat');
$('#sans').val("");
return false;
}
else {
return true;
}

}
function alphaonly(button) {
var code = button.which;
if(count>0 && code==32 && (i2==0 || i2==1)){
count=0;
i2++;
return true;

}
console.log(button.which);

if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code==09)) {
count++;
return true;

}
else{
return false;
}

}
function onlynumber(button) {

var code = button.which;

if (code > 31 && (code < 48 || code > 57)&& (code < 96 || code > 105))
return false;
return true;
var myval = $(this).val();

}
function alphaonly3(button) {
var code = button.which;

if(count>0 && code==190){
console.log(count);
count=0;
return true;

}
console.log(button.which);

if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code==09)||(code > 47 && code < 58)||code==37||code==39) {
count++;
console.log(count);
return true;

}
// else if(code > 47 || code < 58){
// count++;
// return true;
// }

else{
return false;
}
}

function alphaonly2(button) {
console.log(button.which);

var code = button.which;
if(count>0 && code==32){

count=0;
return true;
}
else if(code==32){
return false;
}
else{
count++;
return true;
}
}
$("#mobile").bind("keyup", function (e) {

mobile=$("#mobile").val();

var fchar=$("#mobile").val().substr(0, 1);
var schar=$("#mobile").val().substr(1,1);


if(fchar==0) {
$('#mobile').attr('maxlength','11');
if(schar==0)
{
$("#mobile").val(0);
if(fchar=="")
{
$("#mobile").val("");
}

}
} else {
$('#mobile').attr('maxlength','10');
}
if(mobile.length>9){
for(i=0;i<=mobile.length;i++){

if(mobile.substr(i,1)==mobile.substr(i+1,1)){
count2++;
console.log(count2);
if(count2==9){
count2=0;
alert('Invalid Phone no.');
$("#mobile").val("");
mobile='';
console.log(mobile.length);
}

}
else if(mobile.substr(i,1)!=mobile.substr(i+1,1)){
count2=0;
}
}
}
});


$("#email").bind("keypress keyup keydown", function (e) {


var email = $('#email').val();
var regtwodots = /^(?!.*?\.\.).*?$/;
var lemail = email.length;
if ((email.charAt(0) == ".") || !(regtwodots.test(email))) {
alert("invalid email");
$('#email').val("");
return;
}

});

$('.lugwt').on("cut copy paste drag drop",function(e) {
e.preventDefault();
});

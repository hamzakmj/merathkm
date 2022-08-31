
var factor = 1;

var d = document.getElementById("d").value;



function calc() {

var d = document.getElementById("d").value;

if (d == "select") {alert ("please enter gender"); return ; }


var father =Number(document.getElementById("father").value);

var mother =Number(document.getElementById("mother").value);

//var grandfather =Number(document.getElementById("grandfather").value);
//var grandmother =Number(document.getElementById("grandmother").value);

var wife =Number(document.getElementById("wife").value);
if (wife > 4) { alert(" رجاء اختيار اربع او قل من عدد زوجات "); return; }
var husband =Number(document.getElementById("husband").value);
var son =Number(document.getElementById("son").value);
var daughter = Number(document.getElementById("daughter").value);

//var grandson =Number(document.getElementById("grandson").value);
//var granddaughter =Number(document.getElementById("granddaughter").value);


var brother =Number(document.getElementById("brother").value);
var sister =Number(document.getElementById("sister").value);
var amount = document.getElementById("amount").value;

//var mbrother =Number(document.getElementById("mbrother").value);
//var msister =Number(document.getElementById("msister").value);
//var nephew  =Number(document.getElementById("nephew").value);
//var nephewson  =Number(document.getElementById("nephewson").value);

//var uncle  =Number(document.getElementById("uncle").value);

//var uncleson  =Number(document.getElementById("uncleson").value);


/*var oasaba  =Number(document.getElementById("oasaba").value);
*/












var mycase;

if (son > 0 /*|| grandson > 0*/) {
//alert("case 1:male descendents");

mycase = "c1";

}


else if ((son == 0 /*&& grandson == 0 */) && (daughter > 0 /*|| granddaughter > 0*/) && (father > 0 /*|| grandfather > 0*/)) {

//alert("Case 2: no male descendents but only female descendents and has ancestors");

mycase = "c2";

}

else if ((son == 0 /*&& grandson == 0*/ ) && (daughter > 0 /*|| granddaughter > 0*/) && (father == 0 /*&& grandfather == 0*/)) {

//alert("Case 3: no male descendents but only female descendents and hasn't ancestors");

mycase = "c3";


}


else if ((son == 0 /*&& grandson == 0*/ ) && (daughter == 0 /*&& granddaughter == 0*/) && (father > 0 /*|| grandfather > 0*/)) {

//alert("Case 4: no descendents and has ancestors");

mycase = "c4";


}




else if ((son == 0 /*&& grandson == 0*/ ) && (daughter == 0 /*&& granddaughter == 0*/) && (father == 0 /*&& grandfather == 0*/)) {

//alert("Case 5: no descendents and no ancestors/ kalalah");

mycase = "c5";

}

//Checking ancestor

var ancestor
if (father > 0)  {
ancestor= "father";
}
else if (father == 0 /*&& grandfather > 0*/) {
//ancestor= "grandfather";
}

else if (father == 0 /*&& grandfather == 0*/){
ancestor= "absent";
}


//alert ("ancestor is "+ancestor);





//Checking female ancestors (fa)

var fa;

if (mother > 0) {
fa = "mother";
}
else if (mother == 0/* && grandmother > 0*/) {
//fa = "grandmother";
}

else if (mother == 0 /*&& grandmother == 0*/) {
fa = "absent";
}


//alert ("fa is "+fa);


/*
//Case 1: has male descendents

if (son > 0 || grandson > 0)
*/

var sfather = 0, 
//sgrandfather = 0, 
smother = 0, 
//sgrandmothers = 0,
//sgrandmother = 0,
swifes = 0,
swife = 0,
shusband = 0,
sson = 0, 
sdaughters = 0, 
sdaughter = 0, 
//sgrandson = 0, 
//sgranddaughters = 0;
//sgranddaughter = 0;
sbrother = 0;
ssister = 0;
//smbrother = 0;
//smsister = 0;
//snephew = 0;
//snephewson = 0;
//suncle = 0;
//suncleson = 0;
//soasaba = 0;
sradd = 0;
sfa = 0;
spartner = 0;
tms = 0;

var Allocated, Remaining, rem, parts, factor = 1 ;

if (mycase == "c1" || mycase == "c2") {

if (ancestor =="father") { sfather=1/6;}
//else if (ancestor == "grandfather") {sgrandfather =1/6;}

}


if (mycase == "c1" || mycase == "c2" || mycase == "c3" ) {

if (fa == "mother") { smother = 1/6 ; }

//if (fa == "grandmother") {sgrandmothers=1/6; sgrandmother = sgrandmothers/grandmother;}

}



if (mycase == "c1" || mycase == "c2" || mycase == "c3" ) {

if (d=="male" && wife > 0) {  swifes = 1/8;
swife = swifes/wife;
}

if (d == "female" && husband > 0) { shusband = 1/4 ;
}

}




if (mycase == "c1") {

if (son > 0) {
Allocated = sfather/*+sgrandfather*/+smother/*+sgrandmothers*/+swifes+shusband;



if (Allocated > 1) { factor=Allocated/1; }

if (Allocated < 1) { 


var Remaining = 1- Allocated;

var parts = (2*son) + daughter ;

var sson =2*Remaining/parts;

if (daughter > 0) { sdaughter = Remaining/parts ; }


}

}


else if ( son == 0/* && grandson > 0*/) { 

if (daughter > 1) {sdaughters = 2/3;
sdaughter = sdaughters/ daughter;}

if (daughter == 1) {sdaughters = 1/2;
sdaughter = sdaughters/ daughter;}


Allocated = sfather/*+sgrandfather*/+smother/*+sgrandmothers*/+swifes+shusband+sdaughters;


if (Allocated > 1) { factor=Allocated/1; }

if (Allocated < 1) { 

Remaining = 1- Allocated;

//parts = /*(2*grandson) +*/ granddaughter;

//sgrandson =2*Remaining/parts;

//if (granddaughter > 0) { sgranddaughter = Remaining/parts;}

}
}

}

//Share of female descendents in absence of male descendents

if (mycase == "c2" || mycase == "c3" ) {

if (daughter > 1) {sdaughters = 2/3 ; sdaughter = sdaughters/ daughter; }

if (daughter == 1 /*&& granddaughter > 0*/)
{
sdaughters = 1/2 ; 
sdaughter = sdaughters/ daughter; 
//sgranddaughters = 1/6 ; 
//sgranddaughter = sgranddaughters / granddaughter; 
}


if (daughter == 1 /*&& granddaughter == 0*/) {sdaughters = 1/2 ; 
sdaughter = sdaughters/ daughter;}

if (daughter == 0 /*&& granddaughter > 1*/) 
//{ sgranddaughters = 2/3 ; sgranddaughter = sgranddaughters / granddaughter; }

if (daughter == 0 /*&& granddaughter == 1*/)
{
 // sgranddaughters = 1/2 ; sgranddaughter = sgranddaughters / granddaughter; 
}


} //Share of female descendents in absence of male descendents



//Share of ancestor in case 2

if (mycase == "c2") {
Allocated = sfather/*+sgrandfather*/+smother/*+sgrandmothers*/+swifes+shusband+sdaughters/*+sgranddaughters*/;

if (Allocated > 1) { factor=Allocated/1; }

if (Allocated < 1) { 

Remaining = 1- Allocated;

if (ancestor =="father") { sfather=1/6 + Remaining;}
//else if (ancestor == "grandfather") {sgrandfather =1/6 + Remaining;} //according to rule 1 which doesn't believe in muqasamah of jadd مع الأخوة

}

} //Share of ancestor in case 2



if (mycase == "c3") {


Allocated = sfather/*+sgrandfather*/+smother/*+sgrandmothers*/+swifes+shusband+sdaughters/*+sgranddaughters*/;


if (Allocated > 1) { factor=Allocated/1; }

if (Allocated < 1) { Remaining = 1-Allocated;


if (brother > 0 || sister > 0) { parts = (2*brother) + sister ;
if (brother > 0) { sbrother =2*Remaining/parts; }
if (sister > 0) { ssister = Remaining/parts;}
}



else { gotonephew();}



}
}

if (mycase == "c4" || mycase == "c5" ) {
if (d == "male" && wife > 0 ) { swifes = 1/4; swife = swifes/wife;}
if (d == "female" && husband > 0) { shusband = 1/2;}
}



//Share of fa

if (mycase == "c4" ) {

if (brother + sister /*+ mbrother + msister*/ > 1) { sfa = 1/6; }




if (brother + sister /*+ mbrother + msister*/ < 2 && wife+husband ==1 && ancestor == "father") {spartner= swife + shusband ; var Rem = 1- spartner ; sfa = Rem /3; }


if ((brother + sister/* + mbrother + msister*/ < 2) && ( wife+husband  == 0 /*|| ancestor  == "grandfather"*/ )) {sfa = 1/3;}


if (fa == "mother") { smother =sfa ; }
//if (fa == "grandmother") { sgrandmothers =sfa;  sgrandmother = sgrandmothers / grandmother ; }


}


if (mycase == "c4" ) {
Allocated = smother/*+sgrandmothers*/+swifes+shusband+sdaughters/*+sgranddaughters*/;

if (Allocated > 1) { factor=Allocated/1; }

if ( Allocated < 1) { Remaining = 1- Allocated;
if (ancestor == "father") {sfather = Remaining ;}
//if (ancestor ==  "grandfather") { sgrandfather = Remaining }
}
}





if (mycase == "c5" ) {

if (brother + sister /*+ mbrother + msister*/ > 1) { sfa = 1/6 ; } 
if (brother + sister /*+ mbrother + msister*/ < 2) { sfa = 1/3 ; }

if (fa == "mother") { smother = sfa; }
i//f (fa == "grandmother") { sgrandmothers = sfa; sgrandmother = sgrandmothers / grandmother ; }

}


if (mycase == "c5" ) {

/*if (mbrother + msister == 1) { 
var tms = 1/6; 
if (mbrother == 1) { smbrother = 1/6; }  
if (msister ==1) { smsister = 1/6; }
}*/

/*if (mbrother + msister > 1) {
var tms = 1/3; 
var msibling = mbrother + msister ;
var ot = 1/3 ;

if (mbrother > 0) { smbrother = ot / msibling ; }
if (msister > 0) { smsister = ot / msibling ; }
}*/


if (brother > 0) {

Allocated = smother/*+sgrandmothers*/+swifes+shusband+tms ;

if ( Allocated < 1) { Remaining = 1-Allocated ; 
var parts = (2*brother) + sister ;
sbrother =2*Remaining/parts ;
if (sister > 0) {ssister = Remaining/parts ;}
}


if (Allocated > 1) {factor= Allocated/1 ; } 

}


if (brother == 0) {

if (sister > 1) {ssisters = 2/3; ssister = ssisters / sister ;} 
if (sister == 1) {ssisters = 1/2; ssister = ssisters / sister ;}
if (sister == 0) {ssisters = 0;}

Allocated = smother/*+sgrandmothers*/+swifes+shusband+tms+ssisters;

if (Allocated > 1) { factor=Allocated/1; }

if (Allocated < 1) { Remaining = 1-Allocated ; gotonephew(); }

}


}

function gotonephew() {
if (nephew > 0) { snephew = Remaining/nephew;}
else if (nephewson > 0) {snephewson = Remaining/nephewson;}
else if (uncle > 0) { suncle = Remaining/uncle; }
else if (uncleson > 0) {suncleson = Remaining/uncleson;}
else if (oasaba > 0) { soasaba = Remaining/
oasaba; }
else {sradd = Remaining; }
}



document.getElementById("sfather").innerHTML = format(sfather);
  if (sfather == 0) { $("#pfather").hide(); } else { $("#pfather").show() }


//document.getElementById("sgrandfather").innerHTML=format(sgrandfather);


document.getElementById("smother").innerHTML = format(smother);
  if (smother == 0) { $("#pmother").hide(); } else { $("#pmother").show() }


//document.getElementById("sgrandmothers").innerHTML= format(sgrandmothers);
//document.getElementById("sgrandmother").innerHTML=format(sgrandmother);

document.getElementById("swifes").innerHTML = format(swifes);
  if (swifes == 0) { $("#pwifes").hide(); } else { $("#pwifes").show() }

  document.getElementById("swife").innerHTML = format(swife);
  if (swife == 0) { $("#pwife").hide(); } else { $("#pwife").show() }

  document.getElementById("shusband").innerHTML = format(shusband);
  if (shusband == 0) { $("#phusband").hide(); } else { $("#phusband").show() }

  document.getElementById("sson").innerHTML = format(sson);
  if (sson == 0) { $("#pson").hide(); } else { $("#pson").show() }

  document.getElementById("sdaughter").innerHTML = format(sdaughter);
  if (sdaughter == 0) { $("#pdaughter").hide(); } else { $("#pdaughter").show() }

//document.getElementById("sgrandson").innerHTML=format(sgrandson);
//document.getElementById("sgranddaughter").innerHTML=format(sgranddaughter);

document.getElementById("sbrother").innerHTML = format(sbrother);
  if (sbrother == 0) { $("#pbrother").hide(); } else { $("#pbrother").show(); }

  document.getElementById("ssister").innerHTML = format(ssister);
  if (ssister == 0) { $("#psister").hide(); } else { $("#psister").show(); }

//document.getElementById("smbrother").innerHTML=format(smbrother);
//document.getElementById("smsister").innerHTML=format(smsister);

//document.getElementById("snephew").innerHTML=format(snephew);
//document.getElementById("snephewson").innerHTML=format(snephewson);
//document.getElementById("suncle").innerHTML=format(suncle);
//document.getElementById("suncleson").innerHTML=format(suncleson);
// document.getElementById("soasaba").innerHTML=format(soasaba);

document.getElementById("sradd").innerHTML = format(sradd);




function format(num) {

    if (num == 0) { return " " }

    else {
      var n1 = num * 100;

      var n1 = n1 / factor;

      var n = n1.toFixed(2);
      var x = "(" + amount * (n / 100) + ")" + n + "%";
      return (x);
      

    }

  }



} //Calc function ends





function mf() {

var d = document.getElementById("d").value;

if (d == "male") {
    $(".ihusband").hide();
    $(".iwife").show();
    $("#ihusband").hide();
    $("#iwife").show();

  }
  else if (d == "female") {
    $(".iwife").hide();
    $(".ihusband").show();
    $("#iwife").hide();
    $("#ihusband").show();

  }

  else if (d == "select") {
    $(".iwife").show();
    $(".ihusband").show();
    $("#iwife").show();
    $("#ihusband").show();

  }

}
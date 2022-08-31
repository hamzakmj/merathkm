

var factor = 1;

var d = document.getElementById("d").value;



function calc() {

  var d = document.getElementById("d").value;

  if (d == "select") { alert("رجاء اختيار جنس المتوفى"); return; }


  var father = Number(document.getElementById("father").value);

  var mother = Number(document.getElementById("mother").value);


  var grandfather = Number(document.getElementById("grandfather").value);

  var grandmother = Number(document.getElementById("grandmother").value);

  var wife = Number(document.getElementById("wife").value);
  if (wife > 4) { alert(" رجاء اختيار اربع او قل من عدد زوجات "); return; }
  var husband = Number(document.getElementById("husband").value);

  var son = Number(document.getElementById("son").value);

  var daughter = Number(document.getElementById("daughter").value);

  var grandson = Number(document.getElementById("grandson").value);

  var granddaughter = Number(document.getElementById("granddaughter").value);



  var brother = Number(document.getElementById("brother").value);

  var sister = Number(document.getElementById("sister").value);


  var mbrother = Number(document.getElementById("mbrother").value);

  var msister = Number(document.getElementById("msister").value);

  var nephew = Number(document.getElementById("nephew").value);

  var nephewson = Number(document.getElementById("nephewson").value);

  var nephewsond = Number(document.getElementById("nephewsond").value); //أبناء أو أحفاد الأخ لأب 

  var uncle = Number(document.getElementById("uncle").value);

  var uncled = Number(document.getElementById("uncled").value); // الأعمام لأب

  var uncleson = Number(document.getElementById("uncleson").value);

  var unclesond = Number(document.getElementById("unclesond").value);// أبناء أو أحفاد الأعمام لأب 


  var oasaba = Number(document.getElementById("oasaba").value);

  var amount = document.getElementById("amount").value;










  var mycase;

  if (son > 0 || grandson > 0) {

    // الحالة الأولى : ذكور أحفاد 

    mycase = "c1";

  }


  else if ((son == 0 && grandson == 0) && (daughter > 0 || granddaughter > 0) && (father > 0 || grandfather > 0)) {

    // الحالة الثانية : لأ ذكور أحفاد ، ولكن اناث حفيدات ولهن أجداد 

    mycase = "c2";

  }

  else if ((son == 0 && grandson == 0) && (daughter > 0 || granddaughter > 0) && (father == 0 && grandfather == 0)) {

    // الحالة الثالثة : لا أحفاد ذكور ، ولكن اناث حفيدات وليس لهن أجداد 

    mycase = "c3";


  }


  else if ((son == 0 && grandson == 0) && (daughter == 0 && granddaughter == 0) && (father > 0 || grandfather > 0)) {

    // الحالة الرابعة : لا أحفاد ولا أجداد 

    mycase = "c4";


  }




  else if ((son == 0 && grandson == 0) && (daughter == 0 && granddaughter == 0) && (father == 0 && grandfather == 0)) {

    // الحالة الخامسة : لا أحفاد ولا أجداد 2 

    mycase = "c5";

  }

  // التحقق من الجد !! 

  var ancestor
  if (father > 0) {
    ancestor = "father";
  }
  else if (father == 0 && grandfather > 0) {
    ancestor = "grandfather";
  }

  else if (father == 0 && grandfather == 0) {
    ancestor = "absent";
  }


  // جده + جد 





  // التحقق من الجدة 

  var fa;

  if (mother > 0) {
    fa = "mother";
  }
  else if (mother == 0 && grandmother > 0) {
    fa = "grandmother";
  }

  else if (mother == 0 && grandmother == 0) {
    fa = "absent";
  }


  // جدته + جدة 


  /*
  //الحالة الأولى : ذكور 
  
  if (son > 0 || grandson > 0)
  */

  var sfather = 0,
    sgrandfather = 0,
    smother = 0,
    sgrandmothers = 0,
    sgrandmother = 0,
    swifes = 0,
    swife = 0,
    shusband = 0,
    sson = 0,
    sdaughters = 0,
    sdaughter = 0,
    sgrandson = 0,
    sgranddaughters = 0,
    sgranddaughter = 0,
    sbrother = 0,
    ssister = 0,
    smbrother = 0,
    smsister = 0,
    snephew = 0,
    snephewson = 0,
    suncle = 0,
    suncleson = 0,
    soasaba = 0,
    sradd = 0,
    sfa = 0,
    spartner = 0,
    tms = 0;


  var Allocated, Remaining, rem, parts, factor = 1;

  if (mycase == "c1" || mycase == "c2") {

    if (ancestor == "father") { sfather = 1 / 6; }
    else if (ancestor == "grandfather") { sgrandfather = 1 / 6; }

  }


  if (mycase == "c1" || mycase == "c2" || mycase == "c3") {

    if (fa == "mother") { smother = 1 / 6; }
    if (fa == "grandmother") {
      sgrandmothers = 1 / 6;
      sgrandmother = sgrandmothers / grandmother;
    }

  }



  if (mycase == "c1" || mycase == "c2" || mycase == "c3") {

    if (d == "male" && wife > 0) {
      swifes = 1 / 8;
      swife = swifes / wife;
    }

    if (d == "female" && husband > 0) {
      shusband = 1 / 4;
    }

  }




  if (mycase == "c1") {

    if (son > 0) {
      Allocated = sfather + sgrandfather + smother + sgrandmothers + swifes + shusband;



      if (Allocated > 1) { factor = Allocated / 1; }

      if (Allocated < 1) {


        var Remaining = 1 - Allocated;

        var parts = (2 * son) + daughter;

        var sson = 2 * Remaining / parts;

        if (daughter > 0) { sdaughter = Remaining / parts; }


      }

    }


    else if (son == 0 && grandson > 0) {

      if (daughter > 1) {
        sdaughters = 2 / 3;
        sdaughter = sdaughters / daughter;
      }

      if (daughter == 1) {
        sdaughters = 1 / 2;
        sdaughter = sdaughters / daughter;
      }


      Allocated = sfather + sgrandfather + smother + sgrandmothers + swifes + shusband + sdaughters;


      if (Allocated > 1) { factor = Allocated / 1; }

      if (Allocated < 1) {

        Remaining = 1 - Allocated;

        parts = (2 * grandson) + granddaughter;

        sgrandson = 2 * Remaining / parts;

        if (granddaughter > 0) { sgranddaughter = Remaining / parts; }

      }
    }

  }

  // نسبة الاناث في حالة عدم وجود ذكور 

  if (mycase == "c2" || mycase == "c3") {

    if (daughter > 1) { sdaughters = 2 / 3; sdaughter = sdaughters / daughter; }

    if (daughter == 1 && granddaughter > 0) {
      sdaughters = 1 / 2;
      sdaughter = sdaughters / daughter; sgranddaughters = 1 / 6;
      sgranddaughter = sgranddaughters / granddaughter;
    }


    if (daughter == 1 && granddaughter == 0) {
      sdaughters = 1 / 2;
      sdaughter = sdaughters / daughter;
    }

    if (daughter == 0 && granddaughter > 1) {
      sgranddaughters = 2 / 3;
      sgranddaughter = sgranddaughters / granddaughter;
    }

    if (daughter == 0 && granddaughter == 1) {
      sgranddaughters = 1 / 2;
      sgranddaughter = sgranddaughters / granddaughter;
    }


  } // نسبة الاناث في حالة عدم وجود ذكور 



  // نصيب الأجداد في الحالة الثانية 

  if (mycase == "c2") {
    Allocated = sfather + sgrandfather + smother + sgrandmothers + swifes + shusband + sdaughters + sgranddaughters;

    if (Allocated > 1) { factor = Allocated / 1; }

    if (Allocated < 1) {

      Remaining = 1 - Allocated;

      if (ancestor == "father") { sfather = 1 / 6 + Remaining; }
      else if (ancestor == "grandfather") { sgrandfather = 1 / 6 + Remaining; } // وفق القاعدة الأولى التي لا تؤمن بمقاسمة جد مع الأخوة

    }

  } // نصيب الأجداد في الحالة الثانية 



  if (mycase == "c3") {


    Allocated = sfather + sgrandfather + smother + sgrandmothers + swifes + shusband + sdaughters + sgranddaughters;


    if (Allocated > 1) { factor = Allocated / 1; }

    if (Allocated < 1) {
      Remaining = 1 - Allocated;


      if (brother > 0 || sister > 0) {
        parts = (2 * brother) + sister;
        if (brother > 0) { sbrother = 2 * Remaining / parts; }
        if (sister > 0) { ssister = Remaining / parts; }
      }



      else { gotonephew(); }



    }
  }

  if (mycase == "c4" || mycase == "c5") {
    if (d == "male" && wife > 0) { swifes = 1 / 4; swife = swifes / wife; }
    if (d == "female" && husband > 0) { shusband = 1 / 2; }
  }



  // نصيب الاناث 

  if (mycase == "c4") {

    if (brother + sister + mbrother + msister > 1) { sfa = 1 / 6; }




    if (brother + sister + mbrother + msister < 2 && wife + husband == 1 && ancestor == "father") { spartner = swife + shusband; var Rem = 1 - spartner; sfa = Rem / 3; }


    if ((brother + sister + mbrother + msister < 2) && (wife + husband == 0 || ancestor == "grandfather")) { sfa = 1 / 3; }


    if (fa == "mother") { smother = sfa; }
    if (fa == "grandmother") { sgrandmothers = sfa; sgrandmother = sgrandmothers / grandmother; }


  }


  if (mycase == "c4") {
    Allocated = smother + sgrandmothers + swifes + shusband + sdaughters + sgranddaughters;

    if (Allocated > 1) { factor = Allocated / 1; }

    if (Allocated < 1) {
      Remaining = 1 - Allocated;
      if (ancestor == "father") { sfather = Remaining; }
      if (ancestor == "grandfather") { sgrandfather = Remaining }
    }
  }





  if (mycase == "c5") {

    if (brother + sister + mbrother + msister > 1) { sfa = 1 / 6; }
    if (brother + sister + mbrother + msister < 2) { sfa = 1 / 3; }

    if (fa == "mother") { smother = sfa; }
    if (fa == "grandmother") { sgrandmothers = sfa; sgrandmother = sgrandmothers / grandmother; }

  }


  if (mycase == "c5") {

    if (mbrother + msister == 1) {
      var tms = 1 / 6;
      if (mbrother == 1) { smbrother = 1 / 6; }
      if (msister == 1) { smsister = 1 / 6; }
    }

    if (mbrother + msister > 1) {
      var tms = 1 / 3;
      var msibling = mbrother + msister;
      var ot = 1 / 3;

      if (mbrother > 0) { smbrother = ot / msibling; }
      if (msister > 0) { smsister = ot / msibling; }
    }


    if (brother > 0) {

      Allocated = smother + sgrandmothers + swifes + shusband + tms;

      if (Allocated < 1) {
        Remaining = 1 - Allocated;
        var parts = (2 * brother) + sister;
        sbrother = 2 * Remaining / parts;
        if (sister > 0) { ssister = Remaining / parts; }
      }


      if (Allocated > 1) { factor = Allocated / 1; }

    }


    if (brother == 0) {

      if (sister > 1) { ssisters = 2 / 3; ssister = ssisters / sister; }
      if (sister == 1) { ssisters = 1 / 2; ssister = ssisters / sister; }
      if (sister == 0) { ssisters = 0; }

      Allocated = smother + sgrandmothers + swifes + shusband + tms + ssisters;

      if (Allocated > 1) { factor = Allocated / 1; }

      if (Allocated < 1) { Remaining = 1 - Allocated; gotonephew(); }

    }


  }

  function gotonephew() {
    if (nephew > 0) { snephew = Remaining / nephew; }
    else if (nephewson > 0) { snephewson = Remaining / nephewson; }
    else if (uncle > 0) { suncle = Remaining / uncle; }
    else if (uncleson > 0) { suncleson = Remaining / uncleson; }
    else if (oasaba > 0) {
      soasaba = Remaining /
        oasaba;
    }
    else { sradd = Remaining; }
  }


  document.getElementById("sfather").innerHTML = format(sfather);
  if (sfather == 0) { $("#pfather").hide(); } else { $("#pfather").show() }

  document.getElementById("sgrandfather").innerHTML = format(sgrandfather);
  if (sgrandfather == 0) { $("#pgrandfather").hide(); } else { $("#pgrandfather").show() }

  document.getElementById("smother").innerHTML = format(smother);
  if (smother == 0) { $("#pmother").hide(); } else { $("#pmother").show() }

  document.getElementById("sgrandmothers").innerHTML = format(sgrandmothers);
  if (sgrandmothers == 0) { $("#pgrandmothers").hide(); } else { $("#pgrandmothers").show() }

  document.getElementById("sgrandmother").innerHTML = format(sgrandmother);
  if (sgrandmother == 0) { $("#pgrandmother").hide(); } else { $("#pgrandmother").show() }

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

  document.getElementById("sgrandson").innerHTML = format(sgrandson);
  if (sgrandson == 0) { $("#pgrandson").hide(); } else { $("#pgrandson").show(); }

  document.getElementById("sgranddaughter").innerHTML = format(sgranddaughter);
  if (sgranddaughter == 0) { $("#pgranddaughter").hide(); } else { $("#pgranddaughter").show(); }

  document.getElementById("sbrother").innerHTML = format(sbrother);
  if (sbrother == 0) { $("#pbrother").hide(); } else { $("#pbrother").show(); }

  document.getElementById("ssister").innerHTML = format(ssister);
  if (ssister == 0) { $("#psister").hide(); } else { $("#psister").show(); }

  document.getElementById("smbrother").innerHTML = format(smbrother);
  if (smbrother == 0) { $("#pmbrother").hide(); } else { $("#pmbrother").show(); }

  document.getElementById("smsister").innerHTML = format(smsister);
  if (smsister == 0) { $("#pmsister").hide(); } else { $("#pmsister").show(); }

  document.getElementById("snephew").innerHTML = format(snephew);
  if (snephew == 0) { $("#pnephew").hide(); } else { $("#pnephew").show(); }

  document.getElementById("snephewson").innerHTML = format(snephewson);
  if (snephewson == 0) { $("#pnephewson").hide(); } else { $("#pnephewson").show(); }

  document.getElementById("suncle").innerHTML = format(suncle);
  if (suncle == 0) { $("#puncle").hide(); } else { $("#puncle").show(); }

  document.getElementById("suncleson").innerHTML = format(suncleson);
  if (suncleson == 0) { $("#puncleson").hide(); } else { $("#puncleson").show(); }

  document.getElementById("soasaba").innerHTML = format(soasaba);
  if (soasaba == 0) { $("#poasaba").hide(); } else { $("#poasaba").show(); }

  document.getElementById("sradd").innerHTML = format(sradd);

  const wartha = new Array("sfather", "sgrandfather", "smother", "sgrandmothers", "swifes", "shusband"
    , "sson", "sdaughter", "sgrandson"
    , "sgranddaughter", "sbrother", "ssister"
    , "smbrother", "smsister", "snephew",
    "snephewson", "suncle", "suncleson"
    , "soasaba", "sradd");

    const k=[''];
    const v=[''];


  function format(num) {

    if (num == 0) { return " " }

    else {
      var n1 = num * 100;

      var n1 = n1 / factor;

      var n = n1.toFixed(2);
      var x = "(" + amount * (n / 100) + ")" + n + "%";
      return (x);/*
      function sum() {
        if (true) {
          for (var q = 0; q < wartha.length; q++) {
            if (wartha[q] == num) {
              k[q] = wartha[q];
              v[q] = x;
            }
          }
          const myChildren = k.concat(v);
        }
        return myChildren;
      }*/

    }

  }



} // تنتهي وظيفة الحساب هنا 





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




/*
Basic cases
Case 1: has male descendents
Case 2: no male descendents but only female descendents and has ancestors
Case 3: no male descendents but only female descendents and hasn't ancestors
Case 4: no descendents and has ancestors
Case 5: no descendents and no ancestors/ kalalah
*/

/*



Case 2: no male descendents but only female descendents and has ancestors
If (son == 0 and grandson == 0 ) and (daughter > 0 or granddaughter > 0) and (father > 0 or grandfather > 0)


Case 2: no male descendents but only female descendents and has ancestors
Share of female descendents is 1/2 or 2/3 in case 2 & 3
if daughter > 1 then total share of all daughters is 2/3 ,Share of each daughter is total share of daughter/ no of daughter
if daughter == 1 & granddaughter > 0 then share of daughter is 1/2 and total share of all granddaughters is 1/6 and share of each granddaughter is 1/6 divided by no of granddaughters
if daughter == 1 & granddaughter == 0,then share of daughter is 1/2
if daughter == 0 & granddaughter > 1, then total share of all granddaughters is 2/3 ,Share of each  granddaughter is total share of granddaughter/ no of granddaughter
if daughter == 0 & granddaughter == 1,share of granddaughter is 1/2
Share of mother and wife/husband is calculated already




share of ancestor

If ancestor is father, then s father is 1/6
if ancestor is grandfather, then s grandfather is 1/6


Allocated share = sum of shares of father, grandfather,mother, grandmother,wife, husband, daughters
If allocated > 1, then factor=allocated/1
Divide each share by factor
If allocated < 1, then remaining = 1-allocated, in this case If ancestor is father, then s father is 1/6+remaining and if ancestor is grandfather, then s grandfather is 1/6+remaining



Case 3: no male descendents but only female descendents and hasn't ancestors
If (son == 0 and grandson == 0 ) and (daughter > 0 or granddaughter > 0) and (father == 0 and grandfather == 0)

Case 3:

Share of mother and wife/husband ,female descendents already calculated
Allocated= sum of all above shares
If allocated > 1, then factor=allocated/1
Divide each share by factor
If allocated < 1, then remaining = 1-allocated, in this case If (brother > 0 or sister > 0) 
Number of parts = (2*brother) + sister
If brother > 0, Share of each brother =2*remaining/parts
If sister > 0 then Share of each sister = remaining/parts
Else if jump to nephew
(After coming from nephew function) Else if return on heirs excluding wife/husband



Line of nephew
Nephew: if nephew > 0 then share of each nephew = remaining/no of nephews
Else if sonofnephew > 0 then share of each sonofnephew = remaining/no of sonofnephews
Else if uncle > 0 then share of each uncle = remaining/no of uncles
Else if sonofuncle > 0 then share of each sonofuncle = remaining/no of sonofuncles
Else if brotherOfgrandFather > 0 then share of each brotherOfgrandFather = remaining/no of brotherOfgrandFather
Else if nephewOfgrandFather > 0 then share of each nephewOfgrandFather = remaining/no of nephewOfgrandFather

Else if heirs excluding partner > 0 return on heirs excluding wife / husband
Else if arham > 0, remaining is for arham
Else if wife > 0 ,share of wife = share of wife + remaining
Else if husband > 0 ,share of husband = share of husband + remaining





Case 4: no descendents and has ancestors
If (son == 0 and grandson == 0 ) and (daughter == 0 and granddaughter == 0) and (father > 0 or grandfather > 0)

Case 4

Share of wife/husband for case 4 & 5
If d is male & wife > 0 then share of wife is 1/4
If d is female & husband > 0 then share of husband is 1/2





Case 4
Share of mother

if (brother + sister + mbrother + msister > 1 && fa = "mother") { then share of mother is 1/6 (brother and sister are both paternal and maternal)
if (brother + sister + mbrother + msister > 1) & fa is grandmother then total share of grandmothers is 1/6

if (brother + sister + mbrother + msister ≤ 1) & wife+husband=1, ancestor = father then share of partner= share of wife + share of husband
Rem = 1- share of partner
If fa is mother ,Share of mother =rem /3
If fa is grandmother ,total Share of grandmothers =rem /3 
share of each grandmother = total Share of grandmothers / no of grandmothers


if (brother + sister + mbrother + msister ≤ 1) &( wife+husband=0 || ancestor = grandfather ) then share of mother = 1/3



Case 4 

Share of ancestor
Allocated = total shares of above
If allocated > 1, then factor=allocated/1
Divide each share by factor
If allocated < 1, then remaining = 1- allocated
If ancestor is father, then share of father is remaining
if ancestor is grandfather, then share of grandfather is remaining



Case 5: no descendents and no ancestors/ kalalah
If (son == 0 and grandson == 0 ) and (daughter == 0 and granddaughter == 0) and (father == 0 and grandfather == 0)
Share of wife or husband already calculated
Share of mother
Case 5 
if (brother + sister > 1) & ancestor is absent fa is mother then share of mother is 1/6 else if fa is grandmother then total share of grandmothers is 1/6
if (brother + sister ≤ 1) & ancestor is absent and fa is mother then share of mother is 1/3 else if fa is grandmother then total share of grandmothers is 1/3


Share of maternal siblings
If mbrother + msister = 1 then if mbrother=1, then share of mbrother is 1/6 and if msister=1, then share of msister is 1/6
Else If mbrother + msister > 1, then share of each mbrother = 1/3 divided by no of maternal siblings and share of each msister = 1/3 divided by no of maternal siblings

Share of brother and sister
If brother == 0 then if sister > 1 then total share of sisters = 2/3, share of each sister is total share of sisters divided by no of sisters and if sister = 1 then share of sister is 1/2 
If allocated > 1, then factor=allocated/1
Divide each share by factor
If allocated < 1, then remaining = 1-allocated
Go to line of nephew

If brother > 0 and allocated < 1, then remaining = 1-allocated
Number of parts = (2*brother) + sister
Share of each brother =2*remaining/parts
If sister > 0 then Share of each sister = remaining/parts


If brother > 0 and allocated ≥ 1
// Mazhab 1
If brother > 0 and allocated ≥ 1
factor=allocated/1 & Divide each share by factor 

//Mazhab 2
If brother > 0 and allocated ≥ 1
Then If brother + sister+ mbrother + msister = 1, then share of brother is 1/6
Else If brother + sister+ mbrother + msister > 1, then share of each mbrother = share of each msister = share of each brother = share of each sister = 1/3 divided by total number of brothers, sisters,mbrothers, msisters
If allocated > 1
factor=allocated/1 & Divide each share by factor 




---over------------------over----------







Total heirs:
Children, grandchildren
Parents (father & mother)
Grandfather
Wife/husband
Brothers and sisters




--------------------

var smother,sfather;
var rem;

if (mother ==0) {
$("#pmother").hide();
If (grandmother > 0) {

}


}


else if (mother > 0){
$("#pmother").show();
}



if (father ==0) {
$("#pfather").hide();
}


else if (father > 0){
$("#pfather").show();

if (son > 0 || grandson > 0) {
sfather = 1/6
}

else if (son == 0 && grandson == 0) {

if (daughter > 0 || granddaughter > 0) {
sfather = "1/6+remainder";
} //Daughter or granddaughter is living

else if (daughter == 0 && granddaughter ==0) {
sfather = "remainder";
} //Daughter and granddaughter all are not living


} // Son and grandson both are not living
 document.getElementById("sfather").innerHTML=sfather;
} //Father is present


} //function ends


*/

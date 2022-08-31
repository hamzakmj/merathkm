$mearth = array(
    array("الزوج" => "1", "الأخ الشقيق" => "0"), array("الزوجة" => "0", "الأخت الشقيقة" => "0"),
    array("الابن" => "0", "الأخ لأب" => "0"), array("البنت" => "0", "الأخت لأب" => "0"), array("ابن الابن" => "0", "الإخوة لأم" => "0"),
    array("بنت الابن" => "0", "ابن الأخ الشقيق" => "0"), array("الأب" => "1", "ابن الأخ لأب" => "0"), array("الأم" => "1", "العم الشقيق" => "0"),
    array("الجد لأب" => "0", "العم لأب" => "0"), array("الجدة لأب" => "0", "ابن العم الشقيق" => "0"), array("الجدة لأم" => "0", "ابن العم لأب" => "0")
  );
  $mearth = array(
    array("الزوج" => "الأخ الشقيق"), array("الزوجة" =>  "الأخت الشقيقة"),
    array("الابن" =>  "الأخ لأب"), array("البنت" =>  "الأخت لأب"), array("ابن الابن" =>  "الإخوة لأم"),
    array("بنت الابن" =>  "ابن الأخ الشقيق"), array("الأب" => "ابن الأخ لأب"), array("الأم" => "العم الشقيق"),
    array("الجد لأب" =>  "العم لأب"), array(" الجدة لأب " =>  "ابن العم الشقيق"), array("الجدة لأم" =>  "ابن العم لأب")
  );
  $mearth = array(
    array("husband" => "brother"), array("wife" =>  "sister"),
    array("son" =>  "mbrother"), array("daughter" =>  "msister"), array("grandson" =>  "nephewsond"),
    array("granddaughter" =>  "nephew"), array("father" => "nephewson"), array("mother" => "uncle"),
    array("grandfather" =>  "uncled"), array(" grandmother" =>  "uncleson"), array("unclesond" =>  "oasaba")
  );
  $mearth = array(
    array("husband" => "brother"), array("wife" =>  "sister"),
    array("son" =>  "mbrother"), array("daughter" =>  "msister"), array("grandson" =>  "nephewsond"),
    array("granddaughter" =>  "nephew"), array("father" => "nephewson"), array("mother" => "uncle"),
    array("grandfather" =>  "uncled"), array(" grandmother" =>  "uncleson"), array("unclesond" =>  "oasaba")
  );
  $mearth_ar = array(
    "الزوج", "الابن", "الزوجة",  "البنت",
    "الأب","الأخ الشقيق", "الأم",  "االأخت الشقيق");
  $mearth = array(
    array("husband" => "son"), array("wife" =>  "daughter"),
    array("father" =>  "brother"), array("mother" =>  "sister"));
    $mearth_ar = array(
      "الزوج", "الأخ الشقيق", "الزوجة",  "الأخت الشقيقة",
      "الابن",  "الأخ لأب", "البنت",  "الأخت لأب", "ابن الابن",  "الإخوة لأم", "بنت الابن",
      "ابن الأخ الشقيق", "الأب", "ابن الأخ لأب", "الأم", "العم الشقيق", "الجد لأب",
      "العم لأب", " الجدة لأب ", "ابن العم الشقيق", "الجدة لأم",  "ابن العم لأب"
    );
    $mearth = array(
      array("husband" => "brother"), array("wife" =>  "sister"),
      array("son" =>  "mbrother"), array("daughter" =>  "msister"), array("grandson" =>  "nephewsond"),
      array("granddaughter" =>  "nephew"), array("father" => "nephewson"), array("mother" => "uncle"),
      array("grandfather" =>  "uncled"), array(" grandmother" =>  "uncleson"), array("unclesond" =>  "oasaba")
    );
    const wartha = new Array("sfather", "sgrandfather", "smother", "sgrandmothers", "swifes", "shusband"
    , "sson", "sdaughter", "sgrandson"
    , "sgranddaughter", "sbrother", "ssister"
    , "smbrother", "smsister", "snephew",
    "snephewson", "suncle", "suncleson"
    , "soasaba", "sradd");

    for(var i=0;i<wartha.length();i++){
      document.getElementById('wartha[i]').innerHTML = format(wartha[i]);
    }

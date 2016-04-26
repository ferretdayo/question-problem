var subject_1th = ["プログラミングⅠ","プログラミングⅡ","線形代数学Ⅰ","線形代数学Ⅱ","解析学Ⅰ","解析学Ⅱ","離散数学"];
var subject_2th = ["論理回路","情報ネットワーク","データ構造とアルゴリズムⅡ","確率統計","プログラミングⅢ","電気回路"];
var subject_3th = ["コンパイラ","情報セキュリティ","分散システム"];
var array_subject = [subject_1th,subject_2th,subject_3th];
//教科の選択
function subject_select(grade){
    //初期化
    $('#subject').empty();
    $.each(array_subject[grade-1], function(i, value) {
        $('#subject').append("<option value='"+i+"'>"+value+"</option>");
    });
}
//教科ごとのボタン(sideに表示)
function append_faculty(grade,url){
    var filepath = url+"?faculty=";
    var append_str = "";
    $.each(array_subject[grade-1], function(i, value) {
        var href_file = filepath+i;
        append_str += "<li><a href='"+href_file+"' class='button success'>"+value+"</a></li>";
    });
    $('#faculty').append(append_str);
}

//記事表示
//data = array["grade","subject","category","content","date","title","id"];
function show_article(data,root_url){
    var grade = data[0];
    var subject = array_subject[grade-1][data[1]];
    var category = (data[2]==1) ? "質問" : "出題";
    var content = data[3];
    var date = data[4];
    var title = data[5];
    var id = data[6];
    $('.article').append("<div class='panel' id='"+id+"'>");
    $('#'+id).append("<h4>"+title+"</h4>");
    $('#'+id).append("<p><b>"+category+"</b></p>");
    $('#'+id).append("<p>"+content+"</p>");
    $('#'+id).append("<p>学年 : "+grade+"年生 , 教科 : "+subject+" , 日付 : "+date+"</p>");
    $('#'+id).append("<a type='button' class='button expand' href='"+root_url+"/detail?id="+id+"'>コメント</button>");
    $('.article').append("</div>");
}
//1つだけ表示
function article_detail(data){
    var grade = data[0];
    var subject = array_subject[grade-1][data[1]];
    var category = (data[2]==1) ? "質問" : "出題";
    var content = data[3];
    var date = data[4];
    var title = data[5];
    var id = data[6];
    $('.article').append("<div class='panel callout radius' id='"+id+"'>");
    $('#'+id).append("<h4>"+title+"</h4>");
    $('#'+id).append("<p><b>"+category+"</b></p>");
    $('#'+id).append("<p>"+content+"</p>");
    $('#'+id).append("<p>学年 : "+grade+"年生 , 教科 : "+subject+" , 日付 : "+date+"</p>");
    $('.article').append("</div>");
}
//コメントの表示
function show_comment(data) {
    var comment_name = data[0];
    var comment = data[1];
    var comment_date = data[2];
    var id = data[3];
    $('.comment_area').append("<div class='panel' id='comment"+id+"'>");
    $('#comment'+id).append("<p>氏名 : "+comment_name+"</p>");
    $('#comment'+id).append("<p>内容 : "+comment+"</p>");
    $('#comment'+id).append("<p>日付 : "+comment_date+"</p>");
    $('.comment_area').append("</div>");
}

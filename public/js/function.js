$(function(){
    /*$(document).foundation().foundation('abide', {
        patterns: {
            // check if the last 3 letters are acceptable
            file: /^.*\.(doc|pdf|png|jpg)$/i
        }
    });*/
    $('#grade').change(function(){
        var grade = $(this).val();
        if (grade >= 1 && grade <= 3) {
            subject_select(grade);
        }
    })
});
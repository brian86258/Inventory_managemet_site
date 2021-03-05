$(document).ready(function(){

    $(".navitem_category ul").hide();

    $(".navitem_category").mouseenter(function(){
        $(this).find('ul').slideDown();
    });

    $(".navitem_category").mouseleave(function(){
        $(this).find('ul').slideUp();
    });

    // $(".navitem_category a").click(function(){
    //     alert($(this).text());
    // });
})

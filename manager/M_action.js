$(document).ready(function(){


    $(".new_product_info").hide();
    $(".print_button").click(function(){
        // $(this).slideToggle();
        print();
    });

    $(".new_product_button").click(function(){
        // $(this).slideToggle();
        $(".new_product_info").slideToggle();
    });

  
    $('#auto_autocomplete').autocomplete({
        source: "search.php",
        minLength: 1
    });
  

    // $(".new_product_button").mouseleave(function(){
    //     // $(this).slideToggle();
    //     $(".new_product_info").slideToggle();
    // });
})

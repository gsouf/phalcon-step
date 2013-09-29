$("document").ready(function(){
    $("#pstep-dev-barre ul li").not(".no-hide").toggle();

    $('#pstep-dev-hide-barre').click(function(){
        $("#pstep-dev-barre ul li").not(".no-hide").toggle();
    });
});


$(function(){
    $(".side_bar").css({"display":"none"})

    const close = $("#close");
    const menu = $('#menu');

    
    close.on('click',slideBack)
    menu.on("click",slide)

    // fonction de slide ajoutant un effet à la side_bar
    function slide(e){
        e.preventDefault()
        $(".navbar_header").addClass('pagePush').removeClass('pagePushBack')//on ajoute des class qui utilise une animation personalisé
        $('.side_bar').addClass('slide').removeClass('slideBack').css("display","block")
 
    }
     // fonction de remise en forme standard des éléments html
    function slideBack(e){
        e.preventDefault()
        $(".navbar_header").removeClass('pagePush').addClass('pagePushBack')
        $(".side_bar").removeClass('slide').addClass('slideBack')
        setTimeout(() => {
            $(".side_bar").css({"display":"none"})
        }, 1000);
    }
})
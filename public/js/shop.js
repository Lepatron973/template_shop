$(function(){
    tri = $('#tri');
    const $_GET = {};
    get = window.location.search;
    origin = window.location.search
    $('#tri option, .check').on('click',formatUrl)
    
    function formatUrl(){
        ///$('.check').attr("checked",false)
        //$(this).attr("checked",true)
        //window.location.search = get +"&"+$(this).val()
        if ($(this).val() != "defaut") {
            
            get = window.location.search +"&"+$(this).val()
            get = get.replace('?','');
            get = get.split("=").join(":");
            get = get.split("&").join(":");
            get = get.split(':');
            let i = 0;
            while(i < get.length) {
                $_GET[get[i]] = get[i] + '=' + get[i+1];
                i +=2  
            }
            console.log($_GET);
            $_GET['p'] = !$_GET['p'] ? 'p=1' : $_GET['p'];
            $_GET['order'] = !$_GET['order'] ? 'order=none' : $_GET['order'];
            $_GET['category'] = !$_GET['category'] ? 'category=none' : $_GET['category'];
            
            path ='?'+$_GET['path']+'&'+$_GET['p']+'&'+$_GET['category']+"&"+$_GET['order']
            window.location.search = path
            $('#tri').addClass('bg-primary')
        }else{
            location = window.location.pathname +'?path=shop';
        }
    }
   

})
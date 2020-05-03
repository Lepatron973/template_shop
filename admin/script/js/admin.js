$(function(){
    const $app = $('#app');
    let view = "home_admin";
    loadView(view);
    
    
    
    
    $("a").on('click',pathLoader)

    function pathLoader(e){
        e.preventDefault();
        e.stopPropagation();
        
        //liaison de la navigation au chargement des différentes vues  
        loadView($(e.currentTarget).attr('name'),$(e.currentTarget).attr('index'));
    }
    
    //function permettant l'affichage de différente vue
    function loadView(view='home_admin',index=null){
        
        $.ajax({
            url:'templates/views/'+view+'.php',
            type:'POST',
            data:'',
            dataType:'html',
            success: async function(result){
                data = await loadData();
                
                $app.html(result)
                displayHome()
                /*
                *j'attribue une destination ici car la variable global DIR php déclarer au niveau de l'index
                *à la racine du site n'est pas pris en compte dans les vues appeler par la requête ajax
                */
                $("form").attr('action',window.location.pathname)

                /**
                 * passage de la submission du formulaire au js et non au php
                 */
                $("form").on("submit",function(e){ 
                    e.preventDefault();
                    let post= [];
                   
                    $('input').each(function(){
                        
                        post[$(this).attr('name')] = $(this).val();
                    })
                   
                    editData($(this).serialize())
                        
                   
                 })
                 $('#form_edit_slider input').each(function(i){
                   
                     if (data.homeManager.slider[index][i] != undefined) {

                       $(this).val(data.homeManager.slider[index][i]);
                    } 
                })
            },
            error: function(error){
                console.log(error)
            },
            complete:function(){     
                loadData();
            }
    
        })
    
    }

    function loadData(){
       return new Promise(resolve=>{
            resolve(

                $.ajax({
                    
                    url:'index.php',
                    data:'ajax_request='+true,
                    type:'POST',
                    dataType:'json',
                    success: function(data){
                        
                        return data;
                                   
                    }              
                })              
            )
            
        })
    }

    function inserData(){
        
    }
    function editData(post){
        
        post = post.split("=").join(":")
        post = post.split("&").join(":")
        
        
       
        console.log(post)
        // console.log(JSON.stringify(post))
        // console.log(JSON.parse(JSON.stringify(post)))
        
        $.ajax({

            url:'index.php',
            data:{'edit': post},
            type:'POST',
            success: function(data){
                loadView();
            }
        })
    }
    function delData(e){
        e.preventDefault()
        let post = {};
        post['class'] = "delete_slider";
        post['id_slider'] = parseInt($(this).attr('index'))
        console.log(post)
        $.ajax({

            url:'index.php',
            data:{'delete': post},
            type:'POST',
            success: function(data){
                loadView();
            }
        })
    }
    async function displayHome(){
         
        data = await loadData();
        let slider = data.homeManager.slider;
        let i =0;
        $("#slider_list ul").html("");
        
        for(index in slider){
            
            $("#slider_list ul").each(function(){
                $(this).append(
                    `<li id="liSlider">
                    <a href='' class="mr-4 col-8" name="`+ slider[index].title_slider +`"> "`+ slider[index].title_slider +`"</a>
                    <a href="" class="mr-4 edit col-2" index="`+i+`" name="edit_slider"><i class="fas fa-edit"></i></a>
                    <a href="" name="del_slider" index="`+slider[index].id_slider+`"><i class="fas fa-trash-alt"></i></a>
                    </li>`
                )
                i++   
            })
    
        }
        
        
        $("#liSlider .edit").on('click',pathLoader)
        $("#liSlider a[name='del_slider']").on('click',delData)

    }

    function associativeArrayFormat(array){
        arrayFormated = [];
        let i=0;
        let test = []
       while(i< array.length){
            arrayFormated[array[i]] = array[i+1];
            
            i+=2;
        }
        return arrayFormated;
    }
})
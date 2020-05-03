$(function(){
    const $app = $('#app');
    loadView();
    
    
    $("a").on('click',pathLoader)


    /**
     * Cette petite fonction appelle la fonction loadView()
     * avec deux paramètres 
     * @param {event} e.currentTarget.attr('name') - nom de la page
     * @param {event} e.currentTarget.attr('index') - index ou id de la cible
     * @param {event} e - evénement "click" 
     */
    function pathLoader(e){
        e.preventDefault();
        e.stopPropagation();
        
        //liaison de la navigation au chargement des différentes vues  
        loadView($(e.currentTarget).attr('name'),$(e.currentTarget).attr('index'));
    }
    
    /**
     * function permettant l'affichage de différentes vues
     * @param {string} [view=home_admin] - page à afficher
     * @param {(string|null)} [index=null] - index de la cible dans le manager
     */
    function loadView(view="home_admin",index=null){
        
        $.ajax({
            url:'templates/views/'+view+'.php',
            type:'POST',
            data:'',
            dataType:'html',
            success: async function(result){
                data = await loadData();
                
                $app.html(result)
                displayHome(data)
                /*
                ** j'attribue une destination ici car la variable global DIR php déclarer au niveau de l'index
                ** à la racine du site n'est pas pris en compte dans les vues appellé par la requête ajax
                */
                $("form").attr('action',window.location.pathname)

                /*
                 ** passage de la submission du formulaire au js et non au php
                 */
                $("form").on("submit",function(e){ 
                    e.preventDefault();
                    let post= {};
                   
                    $('input').each(function(){
                       
                        /**
                         * Insertion des différente valeurs du formulaire
                         * dans la tableau post[].
                         */
                        post[$(this).attr('name')] = $(this).val();
                    })
                    
                    
                   /*
                   ** sérialization des valeurs issues du formulaire
                   ** en une seule chaîne de charactère afin qu'elle
                   ** soit accepté lors de la soumission de la requête
                   ** ajax.
                   */
                    editData(post)
                    
                   
                 })
                 
                 /*
                 ** Insertion des différente valeurs issues de la BDD
                 ** Dans les champs de text pour les pages d'éditions
                 */
                 fullFillEditForm(view,data);
            },
            error: function(error){
                console.log(error)
            },
            complete:function(){     
               
            }
    
        })
    
    }

    /**
     * Cette fonction permet de récupérer les Managers depuis la
     * page index.php. Les managers sont des objets permettant 
     * d'intéragir avec la base de donnée et donc de faire persisté
     * les changement établient par l'administration
     */
    function loadData(){
       return new Promise(resolve=>{
            resolve(

                $.ajax({
                    
                    url:'index.php',
                    data:{'action':'getManager'},
                    type:'POST',
                    dataType:'json',
                    success: function(data){
                        
                        return data;
                                   
                    }              
                })              
            )
            
        })
    }

    /**
     * Cette fonction permet l'insertion de donnée
     * dans la BDD.
     * @param {Array} post - tableau issue d'un formulaire
     */
    function inserData(post){
        
    }
    /**
     * Cette fonction permet la création ou la modification d'un élément.
     * @param {array} post - tableau issue d'un formulaire
     */
    function editData(post){
        /*
        ** formatage de la chaîne sérializer pour la transmission
        ** lors de la récupération en php il sera plus
        ** facile de le transformer en tableau associatif
        */
        // post = post.split("=").join(":")
        // post = post.split("&").join(":")
        
        $.ajax({

            url:'index.php',
            data:{'edit': post,'action':'add/edit'},
            type:'POST',
            success: function(data){
                loadView();
            }
        })
    }

    /**
     * Cette fonction permet de supprimer
     * l'élément sélectionner
     * @param {event} e - evenement "click"
     */
    function delData(e){
        e.preventDefault()
        let post = {};
        post['class'] = $(this).attr("name")
        post['id'] = parseInt($(this).attr('index'))
        $.ajax({

            url:'index.php',
            data:{'delete': post,'action':'delete'},
            type:'POST',
            success: function(data){
                loadView();
            }
        })
    }
    /**
     * Fonction asynchrone permettant d'afficher la navigation
     * de la page "home admin". Elle crée des liens de navigations
     * lié à différente fonction d'administration (edit,del) 
     */
    async function displayHome(data){
         
        
        let slider = data.homeManager.slider;
        let banner = data.homeManager.banner;
        
        let i =0;
        $("#slider_list ul").html("");
        
        for(index in slider){
            
            $("#slider_list ul").each(function(){
                $(this).append(
                    `<li id="liSlider">
                    <a href='' class="mr-4 col-8" name="`+ slider[index].title_slider +`"> "`+ slider[index].title_slider +`"</a>
                    <a href="" class="mr-4 edit col-2" index="`+i+`" name="edit_slider"><i class="fas fa-edit"></i></a>
                    <a href="" class="del" name="delete_slider" index="`+slider[index].id_slider+`"><i class="fas fa-trash-alt"></i></a>
                    </li>`
                )
                i++   
            })
    
        }
        i=0;
        for(index in banner){
            
            $("#banner_list ul").each(function(){
                $(this).append(
                    `<li id="liSlider">
                    <a href='' class="mr-4 col-8" name="`+ banner[index].title_banner +`"> "`+ banner[index].title_banner +`"</a>
                    <a href="" class="mr-4 edit col-2" index="`+i+`" name="edit_banner"><i class="fas fa-edit"></i></a>
                    <a href="" class="del" name="delete_banner" index="`+banner[index].id_banner+`"><i class="fas fa-trash-alt"></i></a>
                    </li>`
                )
                i++   
            })
    
        }
        
        
        $(".edit").on('click',pathLoader)
        $(".del").on('click',delData)

    }

    /**
     * Cette fonction permet de remplir les champs des 
     * formulaire d'édition selon les différentes vue 
     * chargé
     * @param {string} view - vue à charger
     * @param {object} data - obejet contenant les manager
     */
    function fullFillEditForm(view,data){

        let property;
        switch(view){
            case 'edit_slider':
                property = data.homeManager.slider;
            break;
            case 'edit_banner':
                property = data.homeManager.banner;
            break;
        }
        
        $('.form_edit input').each(function(i){
            
            if (property[index][i] != undefined) {

              $(this).val(property[index][i]);
           } 
       })
    }

})